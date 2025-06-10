<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;
use App\Models\Page;
use App\Models\Post;
use App\Models\User;
use App\Enums\ContentStatus;
use App\Http\Controllers\ContentController;

class ContentControllerTest extends TestCase
{
    use RefreshDatabase;

    private User $author;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite();
        $this->author = User::factory()->create();

        config([
            'cms.default_language' => 'en',
            'cms.language_available' => ['en' => 'English', 'id' => 'Indonesian'],
            'cms.content_models' => [
                'pages' => ['model' => Page::class],
                'posts' => ['model' => Post::class, 'has_archive' => true],
            ],
            'cms.static_page_model' => Page::class,
            'cms.front_page_slug' => 'home',
        ]);

        Route::prefix('{lang}')
            ->whereIn('lang', ['en', 'id'])
            ->group(function () {
                Route::get('/', [ContentController::class, 'home'])->name('cms.home');
                Route::get('/posts', [ContentController::class, 'archiveContent'])
                    ->defaults('content_type_archive_key', 'posts')
                    ->name('cms.archive.content');
                Route::get('/{page_slug}', [ContentController::class, 'staticPage'])->name('cms.static.page');
            });
    }

    /** @test */
    public function it_loads_a_standard_page_successfully()
    {
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['en' => 'About Us'],
            'slug' => ['en' => 'about'],
            'content' => ['en' => 'This is the about page.'],
        ]);

        $this->get('/en/about')
            ->assertOk()
            ->assertSee('This is the about page.');
    }

    /** @test */
    public function it_loads_a_translated_page_with_its_specific_slug()
    {
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['id' => 'Tentang Kami'],
            'slug' => ['id' => 'tentang'],
        ]);

        $this->get('/id/tentang')
            ->assertOk()
            ->assertSee('Tentang Kami');
    }

    /** @test */
    public function it_loads_a_page_with_a_null_slug_via_default_language_fallback()
    {
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['id' => 'Hubungi Kami'],
            'slug' => ['en' => 'contact', 'id' => null],
            'content' => ['id' => 'Konten Indonesia.'],
        ]);

        $this->get('/id/contact')
            ->assertOk()
            ->assertSee('Hubungi Kami')
            ->assertSee('Konten Indonesia.');
    }

    /** @test */
    public function it_returns_404_when_accessing_a_fallback_slug_if_a_specific_slug_exists()
    {
        // Arrange
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['en' => 'Contact Page'], // <-- THE FIX IS HERE
            'slug' => ['en' => 'contact', 'id' => 'kontak'],
        ]);

        // Act
        $response = $this->get('/id/contact');

        // Assert
        $response->assertNotFound();
    }

    /** @test */
    public function it_falls_back_to_default_language_content_when_translated_content_is_null()
    {
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['id' => 'Layanan'],
            'slug' => ['id' => 'layanan'],
            'content' => ['en' => 'This is our service content.', 'id' => null],
        ]);

        $this->get('/id/layanan')
            ->assertOk()
            ->assertSee('Layanan')
            ->assertSee('This is our service content.');
    }

    // ... all other tests remain the same ...

    /** @test */
    public function it_loads_the_home_page_with_the_correct_slug()
    {
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['en' => 'Home'],
            'slug' => ['en' => 'home'],
            'content' => ['en' => 'Welcome to the home page.'],
        ]);

        $this->get('/en')
            ->assertOk()
            ->assertSee('Welcome to the home page.');
    }

    /** @test */
    public function it_falls_back_to_the_first_published_page_if_home_slug_is_missing()
    {
        Page::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['en' => 'First Page'],
            'content' => ['en' => 'This is the first ever page.'],
            'slug' => ['en' => 'not-home'],
        ]);

        $this->get('/en')
            ->assertOk()
            ->assertSee('This is the first ever page.');
    }

    /** @test */
    public function it_loads_an_archive_page()
    {
        Post::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['en' => 'My First Post'],
            'slug' => ['en' => 'my-first-post'],
        ]);
        Post::create([
            'author_id' => $this->author->id,
            'status' => ContentStatus::Published,
            'title' => ['en' => 'My Second Post'],
            'slug' => ['en' => 'my-second-post'],
        ]);

        $this->get('/en/posts')
            ->assertOk()
            ->assertSee('My First Post')
            ->assertSee('My Second Post');
    }

    /** @test */
    public function it_returns_a_404_for_a_non_existent_page()
    {
        $this->get('/en/this-page-does-not-exist')
            ->assertNotFound();
    }
}