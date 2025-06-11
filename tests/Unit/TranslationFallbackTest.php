<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\ContentController;
use App\Enums\ContentStatus;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\App;
use Tests\Support\TestPage; // Use our test model
use Spatie\Translatable\HasTranslations; // Required for TestPage
use App\Models\User; // Import the User model
use Tests\Support\MockPageWithoutPartial;

class TranslationFallbackTest extends TestCase
{
    use RefreshDatabase; // Refresh database for each test

    protected function setUp(): void
    {
        parent::setUp();
        // Ensure migrations are run for the in-memory SQLite database
        $this->artisan('migrate');

        // Create a user for foreign key constraint
        User::factory()->create(['id' => 1]);

        Config::set('cms.default_language', 'en');
        App::setLocale('en');
    }

    /**
     * Helper to create a ContentController instance.
     */
    protected function createContentController()
    {
        return new ContentController();
    }

    // ========================================================================
    // Tests for the unified findContent method
    // ========================================================================

    /** @test */
    public function it_finds_content_with_exact_slug_match_in_requested_locale()
    {
        Config::set('cms.default_language', 'en');
        $controller = $this->createContentController();

        TestPage::create([
            'title' => ['en' => 'English Title', 'id' => 'Judul Indonesia'],
            'slug' => ['en' => 'english-slug', 'id' => 'indonesian-slug'],
            'status' => ContentStatus::Published,
            'author_id' => 1,
        ]);

        $result = $this->invokeMethod($controller, 'findContent', [TestPage::class, 'id', 'indonesian-slug']);

        $this->assertNotNull($result['content']);
        $this->assertEquals('id', $result['matched_locale']);
        $this->assertFalse($result['used_fallback']);
        $this->assertEquals('Judul Indonesia', $result['content']->title);
    }

    /** @test */
    public function it_falls_back_to_default_slug_when_requested_slug_is_null()
    {
        Config::set('cms.default_language', 'en');
        $controller = $this->createContentController();

        TestPage::create([
            'title' => ['en' => 'English Title', 'id' => 'Judul Indonesia'],
            'slug' => ['en' => 'english-slug', 'id' => null],
            'status' => ContentStatus::Published,
            'author_id' => 1,
        ]);

        $result = $this->invokeMethod($controller, 'findContent', [TestPage::class, 'id', 'english-slug']);

        $this->assertNotNull($result['content']);
        $this->assertEquals('en', $result['matched_locale']);
        $this->assertTrue($result['used_fallback']);
        $this->assertEquals('partial_translation', $result['fallback_type']);
        $this->assertEquals('Judul Indonesia', $result['content']->title);
    }

    /** @test */
    public function it_does_not_find_content_if_slugs_do_not_match()
    {
        Config::set('cms.default_language', 'en');
        $controller = $this->createContentController();

        TestPage::create([
            'title' => ['en' => 'English Title', 'id' => 'Judul Indonesia'],
            'slug' => ['en' => 'english-slug', 'id' => 'indonesian-slug'],
            'status' => ContentStatus::Published,
            'author_id' => 1,
        ]);

        // Try to access the Indonesian content using the English slug
        $result = $this->invokeMethod($controller, 'findContent', [TestPage::class, 'id', 'english-slug']);

        $this->assertNull($result['content']);
        $this->assertEquals('not_found', $result['fallback_type']);
    }

    /** @test */
    public function it_falls_back_to_default_language_for_empty_content_fields()
    {
        Config::set('cms.default_language', 'en');
        Config::set('app.fallback_locale', 'en');
        $controller = $this->createContentController();

        TestPage::create([
            'title' => ['en' => 'English Title', 'id' => 'Judul Indonesia'],
            'slug' => ['en' => 'english-slug', 'id' => 'indonesian-slug'],
            'content' => ['en' => 'This is the full English content.', 'id' => ''], // Empty Indonesian content
            'status' => ContentStatus::Published,
            'author_id' => 1,
        ]);

        $result = $this->invokeMethod($controller, 'findContent', [TestPage::class, 'id', 'indonesian-slug']);

        $this->assertNotNull($result['content']);
        $this->assertEquals('id', $result['matched_locale']);
        $this->assertFalse($result['used_fallback']); // Not a slug fallback
        $this->assertTrue($result['is_partial_translation']);
        $this->assertContains('content', $result['fallback_fields']);

        // Check that the content attribute falls back to English
        $this->assertEquals('This is the full English content.', $result['content']->content);
        // Check that the title uses the correct locale
        $this->assertEquals('Judul Indonesia', $result['content']->title);
    }

    /** @test */
    public function it_deep_falls_back_if_default_language_is_also_empty()
    {
        // Set default to 'id', but 'id' content will be empty
        Config::set('cms.default_language', 'id');
        Config::set('app.fallback_locale', 'id');
        $controller = $this->createContentController();

        TestPage::create([
            'title' => ['en' => 'English Title', 'id' => 'Judul Indonesia'],
            'slug' => ['en' => 'english-slug', 'id' => 'indonesian-slug'],
            'content' => ['en' => 'This is the English content.', 'id' => ''], // Indonesian content is empty
            'status' => ContentStatus::Published,
            'author_id' => 1,
        ]);

        // Request the 'id' page
        $result = $this->invokeMethod($controller, 'findContent', [TestPage::class, 'id', 'indonesian-slug']);

        $this->assertNotNull($result['content']);
        $this->assertEquals('id', $result['matched_locale']);
        $this->assertTrue($result['is_partial_translation']);
        $this->assertContains('content', $result['fallback_fields']);

        // Check that the content attribute "deep falls back" to English
        $this->assertEquals('This is the English content.', $result['content']->content);
        // Title should still be Indonesian
        $this->assertEquals('Judul Indonesia', $result['content']->title);
    }

    /** @test */
    public function it_handles_models_without_partial_translation_trait_gracefully()
    {
        Config::set('cms.default_language', 'en');
        $controller = $this->createContentController();

        MockPageWithoutPartial::create([
            'title' => ['en' => 'English Title', 'id' => 'Judul Indonesia'],
            'slug' => ['en' => 'english-slug', 'id' => null],
            'status' => ContentStatus::Published,
            'author_id' => 1,
        ]);

        $result = $this->invokeMethod($controller, 'findContent', [MockPageWithoutPartial::class, 'id', 'english-slug']);

        $this->assertNotNull($result['content']);
        $this->assertEquals('en', $result['matched_locale']);
        $this->assertTrue($result['used_fallback']);
        // Without the trait, it should be a simple language fallback
        $this->assertEquals('language_fallback', $result['fallback_type']);
        $this->assertFalse($result['supports_partial']);
    }

    // ========================================================================
    // Reflection Helper for Protected/Private Methods
    // ========================================================================

    /**
     * Call protected/private method of a class.
     *
     * @param object &$object    Instantiated object that has the method.
     * @param string $methodName Method name to call.
     * @param array  $parameters Array of parameters to pass into method.
     *
     * @return mixed Method return.
     */
    public function invokeMethod(&$object, $methodName, array $parameters = array())
    {
        $reflection = new \ReflectionClass(get_class($object));
        $method = $reflection->getMethod($methodName);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $parameters);
    }
}