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
     * Taxonomy archive
     */
    public function taxonomyArchive($lang, $taxonomy_slug)
    {
        // In a real application, you would fetch the taxonomy and related posts
        // For demonstration purposes, we'll create some example data
        
        // Example: Get the taxonomy (category, tag, etc.)
        // $taxonomy = Category::where('slug', $taxonomy_slug)->firstOrFail();
        
        // Example: Get posts related to this taxonomy
        // $posts = $taxonomy->posts()->paginate(10);
        
        // For now, we'll just use placeholder data
        $taxonomy = (object) [
            'name' => Str::title($taxonomy_slug),
            'slug' => $taxonomy_slug,
            'description' => 'This is the description for the ' . Str::title($taxonomy_slug) . ' taxonomy.'
        ];
        
        // Determine the template using our taxonomy archive template hierarchy
        $viewName = $this->resolveTaxonomyTemplate($taxonomy_slug);

        return view($viewName, [
            'lang' => $lang,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy' => $taxonomy,
            'title' => 'Archive: ' . Str::title($taxonomy_slug),
            'posts' => collect(), // Empty collection for demonstration
        ]);
    }

    /**
     * Sub-taxonomy archive
     */
    public function subTaxonomyArchive($lang, $taxonomy_parent, $taxonomy_slug)
    {
        // In a real application, you would fetch the sub-taxonomy and related posts
        // For demonstration purposes, we'll create some example data
        
        // Example: Get the parent taxonomy and child taxonomy
        // $parentTaxonomy = Category::where('slug', $taxonomy_parent)->firstOrFail();
        // $childTaxonomy = $parentTaxonomy->children()->where('slug', $taxonomy_slug)->firstOrFail();
        
        // Example: Get posts related to this sub-taxonomy
        // $posts = $childTaxonomy->posts()->paginate(10);
        
        // For now, we'll just use placeholder data
        $taxonomy = (object) [
            'name' => Str::title($taxonomy_slug),
            'slug' => $taxonomy_slug,
            'parent' => (object) [
                'name' => Str::title($taxonomy_parent),
                'slug' => $taxonomy_parent
            ],
            'description' => 'This is a sub-taxonomy of ' . Str::title($taxonomy_parent) . '.'
        ];
        
        // Determine the template using our sub-taxonomy archive template hierarchy
        $viewName = $this->resolveSubTaxonomyTemplate($taxonomy_parent, $taxonomy_slug);

        return view($viewName, [
            'lang' => $lang,
            'taxonomy_parent' => $taxonomy_parent,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy' => $taxonomy,
            'title' => Str::title($taxonomy_parent) . ': ' . Str::title($taxonomy_slug),
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
            "{$this->templateBase}.index",
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
     * 1. templates/page-{slug}.blade.php
     * 2. templates/page-{id}.blade.php
     * 3. templates/page.blade.php
     * 4. templates/singular.blade.php
     * 5. templates/index.blade.php
     * 6. templates/default.blade.php
     */
    private function resolvePageTemplate(Model $content): string
    {
        $slug = $content->slug;
        $id = $content->id;

        $templates = [
            "{$this->templateBase}.page-{$slug}",
            "{$this->templateBase}.page-{$id}",
            "{$this->templateBase}.pages.{$slug}",
            "{$this->templateBase}.pages.page",
            "{$this->templateBase}.page",
            "{$this->templateBase}.singular",
            "{$this->templateBase}.index",
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
     * 1. templates/single-{post_type}-{slug}.blade.php
     * 2. templates/single-{post_type}.blade.php
     * 3. templates/single.blade.php
     * 4. templates/singular.blade.php
     * 5. templates/index.blade.php
     * 6. templates/default.blade.php
     */
    private function resolveSingleTemplate(?Model $content = null, string $contentType, string $contentSlug): string
    {
        $postType = Str::kebab(Str::singular($contentType));

        $templates = [
            "{$this->templateBase}.single-{$postType}-{$contentSlug}",
            "{$this->templateBase}.single-{$postType}",
            "{$this->templateBase}.single",
            "{$this->templateBase}.singular",
            "{$this->templateBase}.index",
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
     * Resolve taxonomy template
     *
     * Hierarchy:
     * 1. templates/taxonomy-{taxonomy}.blade.php
     * 2. templates/archive-{taxonomy}.blade.php
     * 3. templates/taxonomy.blade.php
     * 4. templates/archive.blade.php
     * 5. templates/index.blade.php
     * 6. templates/default.blade.php
     */
    private function resolveTaxonomyTemplate(string $taxonomySlug): string
    {
        $templates = [
            "{$this->templateBase}.taxonomy-{$taxonomySlug}",
            "{$this->templateBase}.archive-{$taxonomySlug}",
            "{$this->templateBase}.taxonomy",
            "{$this->templateBase}.archive",
            "{$this->templateBase}.index",
            "{$this->templateBase}.default"
        ];

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolve sub-taxonomy template
     *
     * Hierarchy:
     * 1. templates/taxonomy-{parent}-{slug}.blade.php
     * 2. templates/taxonomy-{parent}.blade.php
     * 3. templates/taxonomy-{slug}.blade.php
     * 4. templates/taxonomy.blade.php
     * 5. templates/archive.blade.php
     * 6. templates/index.blade.php
     * 7. templates/default.blade.php
     */
    private function resolveSubTaxonomyTemplate(string $taxonomyParent, string $taxonomySlug): string
    {
        $templates = [
            "{$this->templateBase}.taxonomy-{$taxonomyParent}-{$taxonomySlug}",
            "{$this->templateBase}.taxonomy-{$taxonomyParent}",
            "{$this->templateBase}.taxonomy-{$taxonomySlug}",
            "{$this->templateBase}.taxonomy",
            "{$this->templateBase}.archive",
            "{$this->templateBase}.index",
            "{$this->templateBase}.default"
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

        // // Check for translated slug template
        // $defaultLanguage = Config::get('app.default_language');
        // if (method_exists($content, 'getTranslation')) {
        //     $defaultSlug = $content->getTranslation('slug', $defaultLanguage);

        //     if (!empty($defaultSlug)) {
        //         $templates[] = "{$this->templateBase}.{$defaultSlug}";
        //     }
        // }

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