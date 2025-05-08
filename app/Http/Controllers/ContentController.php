<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\App;

class ContentController extends Controller
{
    /**
     * Base template directory
     */
    protected string $templateBase = 'templates';

    /**
     * Home page
     */
    public function home($lang)
    {
        $content = Page::where('slug', 'home')->first();

        if (!$content) {
            $content = Page::orderBy('id', 'asc')->first();
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
    public function staticPage($lang, $content_slug)
    {
        // Fetch the Page content based on the slug
        $content = Page::where('slug', $content_slug)->firstOrFail();

        // Determine the template using our page template hierarchy
        $viewName = $this->resolvePageTemplate($content);

        return view($viewName, [
            'lang' => $lang,
            'content' => $content,
        ]);
    }

    /**
     * Single content (post, custom post type, etc.)
     */
    public function singleContent($lang, $content_type, $content_slug)
    {
        // Determine the model class based on content type
        $modelName = Str::singular(Str::studly($content_type));
        $modelClass = "App\\Models\\$modelName";

        // Fetch the content if the model exists
        $content = null;
        if (class_exists($modelClass)) {
            $content = $modelClass::where('slug', $content_slug)->firstOrFail();
        }

        // Determine the template using our single content template hierarchy
        $viewName = $this->resolveSingleTemplate($content, $content_type, $content_slug);

        return view($viewName, [
            'lang' => $lang,
            'content_type' => $content_type,
            'content_slug' => $content_slug,
            'content' => $content,
            'title' => $content->title ?? Str::title($content_slug),
        ]);
    }

    /**
     * Archive for custom post types
     */
    public function archiveContent($lang, $post_type)
    {
        // Check if the post type exists
        // This could be done in several ways depending on your application structure:

        // Option 1: Check if a model class exists for this post type
        $modelName = Str::singular(Str::studly($post_type));
        $modelClass = "App\\Models\\$modelName";

        if (!class_exists($modelClass)) {
            // Option 2: Check if it's a valid post type in a generic Post model
            // For example, if you have a Post model with a 'type' column
            $validPostTypes = ['post', 'page']; // Add your valid post types here

            if (!in_array($post_type, $validPostTypes)) {
                // If the post type doesn't exist, return a 404
                abort(404, "Post type '$post_type' not found");
            }
        }

        // Fetch posts of the specified type
        // In a real application, you would do something like:
        // $posts = Post::where('post_type', $post_type)->paginate(10);
        // or if you have a model for each post type:
        // $posts = $modelClass::paginate(10);

        // For demonstration purposes, we'll use placeholder data
        $archive = (object) [
            'name' => Str::title($post_type),
            'post_type' => $post_type,
            'description' => 'Archive of all ' . Str::title($post_type) . ' content.'
        ];

        // Determine the template using our archive template hierarchy
        $viewName = $this->resolveArchiveTemplate($post_type);

        return view($viewName, [
            'lang' => $lang,
            'post_type' => $post_type,
            'archive' => $archive,
            'title' => 'Archive: ' . Str::title($post_type),
            'posts' => collect(), // Empty collection for demonstration
        ]);
    }

    /**
     * Taxonomy archive
     */
    public function taxonomyArchive($lang, $taxonomy, $taxonomy_slug)
    {
        // Check if the taxonomy exists
        // This could be done in several ways depending on your application structure:

        // Option 1: Check if a model class exists for this taxonomy
        $modelName = Str::singular(Str::studly($taxonomy));
        $modelClass = "App\\Models\\$modelName";

        if (!class_exists($modelClass)) {
            // Option 2: Check if it's a valid taxonomy type
            $validTaxonomies = ['category', 'tag']; // Add your valid taxonomies here

            if (!in_array($taxonomy, $validTaxonomies)) {
                // If the taxonomy doesn't exist, return a 404
                abort(404, "Taxonomy '$taxonomy' not found");
            }
        }

        // In a real application, you would fetch the taxonomy and related posts
        // For example:
        // $taxonomyModel = $modelClass::where('slug', $taxonomy_slug)->firstOrFail();
        // $posts = $taxonomyModel->posts()->paginate(10);

        // For demonstration purposes, we'll use placeholder data
        $taxonomyModel = (object) [
            'name' => Str::title($taxonomy_slug),
            'slug' => $taxonomy_slug,
            'taxonomy' => $taxonomy,
            'description' => 'This is the description for the ' . Str::title($taxonomy_slug) . ' ' . $taxonomy . '.'
        ];

        // Determine the template using our taxonomy archive template hierarchy
        $viewName = $this->resolveTaxonomyTemplate($taxonomy_slug, $taxonomy);

        return view($viewName, [
            'lang' => $lang,
            'taxonomy' => $taxonomy,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy_model' => $taxonomyModel,
            'title' => Str::title($taxonomy) . ': ' . Str::title($taxonomy_slug),
            'posts' => collect(), // Empty collection for demonstration
        ]);
    }

    /**
     * Sub-taxonomy archive
     */
    public function subTaxonomyArchive($lang, $taxonomy, $taxonomy_parent, $taxonomy_slug)
    {
        // Check if the taxonomy exists
        // This could be done in several ways depending on your application structure:

        // Option 1: Check if a model class exists for this taxonomy
        $modelName = Str::singular(Str::studly($taxonomy));
        $modelClass = "App\\Models\\$modelName";

        if (!class_exists($modelClass)) {
            // Option 2: Check if it's a valid taxonomy type
            $validTaxonomies = ['category', 'tag']; // Add your valid taxonomies here

            if (!in_array($taxonomy, $validTaxonomies)) {
                // If the taxonomy doesn't exist, return a 404
                abort(404, "Taxonomy '$taxonomy' not found");
            }
        }

        // In a real application, you would fetch the sub-taxonomy and related posts
        // For example:
        // $parentTaxonomy = $modelClass::where('slug', $taxonomy_parent)->firstOrFail();
        // $childTaxonomy = $parentTaxonomy->children()->where('slug', $taxonomy_slug)->firstOrFail();
        // $posts = $childTaxonomy->posts()->paginate(10);

        // For now, we'll just use placeholder data
        $taxonomyModel = (object) [
            'name' => Str::title($taxonomy_slug),
            'slug' => $taxonomy_slug,
            'taxonomy' => $taxonomy,
            'parent' => (object) [
                'name' => Str::title($taxonomy_parent),
                'slug' => $taxonomy_parent
            ],
            'description' => 'This is a sub-taxonomy of ' . Str::title($taxonomy_parent) . '.'
        ];

        // Determine the template using our sub-taxonomy archive template hierarchy
        $viewName = $this->resolveSubTaxonomyTemplate($taxonomy_parent, $taxonomy_slug, $taxonomy);

        return view($viewName, [
            'lang' => $lang,
            'taxonomy' => $taxonomy,
            'taxonomy_parent' => $taxonomy_parent,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy_model' => $taxonomyModel,
            'title' => Str::title($taxonomy) . ': ' . Str::title($taxonomy_parent) . ' / ' . Str::title($taxonomy_slug),
            'posts' => collect(), // Empty collection for demonstration
        ]);
    }

    /**
     * Resolve home template
     *
     * Hierarchy:
     * 1. templates/home.blade.php
     * 2. templates/front-page.blade.php
     * 3. templates/index.blade.php
     * 4. templates/default.blade.php
     */
    private function resolveHomeTemplate(?Model $content = null): string
    {
        $templates = [
            "{$this->templateBase}.home",
            "{$this->templateBase}.front-page",
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
     * 2. templates/pages/{slug}.blade.php
     * 3. templates/singles/page-{slug}.blade.php
     * 4. templates/singles/page-{id}.blade.php
     * 5. templates/pages/default.blade.php
     * 6. templates/singles/page.blade.php
     * 7. templates/singles/default.blade.php
     */
    private function resolvePageTemplate(Model $content): string
    {
        $slug = $content->slug;
        $id = $content->id;

        $defaultLanguage = Config::get('cms.default_language');
        $defaultSlug = method_exists($content, 'getTranslation') ? $content->getTranslation('slug', $defaultLanguage) : $slug;

        $templates = [
            "{$this->templateBase}.pages.{$defaultSlug}", // Use default language slug
            "{$this->templateBase}.singles.page-{$defaultSlug}", // Use default language slug
            "{$this->templateBase}.singles.page-{$id}",
            "{$this->templateBase}.pages.default",
            "{$this->templateBase}.singles.page",
            "{$this->templateBase}.singles.default"
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
     * 4. templates/singles/default.blade.php
     */
    private function resolveSingleTemplate(?Model $content = null, string $contentType, string $contentSlug): string
    {
        $postType = Str::kebab(Str::singular($contentType));
        $defaultLanguage = Config::get('cms.default_language');
        $defaultSlug = method_exists($content, 'getTranslation') ? $content->getTranslation('slug', $defaultLanguage) : $contentSlug;

        $templates = [
            "{$this->templateBase}.singles.{$postType}-{$defaultSlug}", // Use default language slug
            "{$this->templateBase}.singles.{$postType}",
            "{$this->templateBase}.singles.default"
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
     * 1. templates/archives/archive-{post_type}.blade.php
     * 2. templates/archives/archive.blade.php
     * 3. templates/archives/default.blade.php
     */
    private function resolveArchiveTemplate(string $postType): string
    {
        $templates = [
            "{$this->templateBase}.archives.archive-{$postType}", // e.g., archives/archive-post.blade.php
            "{$this->templateBase}.archives.archive",
            "{$this->templateBase}.archives.default"
        ];

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve taxonomy template
     *
     * Hierarchy:
     * 1. Custom template specified in content model (`template` field)
     * 2. templates/archives/{taxonomy}-{slug}.blade.php
     * 3. templates/archives/{taxonomy}.blade.php
     * 4. templates/archives/default.blade.php
     */
    private function resolveTaxonomyTemplate(string $taxonomySlug, string $taxonomyType = 'taxonomy'): string
    {

        $templates = [
            "{$this->templateBase}.archives.{$taxonomyType}-{$taxonomySlug}", // e.g., archives/category-news.blade.php
            "{$this->templateBase}.archives.{$taxonomyType}", // e.g., archives/category.blade.php
            "{$this->templateBase}.archives.default"
        ];

        // Taxonomy archives don't have a content model with a 'template' field in this implementation,
        // so we don't check for custom templates here based on the current code structure.
        // If the taxonomy model were passed in, we could check $taxonomy->template.

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve sub-taxonomy template
     *
     * Hierarchy:
     * 1. Custom template specified in content model (`template` field)
     * 2. templates/archives/{taxonomy}-{parent}-{slug}.blade.php
     * 3. templates/archives/{taxonomy}-{parent}.blade.php
     * 4. templates/archives/{taxonomy}-{slug}.blade.php
     * 5. templates/archives/{taxonomy}.blade.php
     * 6. templates/archives/default.blade.php
     */
    private function resolveSubTaxonomyTemplate(string $taxonomyParent, string $taxonomySlug, string $taxonomyType = 'taxonomy'): string
    {

        $templates = [
            "{$this->templateBase}.archives.{$taxonomyType}-{$taxonomyParent}-{$taxonomySlug}", // e.g., archives/category-news-featured.blade.php
            "{$this->templateBase}.archives.{$taxonomyType}-{$taxonomyParent}", // e.g., archives/category-news.blade.php
            "{$this->templateBase}.archives.{$taxonomyType}-{$taxonomySlug}", // e.g., archives/category-featured.blade.php
            "{$this->templateBase}.archives.{$taxonomyType}", // e.g., archives/category.blade.php
            "{$this->templateBase}.archives.default"
        ];

        // Sub-taxonomy archives don't have a content model with a 'template' field in this implementation,
        // so we don't check for custom templates here based on the current code structure.
        // If the sub-taxonomy model were passed in, we could check $subTaxonomy->template.

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
        $defaultLanguage = Config::get('cms.default_language');
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