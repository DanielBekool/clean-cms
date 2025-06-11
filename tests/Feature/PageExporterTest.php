<?php

namespace Tests\Feature;

use App\Enums\ContentStatus;
use App\Filament\Exports\PageExporter;
use App\Models\Page;
use App\Models\User;
use Awcodes\Curator\Models\Media;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PageExporterTest extends TestCase
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
    }

    /** @test */
    public function it_has_correct_model_class()
    {
        $this->assertEquals(Page::class, PageExporter::$model);
    }

    /** @test */
    public function it_modifies_query_with_relationships()
    {
        $query = Page::query();
        $modifiedQuery = PageExporter::modifyQuery($query);
        
        $this->assertNotNull($modifiedQuery);
        
        // Check that the query has the expected eager loading
        $eagerLoad = $modifiedQuery->getEagerLoads();
        $this->assertArrayHasKey('featuredImage', $eagerLoad);
        $this->assertArrayHasKey('author', $eagerLoad);
        $this->assertArrayHasKey('parent', $eagerLoad);
    }

    /** @test */
    public function it_gets_translatable_attributes_from_model()
    {
        $attributes = PageExporter::getTranslatableAttributes();
        
        $this->assertNotEmpty($attributes);
        $this->assertContains('title', $attributes);
        $this->assertContains('slug', $attributes);
        $this->assertContains('content', $attributes);
        $this->assertContains('excerpt', $attributes);
        $this->assertContains('section', $attributes);
    }

    /** @test */
    public function it_returns_correct_export_columns()
    {
        $columns = PageExporter::getColumns();
        
        $this->assertNotEmpty($columns);
        
        $columnNames = collect($columns)->map(fn ($column) => $column->getName())->toArray();
        
        // Check basic columns
        $this->assertContains('id', $columnNames);
        $this->assertContains('status', $columnNames);
        $this->assertContains('template', $columnNames);
        $this->assertContains('menu_order', $columnNames);
        $this->assertContains('author_name', $columnNames);
        $this->assertContains('parent_title', $columnNames);
        $this->assertContains('featured_image', $columnNames);
        $this->assertContains('published_at', $columnNames);
        $this->assertContains('created_at', $columnNames);
        $this->assertContains('updated_at', $columnNames);
        $this->assertContains('custom_fields', $columnNames);
        
        // Check translatable columns for each language
        $translatableAttributes = ['title', 'slug', 'content', 'excerpt', 'section'];
        foreach ($translatableAttributes as $attribute) {
            $this->assertContains("{$attribute}_en", $columnNames);
            $this->assertContains("{$attribute}_id", $columnNames);
        }
    }

    /** @test */
    public function it_formats_status_column_correctly()
    {
        $columns = PageExporter::getColumns();
        $statusColumn = collect($columns)->first(fn ($column) => $column->getName() === 'status');
        $formatFunction = $statusColumn->getFormatStateUsing();
        
        $this->assertEquals('published', $formatFunction(ContentStatus::Published));
        $this->assertEquals('draft', $formatFunction(ContentStatus::Draft));
        $this->assertEquals('scheduled', $formatFunction(ContentStatus::Scheduled));
        $this->assertEquals('simple_string', $formatFunction('simple_string'));
    }

    /** @test */
    public function it_formats_custom_fields_as_json()
    {
        $columns = PageExporter::getColumns();
        $customFieldsColumn = collect($columns)->first(fn ($column) => $column->getName() === 'custom_fields');
        $formatFunction = $customFieldsColumn->getFormatStateUsing();
        
        $testArray = ['field1' => 'value1', 'field2' => 'value2'];
        $result = $formatFunction($testArray);
        
        $this->assertEquals('{"field1":"value1","field2":"value2"}', $result);
        $this->assertEquals('simple_string', $formatFunction('simple_string'));
    }

    /** @test */
    public function it_resolves_record_with_basic_data()
    {
        $page = Page::factory()->create([
            'title' => ['en' => 'Test Page', 'id' => 'Halaman Test'],
            'slug' => ['en' => 'test-page', 'id' => 'halaman-test'],
            'content' => ['en' => 'Test content', 'id' => 'Konten test'],
            'status' => ContentStatus::Published,
            'template' => 'default',
            'menu_order' => 1,
            'author_id' => $this->author->id,
            'custom_fields' => ['field1' => 'value1'],
            'published_at' => Carbon::parse('2024-01-15 10:30:00')
        ]);

        $resolvedData = PageExporter::resolveRecord($page);
        
        $this->assertIsArray($resolvedData);
        $this->assertEquals($page->id, $resolvedData['id']);
        $this->assertEquals('Test Page', $resolvedData['title_en']);
        $this->assertEquals('Halaman Test', $resolvedData['title_id']);
        $this->assertEquals('test-page', $resolvedData['slug_en']);
        $this->assertEquals('halaman-test', $resolvedData['slug_id']);
        $this->assertEquals('Test content', $resolvedData['content_en']);
        $this->assertEquals('Konten test', $resolvedData['content_id']);
        $this->assertEquals($this->author->name, $resolvedData['author_name']);
    }

    /** @test */
    public function it_resolves_record_with_parent_relationship()
    {
        $parentPage = Page::factory()->create([
            'title' => ['en' => 'Parent Page'],
            'author_id' => $this->author->id
        ]);

        $childPage = Page::factory()->create([
            'title' => ['en' => 'Child Page'],
            'parent_id' => $parentPage->id,
            'author_id' => $this->author->id
        ]);

        $resolvedData = PageExporter::resolveRecord($childPage);
        
        $this->assertEquals('Parent Page', $resolvedData['parent_title']);
    }

    /** @test */
    public function it_resolves_record_with_featured_image()
    {
        Storage::fake('public');
        
        $media = Media::factory()->create([
            'filename' => 'test-image.jpg'
        ]);

        $page = Page::factory()->create([
            'title' => ['en' => 'Page with Image'],
            'featured_image' => $media->id,
            'author_id' => $this->author->id
        ]);

        $resolvedData = PageExporter::resolveRecord($page);
        
        $this->assertEquals($media->id, $resolvedData['featured_image']);
    }

    /** @test */
    public function it_handles_empty_translatable_attributes()
    {
        $page = Page::factory()->create([
            'title' => ['en' => 'Test Page'], // Only English title
            'slug' => ['en' => 'test-page'],
            'content' => null, // No content
            'author_id' => $this->author->id
        ]);

        $resolvedData = PageExporter::resolveRecord($page);
        
        $this->assertEquals('Test Page', $resolvedData['title_en']);
        $this->assertEquals('', $resolvedData['title_id']); // Empty for missing translation
        $this->assertEquals('', $resolvedData['content_en']); // Empty for null content
        $this->assertEquals('', $resolvedData['content_id']);
    }

    /** @test */
    public function it_handles_array_values_in_translatable_attributes()
    {
        $sectionData = [
            'blocks' => ['block1', 'block2'],
            'settings' => ['setting1' => 'value1']
        ];

        $page = Page::factory()->create([
            'title' => ['en' => 'Page with Sections'],
            'section' => ['en' => $sectionData],
            'author_id' => $this->author->id
        ]);

        $resolvedData = PageExporter::resolveRecord($page);
        
        $this->assertEquals(json_encode($sectionData), $resolvedData['section_en']);
        $this->assertEquals('', $resolvedData['section_id']); // Empty for missing translation
    }

    /** @test */
    public function it_handles_missing_relationships_gracefully()
    {
        // Create a page with a temporary author first, then manually remove relationships
        $page = Page::factory()->create([
            'title' => ['en' => 'Orphan Page'],
            'author_id' => $this->author->id,
            'parent_id' => null,
            'featured_image' => null
        ]);
        
        // Manually set author to null to test the graceful handling
        $page->update(['author_id' => null]);
        $page->refresh();

        $resolvedData = PageExporter::resolveRecord($page);
        
        $this->assertEquals('', $resolvedData['author_name']);
        $this->assertEquals('', $resolvedData['parent_title']);
        $this->assertNull($resolvedData['featured_image']);
    }

    /** @test */
    public function it_exports_all_available_languages()
    {
        // Test with different language configuration
        config(['cms.language_available' => ['en' => 'English', 'id' => 'Indonesian', 'fr' => 'French']]);
        
        $columns = PageExporter::getColumns();
        $columnNames = collect($columns)->map(fn ($column) => $column->getName())->toArray();
        
        // Check that all languages are included
        $this->assertContains('title_en', $columnNames);
        $this->assertContains('title_id', $columnNames);
        $this->assertContains('title_fr', $columnNames);
        
        $this->assertContains('slug_en', $columnNames);
        $this->assertContains('slug_id', $columnNames);
        $this->assertContains('slug_fr', $columnNames);
    }

    /** @test */
    public function it_generates_correct_completion_notification()
    {
        $export = new Export();
        $export->successful_rows = 10;
        
        $notification = PageExporter::getCompletedNotificationBody($export);
        
        $this->assertStringContainsString('10 rows exported', $notification);
    }

    /** @test */
    public function it_includes_failed_rows_in_notification()
    {
        // Create a proper mock of the Export class
        $exportMock = $this->getMockBuilder(Export::class)
            ->onlyMethods(['getFailedRowsCount'])
            ->getMock();
        
        $exportMock->method('getFailedRowsCount')->willReturn(2);
        $exportMock->successful_rows = 8;
        
        $notification = PageExporter::getCompletedNotificationBody($exportMock);
        
        $this->assertStringContainsString('8 rows exported', $notification);
        $this->assertStringContainsString('2 rows failed', $notification);
    }

    /** @test */
    public function it_handles_single_vs_plural_rows_in_notification()
    {
        // Test singular
        $export = new Export();
        $export->successful_rows = 1;
        
        $notification = PageExporter::getCompletedNotificationBody($export);
        $this->assertStringContainsString('1 row exported', $notification);
        
        // Test plural
        $export->successful_rows = 5;
        $notification = PageExporter::getCompletedNotificationBody($export);
        $this->assertStringContainsString('5 rows exported', $notification);
    }

    /** @test */
    public function it_preserves_original_model_data_in_resolved_record()
    {
        $page = Page::factory()->create([
            'title' => ['en' => 'Test Page'],
            'status' => ContentStatus::Published,
            'menu_order' => 5,
            'template' => 'custom-template',
            'author_id' => $this->author->id,
            'published_at' => Carbon::parse('2024-01-15 10:30:00')
        ]);

        $resolvedData = PageExporter::resolveRecord($page);
        
        // Check that original model data is preserved
        $this->assertEquals($page->id, $resolvedData['id']);
        $this->assertEquals(5, $resolvedData['menu_order']);
        $this->assertEquals('custom-template', $resolvedData['template']);
        $this->assertArrayHasKey('published_at', $resolvedData);
        $this->assertArrayHasKey('created_at', $resolvedData);
        $this->assertArrayHasKey('updated_at', $resolvedData);
    }

    /** @test */
    public function it_handles_complex_custom_fields()
    {
        $complexCustomFields = [
            'settings' => [
                'show_sidebar' => true,
                'sidebar_position' => 'right'
            ],
            'seo' => [
                'meta_title' => 'Custom Meta Title',
                'meta_description' => 'Custom meta description'
            ],
            'components' => ['hero', 'content', 'footer']
        ];

        $page = Page::factory()->create([
            'title' => ['en' => 'Complex Page'],
            'custom_fields' => $complexCustomFields,
            'author_id' => $this->author->id
        ]);

        $resolvedData = PageExporter::resolveRecord($page);
        
        $this->assertEquals($complexCustomFields, $resolvedData['custom_fields']);
    }
}