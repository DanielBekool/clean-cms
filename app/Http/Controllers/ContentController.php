<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Support\Facades\App;
class ContentController extends Controller
{
    public function home($lang)
    {
       
        $content = Page::where('slug', 'home')->first();

        if (!$content) {
            $content = Page::orderBy('id', 'asc')->first();
        }

        $viewName = 'templates.default'; // Default view

        if ($content) {
            // 2. Determine the view to render
            // Check if $content->template is not empty and the corresponding view exists
            if (!empty($content->template)) {
                $templatePath = 'templates.' . $content->template;
                if (View::exists($templatePath)) {
                    $viewName = $templatePath;
                }
            }

            // If $viewName is still 'templates.default' (meaning the $content->template condition wasn't met or its view didn't exist)
            // then proceed to check the slug-based view for the default language.
            if ($viewName === 'templates.default') {
                // Get the slug for the default language
                // Ensure $content is not null before attempting to get a translation
                $defaultLanguage = config('app.default_language');
                $defaultSlug = $content->getTranslation('slug', $defaultLanguage);

                if (!empty($defaultSlug)) {
                    $slugTemplatePath = 'templates.' . $defaultSlug;
                    if (View::exists($slugTemplatePath)) {
                        $viewName = $slugTemplatePath;
                    }
                }
            }

            // If $viewName is still 'templates.default' (meaning neither template nor slug-based view was found)
            // then check for templates/page.blade.php
            if ($viewName === 'templates.default') {
                if (View::exists('templates.page')) {
                    $viewName = 'templates.page';
                }
            }
        
        }

        return view($viewName, [
            'lang' => $lang,
            'content' => $content,
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

    private function determineView(?Model $content): string
    {
        $viewName = 'templates.default';

        if ($content) {
            if (!empty($content->template)) {
                $templatePath = 'templates.' . $content->template;
                if (View::exists($templatePath)) {
                    return $templatePath;
                }
            }

            $defaultLanguage = Config::get('app.default_language');
            if (method_exists($content, 'getTranslation')) {
                $defaultSlug = $content->getTranslation('slug', $defaultLanguage);

                if (!empty($defaultSlug)) {
                    $slugTemplatePath = 'templates.' . $defaultSlug;
                    if (View::exists($slugTemplatePath)) {
                        return $slugTemplatePath;
                    }
                }
            }

            if (View::exists('templates.page')) {
                return 'templates.page';
            }
        }

        return $viewName;
    }
}