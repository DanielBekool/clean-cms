<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Enums\ContentStatus;
use Illuminate\Http\Request;
use Afatmustafa\SeoSuite\Traits\SetsSeoSuite;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContentController extends Controller
{
    use SetsSeoSuite;

    protected string $templateBase = 'templates';
    protected string $defaultLanguage;
    protected int $paginationLimit;
    protected string $staticPageClass;

    public function __construct()
    {
        $this->defaultLanguage = Config::get('cms.default_language');
        $this->paginationLimit = Config::get('cms.pagination_limit', 12);
        $this->staticPageClass = Config::get('cms.static_page_model', Page::class);
    }

    /**
     * Displays the home page content
     */
    public function home(string $lang)
    {
        $modelClass = $this->getValidModelClass($this->staticPageClass);
        $result = $this->findContent($modelClass, $lang, 'home');

        if (!$result['content']) {
            $content = $modelClass::where('status', ContentStatus::Published)
                ->orderBy('id', 'asc')
                ->first();

            if (!$content) {
                abort(404, "Home page content not found.");
            }

            $result = [
                'content' => $content,
                'requested_locale' => $lang,
                'matched_locale' => $lang,
                'used_fallback' => false,
                'is_partial_translation' => false,
            ];
        }

        $content = $result['content'];

        if (method_exists($this, 'setsSeo')) {
            $this->setsSeo($content);
        }

        return $this->renderContentView(
            template: $this->resolveHomeTemplate($content),
            lang: $lang,
            content: $content,
            viewData: [
                'content' => $content,
                'translation_info' => $result,
                'title' => $this->getTranslatedFieldSafe($content, 'title', $lang),
                'content_text' => $this->getTranslatedFieldSafe($content, 'content', $lang),
            ]
        );
    }

    /**
     * Displays a static page
     */
    public function staticPage(Request $request, string $lang, string $page_slug)
    {
        if ($this->isFrontPage($page_slug)) {
            return $this->redirectToHome($lang, $request);
        }

        $modelClass = $this->getValidModelClass($this->staticPageClass);
        $result = $this->findContent($modelClass, $lang, $page_slug);

        if (!$result['content']) {
            $fallbackResult = $this->tryFallbackContentModel($lang, $page_slug, $request);
            if ($fallbackResult) {
                return $fallbackResult;
            }
            abort(404, "Page not found for slug '{$page_slug}'");
        }

        $content = $result['content'];

        if (method_exists($this, 'setsSeo')) {
            $this->setsSeo($content);
        }

        return $this->renderContentView(
            template: $this->resolvePageTemplate($content),
            lang: $lang,
            content: $content,
            viewData: [
                'content' => $content,
                'translation_info' => $result,
                // These methods work for any model, with or without trait
                'title' => $this->getTranslatedFieldSafe($content, 'title', $lang),
                'content_text' => $this->getTranslatedFieldSafe($content, 'content', $lang),
            ]
        );
    }

    /**
     * Displays a single content item
     */
    public function singleContent(Request $request, string $lang, string $content_type_key, string $content_slug)
    {
        if ($content_type_key === Config::get('cms.static_page_slug')) {
            return redirect()->route('cms.static.page', array_merge(
                ['lang' => $lang, 'page_slug' => $content_slug],
                $request->query()
            ));
        }

        $modelClass = $this->getContentModelClass($content_type_key);
        $result = $this->findContent($modelClass, $lang, $content_slug);

        if (!$result['content']) {
            throw (new ModelNotFoundException)->setModel(
                $modelClass,
                "No content found for slug '{$content_slug}'"
            );
        }

        $content = $result['content'];
        $this->incrementPageViewsIfSupported($content);

        if (method_exists($this, 'setsSeo')) {
            $this->setsSeo($content);
        }

        return $this->renderContentView(
            template: $this->resolveSingleTemplate($content, $content_type_key, $content_slug),
            lang: $lang,
            content: $content,
            contentTypeKey: $content_type_key,
            contentSlug: $content_slug,
            viewData: [
                'content_type' => $content_type_key,
                'content_slug' => $content_slug,
                'content' => $content,
                'title' => $this->getTranslatedFieldSafe($content, 'title', $lang) ?? Str::title($content_slug),
                'content_text' => $this->getTranslatedFieldSafe($content, 'content', $lang),
                'translation_info' => $result,
            ]
        );
    }

    /**
     * Displays an archive page for a content type
     */
    public function archiveContent(string $lang, string $content_type_archive_key)
    {
        $modelClass = $this->getContentModelClass($content_type_archive_key);

        $posts = $modelClass::where('status', ContentStatus::Published)
            ->orderBy('created_at', 'desc')
            ->paginate($this->paginationLimit);


        $archive = $this->createArchiveObject($content_type_archive_key);
        $this->setArchiveSeoMetadata($content_type_archive_key);

        return $this->renderContentView(
            template: $this->resolveArchiveTemplate($content_type_archive_key),
            lang: $lang,
            content: $archive,
            contentTypeKey: $content_type_archive_key,
            viewData: [
                'post_type' => $content_type_archive_key,
                'archive' => $archive,
                'title' => 'Archive: ' . Str::title(str_replace('-', ' ', $content_type_archive_key)),
                'posts' => $posts,
            ]
        );
    }

    /**
     * Displays a taxonomy archive
     */
    public function taxonomyArchive(string $lang, string $taxonomy_key, string $taxonomy_slug)
    {
        $modelClass = $this->getContentModelClass($taxonomy_key);
        $result = $this->findContent($modelClass, $lang, $taxonomy_slug);

        if (!$result['content']) {
            throw (new ModelNotFoundException)->setModel(
                $modelClass,
                "Taxonomy not found for slug '{$taxonomy_slug}'"
            );
        }

        $taxonomyModel = $result['content'];

        $posts = $this->getTaxonomyRelatedContent($taxonomyModel, $taxonomy_key);

        if (method_exists($this, 'setsSeo')) {
            $this->setsSeo($taxonomyModel);
        }

        return $this->renderContentView(
            template: $this->resolveTaxonomyTemplate($taxonomy_slug, $taxonomy_key, $taxonomyModel),
            lang: $lang,
            content: $taxonomyModel,
            contentTypeKey: $taxonomy_key,
            contentSlug: $taxonomy_slug,
            viewData: [
                'taxonomy' => $taxonomy_key,
                'taxonomy_slug' => $taxonomy_slug,
                'taxonomy_model' => $taxonomyModel,
                'title' => $this->getTranslatedFieldSafe($taxonomyModel, 'title', $lang) ??
                    Str::title(str_replace('-', ' ', $taxonomy_key)) . ': ' .
                    Str::title(str_replace('-', ' ', $taxonomy_slug)),
                'content_text' => $this->getTranslatedFieldSafe($taxonomyModel, 'content', $lang),
                'posts' => $posts,
                'translation_info' => $result,
            ]
        );
    }

    /**
     * Finds content with a robust fallback strategy.
     *
     * This single method handles all content lookups, supporting both full and partial
     * translations. It ensures that content is found correctly based on the slug,
     * locale, and whether the model supports partial field-level fallbacks.
     *
     * The lookup strategy is as follows:
     * 1. **Exact Match:** Tries to find content where the slug in the `requestedLocale`
     *    matches the given `$slug` exactly. This is the primary and most direct method.
     *
     * 2. **Partial Slug Fallback:** If no exact match is found and the `requestedLocale`
     *    is not the default language, it attempts to find content by matching the `$slug`
     *    against the `defaultLanguage`'s slug. This will only succeed if the slug for
     *    the `requestedLocale` is explicitly empty (null or an empty string), preventing
     *    incorrect matches when a slug has been translated.
     *
     * This method returns a detailed array about how the content was found, which is
     * then used throughout the controller to render views and provide context.
     *
     * @param string $modelClass The Eloquent model class to query.
     * @param string $requestedLocale The locale requested in the URL (e.g., 'en').
     * @param string $slug The slug to search for.
     * @return array An array containing the content and translation metadata.
     */
    private function findContent(string $modelClass, string $requestedLocale, string $slug): array
    {
        app()->setLocale($requestedLocale);
        $defaultLanguage = config('cms.default_language', 'en');
        $supportsPartial = $this->modelSupportsPartialTranslation($modelClass);

        // STEP 1: Try exact match in the requested locale.
        $content = $modelClass::where('status', \App\Enums\ContentStatus::Published)
            ->where("slug->{$requestedLocale}", $slug)
            ->first();

        if ($content) {
            $isPartial = $supportsPartial ? $content->isPartialTranslation($requestedLocale) : false;
            return [
                'content' => $content,
                'requested_locale' => $requestedLocale,
                'matched_locale' => $requestedLocale,
                'used_fallback' => false, // Exact slug match is not a fallback
                'fallback_type' => 'none',
                'supports_partial' => $supportsPartial,
                'is_partial_translation' => $isPartial,
                'fallback_fields' => $isPartial ? $content->getFallbackFields($requestedLocale) : [],
            ];
        }

        // STEP 2: If no exact match, try to find content via the default language's slug.
        if ($requestedLocale !== $defaultLanguage) {
            $content = $modelClass::where('status', \App\Enums\ContentStatus::Published)
                ->where("slug->{$defaultLanguage}", $slug)
                // CRUCIAL: Only match if the slug for the requested locale is actually empty.
                ->where(function ($query) use ($requestedLocale) {
                    $query->whereNull("slug->{$requestedLocale}")
                        ->orWhere("slug->{$requestedLocale}", '')
                        ->orWhere("slug->{$requestedLocale}", 'null');
                })
                ->first();

            if ($content) {
                // If we found it via the default slug, it's a slug fallback.
                // It's also considered a partial translation if the model supports it.
                $fallbackType = $supportsPartial ? 'partial_translation' : 'language_fallback';
                return [
                    'content' => $content,
                    'requested_locale' => $requestedLocale,
                    'matched_locale' => $defaultLanguage, // Matched via default lang slug
                    'used_fallback' => true,
                    'fallback_type' => $fallbackType,
                    'supports_partial' => $supportsPartial,
                    'is_partial_translation' => true, // Inherently partial if we got here
                    'fallback_fields' => $supportsPartial ? $content->getFallbackFields($requestedLocale) : [],
                ];
            }
        }

        // STEP 3: Not found
        return [
            'content' => null,
            'requested_locale' => $requestedLocale,
            'matched_locale' => null,
            'used_fallback' => false,
            'fallback_type' => 'not_found',
            'supports_partial' => $supportsPartial,
            'is_partial_translation' => false,
            'fallback_fields' => [],
        ];
    }

    /**
     * Check if model supports partial translations
     */
    protected function modelSupportsPartialTranslation(string $modelClass): bool
    {
        if (!class_exists($modelClass)) {
            return false;
        }

        $traits = class_uses_recursive($modelClass);
        return in_array(\App\Traits\HandlesPartialTranslation::class, $traits);
    }

    /**
     * Safe method to get translated field - works for any model
     */
    private function getTranslatedFieldSafe($content, string $field, string $locale): mixed
    {
        // If model has partial translation trait, use its method
        if (method_exists($content, 'getTranslatedField')) {
            return $content->getTranslatedField($field, $locale);
        }

        // Otherwise, use basic Spatie method with manual fallback
        if (method_exists($content, 'getTranslation')) {
            $value = $content->getTranslation($field, $locale, false);

            // Manual fallback to default language if empty
            if (
                ($value === null || $value === '' || $value === 'null') &&
                $locale !== config('cms.default_language', 'en')
            ) {
                $value = $content->getTranslation($field, config('cms.default_language', 'en'), false);
            }

            return $value;
        }

        // Last resort - direct attribute access
        return $content->{$field} ?? null;
    }
    private function tryFallbackContentModel(string $lang, string $slug, Request $request): ?\Illuminate\Http\RedirectResponse
    {
        $fallbackContentType = Config::get('cms.fallback_content_type', 'posts');
        $modelClass = Config::get("cms.content_models.{$fallbackContentType}.model");

        if (!$modelClass || !class_exists($modelClass)) {
            return null;
        }

        $result = $this->findContent($modelClass, $lang, $slug);

        if ($result['content']) {
            return redirect()->route('cms.single.content', array_merge([
                'lang' => $lang,
                'content_type_key' => $fallbackContentType,
                'content_slug' => $slug,
            ], $request->query()));
        }

        return null;
    }

    // ===== HELPER METHODS =====

    private function renderContentView(
        string $template,
        string $lang,
        $content = null,
        ?string $contentTypeKey = null,
        ?string $contentSlug = null,
        array $viewData = []
    ) {
        $bodyClasses = $this->generateBodyClasses($lang, $content, $contentTypeKey, $contentSlug);

        $defaultData = [
            'lang' => $lang,
            'bodyClasses' => $bodyClasses,
        ];

        return view($template, array_merge($defaultData, $viewData));
    }

    private function getValidModelClass(string $modelClass): string
    {
        if (!$modelClass || !class_exists($modelClass)) {
            return Page::class;
        }
        return $modelClass;
    }

    private function getContentModelClass(string $contentTypeKey): string
    {
        $modelConfig = Config::get("cms.content_models.{$contentTypeKey}");
        if (!$modelConfig) {
            abort(404, "Content type '{$contentTypeKey}' not found in configuration.");
        }
        $modelClass = $modelConfig['model'];
        if (!class_exists($modelClass)) {
            abort(404, "Model for content type '{$contentTypeKey}' not found or not configured correctly.");
        }
        return $modelClass;
    }

    private function incrementPageViewsIfSupported(Model $content): void
    {
        if (in_array(\App\Traits\HasPageViews::class, class_uses_recursive($content))) {
            $content->incrementPageViews();
        }
    }

    private function createArchiveObject(string $contentTypeKey): object
    {
        return (object) [
            'name' => Str::title(str_replace('-', ' ', $contentTypeKey)),
            'post_type' => $contentTypeKey,
            'description' => 'Archive of all ' . Str::title(str_replace('-', ' ', $contentTypeKey)) . ' content.'
        ];
    }

    private function setArchiveSeoMetadata(string $contentTypeKey): void
    {
        $archiveTitle = Config::get("cms.content_models.{$contentTypeKey}.archive_SEO_title");
        $archiveDescription = Config::get("cms.content_models.{$contentTypeKey}.archive_SEO_description");

        if ($archiveTitle) {
            SEOTools::setTitle($archiveTitle);
        } else {
            SEOTools::setTitle('Archive: ' . Str::title(str_replace('-', ' ', $contentTypeKey)));
        }

        if ($archiveDescription) {
            SEOTools::setDescription($archiveDescription);
        } else {
            SEOTools::setDescription("Archive of all " . $contentTypeKey);
        }
    }

    private function getTaxonomyRelatedContent(Model $taxonomyModel, string $taxonomyKey)
    {
        $relationshipName = Config::get("cms.content_models.{$taxonomyKey}.display_content_from", 'posts');
        if (!method_exists($taxonomyModel, $relationshipName)) {
            \Illuminate\Support\Facades\Log::warning("Configured relationship '{$relationshipName}' not found for taxonomy '{$taxonomyKey}'. Falling back to 'posts'.");
            $relationshipName = 'posts';
        }

        if (method_exists($taxonomyModel, $relationshipName)) {
            return $taxonomyModel->{$relationshipName}()
                ->where('status', ContentStatus::Published)
                ->orderBy('created_at', 'desc')
                ->paginate($this->paginationLimit);
        }

        \Illuminate\Support\Facades\Log::warning("Relationship method '{$relationshipName}' ultimately not found for taxonomy '{$taxonomyKey}'. Serving empty collection.");
        return collect();
    }

    private function isFrontPage(string $slug): bool
    {
        return $slug === Config::get('cms.front_page_slug');
    }

    private function redirectToHome(string $lang, Request $request)
    {
        return redirect()->route('cms.home', array_merge(['lang' => $lang], $request->query()));
    }

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
        if ($content) {
            $customTemplates = $this->getContentCustomTemplates($content);
            $templates = array_merge($customTemplates, $templates);
        }
        return $this->findFirstExistingTemplate($templates);
    }

    private function resolvePageTemplate(Model $content): string
    {
        $slug = $content->slug;
        $defaultSlug = method_exists($content, 'getTranslation') ?
            ($content->getTranslation('slug', $this->defaultLanguage) ?? $slug) : $slug;
        $templates = [
            "{$this->templateBase}.singles.{$defaultSlug}",
            "{$this->templateBase}.singles.page",
            "{$this->templateBase}.page",
            "{$this->templateBase}.singles.default",
            "{$this->templateBase}.default"
        ];
        $customTemplates = $this->getContentCustomTemplates($content);
        $templates = array_merge($customTemplates, $templates);
        return $this->findFirstExistingTemplate($templates);
    }

    private function resolveSingleTemplate(?Model $content = null, string $content_type_key, string $contentSlug): string
    {
        $postType = Str::kebab(Str::singular($content_type_key));
        $defaultSlug = method_exists($content, 'getTranslation') ?
            ($content->getTranslation('slug', $this->defaultLanguage) ?? $contentSlug) : $contentSlug;
        $templates = [
            "{$this->templateBase}.singles.{$postType}-{$defaultSlug}",
            "{$this->templateBase}.singles.{$postType}",
            "{$this->templateBase}.{$postType}",
            "{$this->templateBase}.singles.default",
            "{$this->templateBase}.default"
        ];
        if ($content) {
            $customTemplates = $this->getContentCustomTemplates($content);
            $templates = array_merge($customTemplates, $templates);
        }
        return $this->findFirstExistingTemplate($templates);
    }

    private function resolveArchiveTemplate(string $content_type_archive_key): string
    {
        $configView = Config::get("cms.content_models.{$content_type_archive_key}.archive_view");
        if ($configView && View::exists($configView)) {
            return $configView;
        }
        $templates = [
            "{$this->templateBase}.archives.archive-{$content_type_archive_key}",
            "{$this->templateBase}.archive-{$content_type_archive_key}",
            "{$this->templateBase}.archives.archive",
            "{$this->templateBase}.archive",
        ];
        return $this->findFirstExistingTemplate($templates);
    }

    private function resolveTaxonomyTemplate(string $taxonomySlug, string $taxonomy_key = 'taxonomy', ?Model $taxonomyModel = null): string
    {
        if ($taxonomyModel && !empty($taxonomyModel->template)) {
            $customTemplate = "{$this->templateBase}.{$taxonomyModel->template}";
            if (View::exists($customTemplate)) {
                return $customTemplate;
            }
        }
        $configView = Config::get("cms.content_models.{$taxonomy_key}.archive_view");
        if ($configView && View::exists($configView)) {
            return $configView;
        }
        $templates = [
            "{$this->templateBase}.archives.{$taxonomy_key}-{$taxonomySlug}",
            "{$this->templateBase}.archives.{$taxonomy_key}",
            "{$this->templateBase}.{$taxonomy_key}-{$taxonomySlug}",
            "{$this->templateBase}.{$taxonomy_key}",
            "{$this->templateBase}.archives.archive",
            "{$this->templateBase}.archive",
        ];
        return $this->findFirstExistingTemplate($templates);
    }

    private function getContentCustomTemplates(Model $content): array
    {
        $templates = [];
        if (!empty($content->template)) {
            $templates[] = "{$this->templateBase}.{$content->template}";
        }
        if (method_exists($content, 'getTranslation')) {
            $defaultSlug = $content->getTranslation('slug', $this->defaultLanguage);
            if (!empty($defaultSlug)) {
                $templates[] = "{$this->templateBase}.{$defaultSlug}";
            }
        }
        return $templates;
    }

    private function findFirstExistingTemplate(array $templates): string
    {
        foreach ($templates as $template) {
            if (View::exists($template)) {
                return $template;
            }
        }
        return "{$this->templateBase}.default";
    }

    private function generateBodyClasses(string $lang, $content = null, ?string $contentTypeKey = null, ?string $contentSlug = null): string
    {
        $classes = ["lang-{$lang}"];
        if ($content) {
            if ($content instanceof Model) {
                $classes[] = 'type-' . ($contentTypeKey ?? Str::kebab(Str::singular($content->getTable())));
                $slugForClass = '';
                if (method_exists($content, 'getTranslation')) {
                    $slugForClass = $this->getTranslatedFieldSafe($content, 'slug', $lang) ?? $contentSlug;
                } else {
                    $slugForClass = $contentSlug;
                }
                if ($slugForClass) {
                    $classes[] = 'slug-' . $slugForClass;
                }
                if (!empty($content->template)) {
                    $classes[] = 'template-' . Str::kebab($content->template);
                }
            } elseif (is_object($content)) {
                if (isset($content->post_type)) {
                    $classes[] = 'archive-' . $content->post_type;
                } elseif (isset($content->taxonomy)) {
                    $classes[] = 'taxonomy-' . $content->taxonomy;
                    if (isset($content->taxonomy_slug)) {
                        $classes[] = 'term-' . $content->taxonomy_slug;
                    }
                }
            }
        } else {
            if ($contentTypeKey) {
                $classes[] = 'page-' . $contentTypeKey;
            }
        }
        if (request()->routeIs('cms.home')) {
            $classes[] = 'home';
        }
        if (request()->routeIs('cms.archive.content')) {
            $classes[] = 'archive-page';
        }
        if (request()->routeIs('cms.taxonomy.archive')) {
            $classes[] = 'taxonomy-archive-page';
        }
        return implode(' ', array_unique($classes));
    }
}