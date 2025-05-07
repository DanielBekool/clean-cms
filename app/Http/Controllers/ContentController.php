<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\Post;

class ContentController extends Controller
{
    public function home($lang)
    {
        // Try to find a Page with slug 'home'
        $content = Page::where('slug', 'home')->first();

        // If no Page with slug 'home' is found, find the Post with the smallest ID
        if (!$content) {
            $content = Post::orderBy('id', 'asc')->first();
        }

        // Determine the template based on the content type and hierarchy
        $template = null;
        $content = null; // Initialize $content to null
        // Try to find a Page with slug 'home'
        $content = Page::where('slug', 'home')->first();

        // If no Page with slug 'home' is found, find the Post with the smallest ID
        if (!$content) {
            $content = Post::orderBy('id', 'asc')->first();
        }

        if ($content) {
            if ($content instanceof \App\Models\Page) {
                // Check for {page_slug}.blade.php
                $template = 'templates.' . $content->slug;
                if (!View::exists($template)) {
                    // Use static-page.blade.php if it exists
                    if (View::exists('templates.static-page')) {
                        $template = 'templates.static-page';
                    } else {
                        // Use default.blade.php
                        $template = 'templates.default';
                    }
                }
            } elseif ($content instanceof \App\Models\Post) {
                // Check for single-{model_name}.blade.php
                $modelName = \Illuminate\Support\Str::singular(\Illuminate\Support\Str::studly(class_basename($content)));
                $template = 'templates.single-' . \Illuminate\Support\Str::kebab($modelName);
                if (!View::exists($template)) {
                    // Use single-content.blade.php if it exists
                    if (View::exists('templates.single-content')) {
                        $template = 'templates.single-content';
                    } else {
                        // Use default.blade.php
                        $template = 'templates.default';
                    }
                }
            }
        } else {
            // If no content is found, use the default template
            $template = 'templates.default';
        }


        return view($template, [
            'lang' => $lang,
            'content' => $content, // Pass the fetched content to the view
        ]);
    }

    public function staticPage($lang, $content_slug)
    {
        // Fetch the Page content based on the slug
        $content = Page::where('slug', $content_slug)->firstOrFail();

        // Determine template based on slug or use default
        $template = 'templates.' . $content_slug; // Check for {page_slug}.blade.php
        if (!View::exists($template)) {
            // Use static-page.blade.php if it exists
            if (View::exists('templates.static-page')) {
                $template = 'templates.static-page';
            } else {
                // Use default.blade.php
                $template = 'templates.default';
            }
        }

        return view($template, [
            'lang' => $lang,
            'content' => $content, // Pass the fetched content to the view
        ]);
    }

    public function singleContent($lang, $content_type, $content_slug)
    {
        // Logic to fetch single content based on language, type, and slug
        // For now, determine template based on model name or use default

        $modelName = \Illuminate\Support\Str::singular(\Illuminate\Support\Str::studly($content_type));
        $template = 'templates.single-' . \Illuminate\Support\Str::kebab($modelName); // Check for single-{model_name}.blade.php

        if (!View::exists($template)) {
            $template = 'templates.default'; // Use default.blade.php
        }

        return view($template, [
            'lang' => $lang,
            'content_type' => $content_type,
            'content_slug' => $content_slug,
            // Pass fetched content data to the view
        ]);
    }

    public function taxonomyArchive($lang, $taxonomy_slug)
    {
        // Logic to fetch taxonomy archive content based on language and slug
        // For now, determine template based on taxonomy slug or use default

        $template = 'templates.archive-' . $taxonomy_slug; // Check for archive-{taxonomy_slug}.blade.php
        if (!View::exists($template)) {
            $template = 'templates.archive-content'; // Check for archive-content.blade.php
        }
        if (!View::exists($template)) {
            $template = 'templates.default'; // Use default.blade.php
        }

        return view($template, [
            'lang' => $lang,
            'taxonomy_slug' => $taxonomy_slug,
            // Pass fetched content data to the view
        ]);
    }

    public function subTaxonomyArchive($lang, $taxonomy_parent, $taxonomy_slug)
    {
        // Logic to fetch sub-taxonomy archive content based on language, parent, and slug
        // For now, determine template based on taxonomy slug or use default

        $template = 'templates.archive-' . $taxonomy_slug; // Check for archive-{taxonomy_slug}.blade.php
        if (!View::exists($template)) {
            $template = 'templates.archive-content'; // Check for archive-content.blade.php
        }
        if (!View::exists($template)) {
            $template = 'templates.default'; // Use default.blade.php
        }

        return view($template, [
            'lang' => $lang,
            'taxonomy_parent' => $taxonomy_parent,
            'taxonomy_slug' => $taxonomy_slug,
            // Pass fetched content data to the view
        ]);
    }
}