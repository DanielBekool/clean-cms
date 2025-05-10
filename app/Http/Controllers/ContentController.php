<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Enums\ContentStatus;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    /**
     * Base template directory
     */
    protected string $templateBase = 'templates';

    protected string $defaultLanguage;

    protected int $paginationLimit;

    protected string $staticPageClass;

    public function __construct()
    {
        $this->defaultLanguage = Config::get('cms.default_language');
        $this->paginationLimit = Config::get('cms.pagination_limit', 12);
        $this->staticPageClass = Config::get('cms.static_page_model');
    }

    /**
     * Home page
     */
    public function home($lang)
    {
        $modelClass = $this->staticPageClass;

        if (!$modelClass || !class_exists($modelClass)) {
            $modelClass = Page::class; // Fallback to default Page model
        }

        $content = $modelClass::whereJsonContains('slug->' . $this->defaultLanguage, 'home')
            ->where('status', ContentStatus::Published)
            ->first();

        if (!$content) {
            // Try to get the first page if 'home' slug is not found or if the model doesn't use slugs like 'home'
            $content = $modelClass::orderBy('id', 'asc')->first();
        }

        // If still no content, it's a genuine 404 or misconfiguration for home.
        if (!$content) {
            abort(404, "Home page content not found or not configured.");
        }

        // Determine the template using our home template hierarchy
        $viewName = $this->resolveHomeTemplate($content);

        return view($viewName, [
            'lang' => $lang,
            'content' => $content,
        ]);
    }

    /**
     * Static page
     */
    public function staticPage(Request $request, $lang, $content_slug)
    {
         // Check the config for cms.front_page_slug
         $frontPageSlug = Config::get('cms.front_page_slug');

         // If the content_slug equals the config cms.front_page_slug,
         // it will be redirected to route cms.home, preserving the query string.
         if ($content_slug === $frontPageSlug) {
             return redirect()->route('cms.home', $lang, $request->query());
         }
        $modelClass = $this->staticPageClass;

        if (!$modelClass || !class_exists($modelClass)) {
            $modelClass = Page::class; // Fallback to default Page model
        }

        // Fetch the Page content based on the slug using the private helper function
        $content = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $content_slug, true);

        // Determine the template using our page template hierarchy
        $viewName = $this->resolvePageTemplate($content);

        return view($viewName, [
            'lang' => $lang,
            'content' => $content,
        ]);
    }

    /**
     * Find published content by slug and language, or fail.
     *
     * @param string $modelClass The fully qualified class name of the model.
     * @param string $lang The language code.
     * @param string $contentSlug The slug of the content.
     * @return \Illuminate\Database\Eloquent\Model The found content model.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    private function getPublishedContentBySlugOrFail(string $modelClass, string $lang, string $contentSlug, bool $checkStatus = false): \Illuminate\Database\Eloquent\Model
    {
        $query = $modelClass::whereJsonContains('slug->' . $lang, $contentSlug);

        if ($checkStatus) {
            $query->where('status', ContentStatus::Published);
        }

        return $query->firstOrFail();
    }

    /**
     * Single content (post, custom post type, etc.)
     */
    public function singleContent(Request $request, $lang, $content_type_key, $content_slug)
    {
        // Check if the content type key matches the static page slug
        $staticPageSlug = Config::get('cms.static_page_slug');
        // ex. /pages/about will be redirected to /about
        if ($content_type_key === $staticPageSlug) {
            return redirect()->route('cms.static.page', array_merge(
                ['lang' => $lang, 'page_slug' => $content_slug],
                $request->query()
            ));
        }

        // Determine the model class from configuration
        $modelClass = Config::get("cms.content_models.{$content_type_key}.model");

        if (!$modelClass || !class_exists($modelClass)) {
            if (!Config::has("cms.content_models.{$content_type_key}")) {
                abort(404, "Content type '{$content_type_key}' not found in configuration.");
            }
            abort(404, "Model for content type '{$content_type_key}' not found or not configured correctly.");
        }

        $content = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $content_slug, true);

        // Determine the template using our single content template hierarchy
        $viewName = $this->resolveSingleTemplate($content, $content_type_key, $content_slug);

        return view($viewName, [
            'lang' => $lang,
            'content_type' => $content_type_key,
            'content_slug' => $content_slug,
            'content' => $content,
            'title' => $content->title ?? Str::title($content_slug),
        ]);
    }

    /**
     * Archive for custom post types
     */
    public function archiveContent($lang, $content_type_archive_key)
    {
        // Determine the model class from configuration
        $modelClass = Config::get("cms.content_models.{$content_type_archive_key}.model");

        if (!$modelClass || !class_exists($modelClass)) {
            if (!Config::has("cms.content_models.{$content_type_archive_key}")) {
                abort(404, "Post type '{$content_type_archive_key}' not found in configuration.");
            }
            abort(404, "Model for post type '{$content_type_archive_key}' not found or not configured correctly.");
        }

        // Fetch posts of the specified type
        $posts = $modelClass::paginate($this->paginationLimit);

        // Create an archive object for the view
        $archive = (object) [
            'name' => Str::title(str_replace('-', ' ', $content_type_archive_key)),
            'post_type' => $content_type_archive_key,
            'description' => 'Archive of all ' . Str::title(str_replace('-', ' ', $content_type_archive_key)) . ' content.'
        ];

        // Determine the template using our archive template hierarchy
        $viewName = $this->resolveArchiveTemplate($content_type_archive_key);

        return view($viewName, [
            'lang' => $lang,
            'post_type' => $content_type_archive_key,
            'archive' => $archive,
            'title' => 'Archive: ' . Str::title(str_replace('-', ' ', $content_type_archive_key)),
            'posts' => $posts,
        ]);
    }

    /**
     * Taxonomy archive
     */
    public function taxonomyArchive($lang, $taxonomy_key, $taxonomy_slug)
    {
        // Determine the model class from configuration
        $modelClass = Config::get("cms.content_models.{$taxonomy_key}.model");

        if (!$modelClass || !class_exists($modelClass)) {
            if (!Config::has("cms.content_models.{$taxonomy_key}")) {
                abort(404, "Taxonomy type '{$taxonomy_key}' not found in configuration.");
            }
            abort(404, "Model for taxonomy type '{$taxonomy_key}' not found or not configured correctly.");
        }

        // Fetch the taxonomy term based on the slug using the private helper function
        $taxonomyModel = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $taxonomy_slug, false);

        // Fetch posts related to this taxonomy term
        $relationshipName = Config::get("cms.content_models.{$taxonomy_key}.display_content_from", 'posts');
        if (!method_exists($taxonomyModel, $relationshipName)) {
            // Log a warning or notice here
            \Illuminate\Support\Facades\Log::warning("Configured relationship '{$relationshipName}' not found for taxonomy '{$taxonomy_key}'. Falling back to 'posts'.");
            $relationshipName = 'posts'; // Fallback to 'posts'
        }

        // Check if the determined relationship method exists
        if (method_exists($taxonomyModel, $relationshipName)) {
            $posts = $taxonomyModel->{$relationshipName}()->paginate($this->paginationLimit);
        } else {
            // Log a warning here
            \Illuminate\Support\Facades\Log::warning("Relationship method '{$relationshipName}' ultimately not found for taxonomy '{$taxonomy_key}'. Serving empty collection.");
            $posts = collect(); // Default to an empty collection
        }

        // Determine the template using our taxonomy archive template hierarchy
        $viewName = $this->resolveTaxonomyTemplate($taxonomy_slug, $taxonomy_key, $taxonomyModel);

        return view($viewName, [
            'lang' => $lang,
            'taxonomy' => $taxonomy_key,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy_model' => $taxonomyModel,
            'title' => Str::title(str_replace('-', ' ', $taxonomy_key)) . ': ' . Str::title(str_replace('-', ' ', $taxonomy_slug)),
            'posts' => $posts,
        ]);
    }

    /**
     * Resolve home template
     *
     * Hierarchy:
     * 1. templates/singles/home.blade.php
     * 2. templates/singles/front-page.blade.php
     * 3. templates/home.blade.php
     * 4. templates/front-page.blade.php
     * 5. templates/singles/default.blade.php
     * 6. templates/default.blade.php
     */
    private function resolveHomeTemplate(?Model $content = null): string
    {
        $templates = [
            "{$this->templateBase}.singles.home",
            "{$this->templateBase}.singles.front-page",
            "{$this->templateBase}.home",
            "{$this->templateBase}.front-page",
            "{$this->templateBase}.singles.default",
            "{$this->templateBase}.default"
        ];

        // If we have content, check for custom template first
        if ($content) {
            $customTemplates = $this->getContentCustomTemplates($content);
            $templates = array_merge($customTemplates, $templates);
        }

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve page template
     *
     * Hierarchy:
     * 1. Custom template specified in content model (`template` field)
     * 2. templates/singles/{slug}.blade.php
     * 3. templates/singles/page.blade.php
     * 4. templates/page.blade.php
     * 5. templates/singles/default.blade.php
     * 6. templates/default.blade.php
     */
    private function resolvePageTemplate(Model $content): string
    {
        $slug = $content->slug;

        $defaultLanguage = $this->defaultLanguage;
        $defaultSlug = method_exists($content, 'getTranslation') ? $content->getTranslation('slug', $defaultLanguage) : $slug;

        $templates = [
            "{$this->templateBase}.singles.{$defaultSlug}",
            "{$this->templateBase}.singles.page",
            "{$this->templateBase}.page",
            "{$this->templateBase}.singles.default",
            "{$this->templateBase}.default"
        ];

        // Check for custom template first
        $customTemplates = $this->getContentCustomTemplates($content);
        $templates = array_merge($customTemplates, $templates);

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve single content template
     *
     * Hierarchy:
     * 1. Custom template specified in content model (`template` field)
     * 2. templates/singles/{post_type}-{slug}.blade.php
     * 3. templates/singles/{post_type}.blade.php
     * 4. templates/{post_type}.blade.php
     * 5. templates/singles/default.blade.php
     * 6. templates/default.blade.php
     */
    private function resolveSingleTemplate(?Model $content = null, string $content_type_key, string $contentSlug): string
    {
        $postType = Str::kebab(Str::singular($content_type_key));
        $defaultLanguage = $this->defaultLanguage;
        $defaultSlug = method_exists($content, 'getTranslation') ? $content->getTranslation('slug', $defaultLanguage) : $contentSlug;

        $templates = [
            "{$this->templateBase}.singles.{$postType}-{$defaultSlug}", // templates/singles/{post_type}-{slug}.blade.php
            "{$this->templateBase}.singles.{$postType}",              // templates/singles/{post_type}.blade.php
            "{$this->templateBase}.{$postType}",                      // templates/{post_type}.blade.php
            "{$this->templateBase}.singles.default",                  // templates/singles/default.blade.php
            "{$this->templateBase}.default"                           // templates/default.blade.php
        ];

        // If we have content, check for custom template first
        if ($content) {
            $customTemplates = $this->getContentCustomTemplates($content);
            $templates = array_merge($customTemplates, $templates);
        }

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve archive template for custom post types
     *
     * Hierarchy:
     * 1. Check the config cms content_type_archive_key archive_view
     * 2. templates/archives/archive-{post_type}.blade.php
     * 3. templates/archive-{post_type}.blade.php
     * 4. templates/archives/archive.blade.php
     * 5. templates/archive.blade.php
     */
    private function resolveArchiveTemplate(string $content_type_archive_key): string
    {
        $templates = [];

        // 1. Check the config cms content_type_archive_key archive_view
        $configView = Config::get("cms.content_models.{$content_type_archive_key}.archive_view");
        if ($configView && View::exists($configView)) {
            return $configView;
        }

        // Fallback templates
        $templates = [
            "{$this->templateBase}.archives.archive-{$content_type_archive_key}", // 2. templates/archives/archive-{post_type}.blade.php
            "{$this->templateBase}.archive-{$content_type_archive_key}",         // 3. templates/archive-{post_type}.blade.php
            "{$this->templateBase}.archives.archive",                            // 4. templates/archives/archive.blade.php
            "{$this->templateBase}.archive",                                     // 5. templates/archive.blade.php
        ];

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve taxonomy template
     *
     * Hierarchy:
     * 1. Custom template specified in content model (`template` field)
     * 2. Check config cms content_models archive_view
     * 3. templates/archives/{taxonomy}-{slug}.blade.php
     * 4. templates/archives/{taxonomy}.blade.php
     * 5. templates/{taxonomy}-{slug}.blade.php
     * 6. templates/{taxonomy}.blade.php
     * 7. templates/archives/archive.blade.php
     * 8. templates/archive.blade.php
     */
    private function resolveTaxonomyTemplate(string $taxonomySlug, string $taxonomy_key = 'taxonomy', ?Model $taxonomyModel = null): string
    {
        // 1. Custom template specified in content model (`template` field)
        if ($taxonomyModel && !empty($taxonomyModel->template)) {
            $customTemplate = "{$this->templateBase}.{$taxonomyModel->template}";
            if (View::exists($customTemplate)) {
                return $customTemplate;
            }
        }

        // 2. Check config cms content_models archive_view
        $configView = Config::get("cms.content_models.{$taxonomy_key}.archive_view");
        if ($configView && View::exists($configView)) {
            return $configView;
        }

        // Fallback templates
        $templates = [
            "{$this->templateBase}.archives.{$taxonomy_key}-{$taxonomySlug}", // 3. templates/archives/{taxonomy}-{slug}.blade.php
            "{$this->templateBase}.archives.{$taxonomy_key}",                 // 4. templates/archives/{taxonomy}.blade.php
            "{$this->templateBase}.{$taxonomy_key}-{$taxonomySlug}",          // 5. templates/{taxonomy}-{slug}.blade.php
            "{$this->templateBase}.{$taxonomy_key}",                          // 6. templates/{taxonomy}.blade.php
            "{$this->templateBase}.archives.archive",                        // 7. templates/archives/archive.blade.php
            "{$this->templateBase}.archive",                                 // 8. templates/archive.blade.php
        ];

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Get custom templates from content model
     */
    private function getContentCustomTemplates(Model $content): array
    {
        $templates = [];

        // Check if content has a custom template field
        if (!empty($content->template)) {
            $templates[] = "{$this->templateBase}.{$content->template}";
        }

        // Check for translated slug template
        $defaultLanguage = $this->defaultLanguage;
        if (method_exists($content, 'getTranslation')) {
            $defaultSlug = $content->getTranslation('slug', $defaultLanguage);

            if (!empty($defaultSlug)) {
                // Add default language slug template as a potential custom template
                $templates[] = "{$this->templateBase}.{$defaultSlug}";
            }
        }

        return $templates;
    }

    /**
     * Find the first template that exists from an array of possibilities
     */
    private function findFirstExistingTemplate(array $templates): string
    {
        foreach ($templates as $template) {
            if (View::exists($template)) {
                return $template;
            }
        }

        // If no template is found, return the default
        return "{$this->templateBase}.default";
    }

}