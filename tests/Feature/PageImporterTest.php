<?php

namespace Tests\Feature;

use App\Enums\ContentStatus;
use App\Filament\Imports\PageImporter;
use App\Models\Page;
use App\Models\User;
use Awcodes\Curator\Models\Media;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PageImporterTest extends TestCase
{
    use RefreshDatabase;

    private User $author;
    private User $secondAuthor;

    protected function setUp(): void
    {
        parent::setUp();
        
        $this->author = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@example.com'
        ]);
        
        $this->secondAuthor = User::factory()->create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com'
        ]);

        config([
            'cms.language_available' => ['en' => 'English', 'id' => 'Indonesian'],
            'app.locale' => 'en'
        ]);

        $this->actingAs($this->author);
    }

    /** @test */
    public function it_has_correct_model_class()
    {
        $this->assertEquals(Page::class, PageImporter::$model);
    }

    /** @test */
    public function it_returns_correct_columns()
    {
        $columns = PageImporter::getColumns();
        
        $this->assertNotEmpty($columns);
        
        // Check basic columns exist
        $columnNames = collect($columns)->map(fn ($column) => $column->getName())->toArray();
        
        $this->assertContains('id', $columnNames);
        $this->assertContains('status', $columnNames);
        $this->assertContains('template', $columnNames);
        $this->assertContains('menu_order', $columnNames);
        $this->assertContains('author', $columnNames);
        $this->assertContains('parent_page', $columnNames);
        $this->assertContains('featured_image', $columnNames);
        $this->assertContains('published_at', $columnNames);
        $this->assertContains('title', $columnNames);
        $this->assertContains('slug', $columnNames);
        $this->assertContains('content', $columnNames);
        
        // Check language-specific columns
        $this->assertContains('title_en', $columnNames);
        $this->assertContains('title_id', $columnNames);
        $this->assertContains('slug_en', $columnNames);
        $this->assertContains('slug_id', $columnNames);
    }

    /** @test */
    public function it_casts_status_correctly()
    {
        $importer = new PageImporter();
        $columns = PageImporter::getColumns();
        
        $statusColumn = collect($columns)->first(fn ($column) => $column->getName() === 'status');
        $castFunction = $statusColumn->getCastStateUsing();
        
        $this->assertEquals(ContentStatus::Published, $castFunction('published'));
        $this->assertEquals(ContentStatus::Scheduled, $castFunction('scheduled'));
        $this->assertEquals(ContentStatus::Draft, $castFunction('draft'));
        $this->assertEquals(ContentStatus::Draft, $castFunction('unknown'));
        $this->assertEquals(ContentStatus::Draft, $castFunction(''));
        $this->assertEquals(ContentStatus::Draft, $castFunction(null));
    }

    /** @test */
    public function it_casts_menu_order_correctly()
    {
        $columns = PageImporter::getColumns();
        $menuOrderColumn = collect($columns)->first(fn ($column) => $column->getName() === 'menu_order');
        $castFunction = $menuOrderColumn->getCastStateUsing();
        
        $this->assertEquals(5, $castFunction('5'));
        $this->assertEquals(0, $castFunction(''));
        $this->assertEquals(0, $castFunction(null));
        $this->assertEquals(10, $castFunction('10'));
    }

    /** @test */
    public function it_resolves_author_by_email()
    {
        $columns = PageImporter::getColumns();
        $authorColumn = collect($columns)->first(fn ($column) => $column->getName() === 'author');
        $castFunction = $authorColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('john@example.com');
        $this->assertEquals($this->author->id, $resolvedId);
    }

    /** @test */
    public function it_resolves_author_by_name()
    {
        $columns = PageImporter::getColumns();
        $authorColumn = collect($columns)->first(fn ($column) => $column->getName() === 'author');
        $castFunction = $authorColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('Jane Smith');
        $this->assertEquals($this->secondAuthor->id, $resolvedId);
    }

    /** @test */
    public function it_falls_back_to_current_user_for_unknown_author()
    {
        $columns = PageImporter::getColumns();
        $authorColumn = collect($columns)->first(fn ($column) => $column->getName() === 'author');
        $castFunction = $authorColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('unknown@example.com');
        $this->assertEquals($this->author->id, $resolvedId);
        
        $resolvedId = $castFunction('');
        $this->assertEquals($this->author->id, $resolvedId);
    }

    /** @test */
    public function it_resolves_parent_page_by_title()
    {
        $parentPage = Page::factory()->create([
            'title' => ['en' => 'Parent Page'],
            'slug' => ['en' => 'parent'],
            'author_id' => $this->author->id
        ]);

        $columns = PageImporter::getColumns();
        $parentColumn = collect($columns)->first(fn ($column) => $column->getName() === 'parent_page');
        $castFunction = $parentColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('Parent Page');
        $this->assertEquals($parentPage->id, $resolvedId);
    }

    /** @test */
    public function it_resolves_parent_page_by_slug()
    {
        $parentPage = Page::factory()->create([
            'title' => ['en' => 'Parent Page'],
            'slug' => ['en' => 'parent-slug'],
            'author_id' => $this->author->id
        ]);

        $columns = PageImporter::getColumns();
        $parentColumn = collect($columns)->first(fn ($column) => $column->getName() === 'parent_page');
        $castFunction = $parentColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('parent-slug');
        $this->assertEquals($parentPage->id, $resolvedId);
    }

    /** @test */
    public function it_resolves_featured_image_by_id()
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('test.jpg');
        
        $media = Media::factory()->create([
            'id' => 123,
            'filename' => 'test.jpg'
        ]);

        $columns = PageImporter::getColumns();
        $imageColumn = collect($columns)->first(fn ($column) => $column->getName() === 'featured_image');
        $castFunction = $imageColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('123');
        $this->assertEquals('123', $resolvedId);
    }

    /** @test */
    public function it_resolves_featured_image_by_filename()
    {
        $media = Media::factory()->create([
            'filename' => 'test-image.jpg',
            'path' => 'images/test-image.jpg'
        ]);

        $columns = PageImporter::getColumns();
        $imageColumn = collect($columns)->first(fn ($column) => $column->getName() === 'featured_image');
        $castFunction = $imageColumn->getCastStateUsing();
        
        $resolvedId = $castFunction('http://example.com/images/test-image.jpg');
        $this->assertEquals($media->id, $resolvedId);
    }

    /** @test */
    public function it_parses_dates_correctly()
    {
        $columns = PageImporter::getColumns();
        $publishedAtColumn = collect($columns)->first(fn ($column) => $column->getName() === 'published_at');
        $castFunction = $publishedAtColumn->getCastStateUsing();
        
        $date = $castFunction('2024-01-15 10:30:00');
        $this->assertInstanceOf(Carbon::class, $date);
        $this->assertEquals('2024-01-15 10:30:00', $date->format('Y-m-d H:i:s'));
        
        $this->assertNull($castFunction('invalid-date'));
        $this->assertNull($castFunction(''));
    }

    /** @test */
    public function it_parses_custom_fields_json()
    {
        $columns = PageImporter::getColumns();
        $customFieldsColumn = collect($columns)->first(fn ($column) => $column->getName() === 'custom_fields');
        $castFunction = $customFieldsColumn->getCastStateUsing();
        
        $result = $castFunction('{"field1": "value1", "field2": "value2"}');
        $this->assertEquals(['field1' => 'value1', 'field2' => 'value2'], $result);
        
        $this->assertNull($castFunction(''));
        $this->assertNull($castFunction('invalid-json'));
    }

    /** @test */
    public function it_handles_translatable_attributes_with_language_columns()
    {
        $data = [
            'title_en' => 'English Title',
            'title_id' => 'Indonesian Title',
            'slug_en' => 'english-slug',
            'slug_id' => 'indonesian-slug',
            'content_en' => 'English content',
            'content_id' => 'Indonesian content'
        ];

        $page = new Page();
        
        $columns = PageImporter::getColumns();
        $titleColumn = collect($columns)->first(fn ($column) => $column->getName() === 'title');
        $fillFunction = $titleColumn->getFillRecordUsing();
        
        $fillFunction($page, null, $data);
        
        $this->assertEquals('English Title', $page->getTranslation('title', 'en'));
        $this->assertEquals('Indonesian Title', $page->getTranslation('title', 'id'));
    }

    /** @test */
    public function it_generates_slug_from_title_when_slug_is_empty()
    {
        $data = [
            'title_en' => 'Test Page Title',
            'title_id' => 'Judul Halaman Test'
        ];

        $page = new Page();
        
        $columns = PageImporter::getColumns();
        $slugColumn = collect($columns)->first(fn ($column) => $column->getName() === 'slug');
        $fillFunction = $slugColumn->getFillRecordUsing();
        
        $fillFunction($page, null, $data);
        
        $this->assertEquals('test-page-title', $page->getTranslation('slug', 'en'));
        $this->assertEquals('judul-halaman-test', $page->getTranslation('slug', 'id'));
    }

    /** @test */
    public function it_handles_json_translations_in_base_column()
    {
        $data = [
            'title' => '{"en": "English Title", "id": "Indonesian Title"}'
        ];

        $page = new Page();
        
        $columns = PageImporter::getColumns();
        $titleColumn = collect($columns)->first(fn ($column) => $column->getName() === 'title');
        $fillFunction = $titleColumn->getFillRecordUsing();
        
        $fillFunction($page, null, $data);
        
        $this->assertEquals('English Title', $page->getTranslation('title', 'en'));
        $this->assertEquals('Indonesian Title', $page->getTranslation('title', 'id'));
    }

    /** @test */
    public function it_resolves_existing_record_by_id()
    {
        $existingPage = Page::factory()->create([
            'author_id' => $this->author->id
        ]);

        // Create a partial mock to test resolveRecord
        $importer = $this->getMockBuilder(PageImporter::class)
            ->onlyMethods([])
            ->getMock();
        
        // Set the data property
        $reflection = new \ReflectionClass($importer);
        $property = $reflection->getProperty('data');
        $property->setAccessible(true);
        $property->setValue($importer, ['id' => (string)$existingPage->id]);
        
        $resolvedPage = $importer->resolveRecord();
        
        $this->assertEquals($existingPage->id, $resolvedPage->id);
    }

    /** @test */
    public function it_resolves_existing_record_by_slug()
    {
        $existingPage = Page::factory()->create([
            'slug' => ['en' => 'existing-page'],
            'author_id' => $this->author->id
        ]);

        // Create a partial mock to test resolveRecord
        $importer = $this->getMockBuilder(PageImporter::class)
            ->onlyMethods([])
            ->getMock();
        
        // Set the data property
        $reflection = new \ReflectionClass($importer);
        $property = $reflection->getProperty('data');
        $property->setAccessible(true);
        $property->setValue($importer, ['slug_en' => 'existing-page']);
        
        $resolvedPage = $importer->resolveRecord();
        
        $this->assertEquals($existingPage->id, $resolvedPage->id);
    }

    /** @test */
    public function it_creates_new_record_when_not_found()
    {
        // Create a partial mock to test resolveRecord
        $importer = $this->getMockBuilder(PageImporter::class)
            ->onlyMethods([])
            ->getMock();
        
        // Set the data property
        $reflection = new \ReflectionClass($importer);
        $property = $reflection->getProperty('data');
        $property->setAccessible(true);
        $property->setValue($importer, ['title' => 'New Page']);
        
        $resolvedPage = $importer->resolveRecord();
        
        $this->assertInstanceOf(Page::class, $resolvedPage);
        $this->assertNull($resolvedPage->id);
    }

    /** @test */
    public function it_generates_correct_completion_notification()
    {
        $import = new Import();
        $import->successful_rows = 5;
        
        $notification = PageImporter::getCompletedNotificationBody($import);
        
        $this->assertStringContainsString('5 rows imported', $notification);
    }

    /** @test */
    public function it_includes_failed_rows_in_notification()
    {
        $import = new Import();
        $import->successful_rows = 3;
        
        // Create a proper mock of the Import class
        $importMock = $this->getMockBuilder(Import::class)
            ->onlyMethods(['getFailedRowsCount'])
            ->getMock();
        
        $importMock->method('getFailedRowsCount')->willReturn(2);
        $importMock->successful_rows = 3;
        
        $notification = PageImporter::getCompletedNotificationBody($importMock);
        
        $this->assertStringContainsString('3 rows imported', $notification);
        $this->assertStringContainsString('2 rows failed', $notification);
    }

    /** @test */
    public function it_has_options_form_components()
    {
        $components = PageImporter::getOptionsFormComponents();
        
        $this->assertNotEmpty($components);
        $this->assertCount(1, $components);
        
        $updateExistingComponent = $components[0];
        $this->assertEquals('update_existing', $updateExistingComponent->getName());
    }

    /** @test */
    public function it_fills_author_id_correctly()
    {
        $page = new Page();
        
        $columns = PageImporter::getColumns();
        $authorColumn = collect($columns)->first(fn ($column) => $column->getName() === 'author');
        $fillFunction = $authorColumn->getFillRecordUsing();
        
        $fillFunction($page, $this->secondAuthor->id);
        
        $this->assertEquals($this->secondAuthor->id, $page->author_id);
    }

    /** @test */
    public function it_fills_parent_id_correctly()
    {
        $parentPage = Page::factory()->create(['author_id' => $this->author->id]);
        $page = new Page();
        
        $columns = PageImporter::getColumns();
        $parentColumn = collect($columns)->first(fn ($column) => $column->getName() === 'parent_page');
        $fillFunction = $parentColumn->getFillRecordUsing();
        
        $fillFunction($page, $parentPage->id);
        
        $this->assertEquals($parentPage->id, $page->parent_id);
    }
}