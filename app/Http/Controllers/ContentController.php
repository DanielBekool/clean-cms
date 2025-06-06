<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Page;
use App\Enums\ContentStatus;
use Illuminate\Http\Request;
use Afatmustafa\SeoSuite\Traits\SetsSeoSuite;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;
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
    public function home($lang)
    {
        $modelClass = $this->getValidModelClass($this->staticPageClass);

        // Try to find home page content
        $content = $this->findHomeContent($modelClass);

        if (!$content) {
            abort(404, "Home page content not found or not configured.");
        }

        return $this->renderContentView(
            template: $this->resolveHomeTemplate($content),
            lang: $lang,
            content: $content,
            viewData: ['content' => $content]
        );
    }

    /**
     * Displays a static page
     */
    public function staticPage(Request $request, $lang, $content_slug)
    {
        if ($this->isFrontPage($content_slug)) {
            return $this->redirectToHome($lang, $request);
        }

        $result = $this->findStaticOrFallbackContent($lang, $content_slug, $request);

        if ($result instanceof \Illuminate\Http\RedirectResponse) {
            return $result;
        }

        if (!$result) {
            abort(404, "Content not found for slug '{$content_slug}' in language '{$lang}'.");
        }

        return $this->renderContentView(
            template: $this->resolvePageTemplate($result),
            lang: $lang,
            content: $result,
            viewData: ['content' => $result]
        );
    }

    /**
     * Displays a single content item
     */
    public function singleContent(Request $request, $lang, $content_type_key, $content_slug)
    {
        // Handle static page redirects
        if ($content_type_key === Config::get('cms.static_page_slug')) {
            return redirect()->route('cms.static.page', array_merge(
                ['lang' => $lang, 'page_slug' => $content_slug],
                $request->query()
            ));
        }

        $modelClass = $this->getContentModelClass($content_type_key);
        $result = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $content_slug, true);

        // Handle language fallback redirects
        if (!$result['found_in_requested_lang'] && $lang !== $this->defaultLanguage) {
            return redirect()->route('cms.single.content', array_merge([
                'lang' => $this->defaultLanguage,
                'content_type_key' => $content_type_key,
                'content_slug' => $content_slug
            ], $request->query()));
        }

        $content = $result['content'];

        // Increment page views if supported
        $this->incrementPageViewsIfSupported($content);

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
                'title' => $content->title ?? Str::title($content_slug),
            ]
        );
    }

    /**
     * Displays an archive page for a content type
     */
    public function archiveContent($lang, $content_type_archive_key)
    {
        $modelClass = $this->getContentModelClass($content_type_archive_key);
        
        // Consider adding filters/sorting options here
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
    public function taxonomyArchive($lang, $taxonomy_key, $taxonomy_slug)
    {
        $modelClass = $this->getContentModelClass($taxonomy_key);
        $result = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $taxonomy_slug, false);

        // Handle language fallback redirects
        if (!$result['found_in_requested_lang'] && $lang !== $this->defaultLanguage) {
            return redirect()->route('cms.taxonomy.archive', array_merge([
                'lang' => $this->defaultLanguage,
                'taxonomy_key' => $taxonomy_key,
                'taxonomy_slug' => $taxonomy_slug
            ], request()->query()));
        }

        $taxonomyModel = $result['content'];
        $posts = $this->getTaxonomyRelatedContent($taxonomyModel, $taxonomy_key);

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
                'title' => Str::title(str_replace('-', ' ', $taxonomy_key)) . ': ' . Str::title(str_replace('-', ' ', $taxonomy_slug)),
                'posts' => $posts,
            ]
        );
    }

    // ===== HELPER METHODS =====

    /**
     * Centralized method to render content views with consistent data
     */
    private function renderContentView(
        string $template,
        string $lang,
        $content = null,
        ?string $contentTypeKey = null,
        ?string $contentSlug = null,
        array $viewData = []
    ) {
        // Set SEO metadata
        if ($content && method_exists($this, 'setsSeo')) {
            $this->setsSeo($content);
        }

        $bodyClasses = $this->generateBodyClasses($lang, $content, $contentTypeKey, $contentSlug);

        $defaultData = [
            'lang' => $lang,
            'bodyClasses' => $bodyClasses,
        ];

        return view($template, array_merge($defaultData, $viewData));
    }

    /**
     * Get valid model class with fallback
     */
    private function getValidModelClass(string $modelClass): string
    {
        if (!$modelClass || !class_exists($modelClass)) {
            return Page::class;
        }
        return $modelClass;
    }

    /**
     * Get content model class from configuration
     */
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

    /**
     * Find home page content with caching
     */
    private function findHomeContent(string $modelClass): ?Model
    {
        // Consider adding caching for frequently accessed home content
        return Cache::remember("home_content_{$this->defaultLanguage}", 3600, function () use ($modelClass) {
            $content = $modelClass::whereJsonContains('slug->' . $this->defaultLanguage, 'home')
                ->where('status', ContentStatus::Published)
                ->first();

            if (!$content) {
                $content = $modelClass::where('status', ContentStatus::Published)
                    ->orderBy('id', 'asc')
                    ->first();
            }

            return $content;
        });
    }

    /**
     * Increment page views if the model supports it
     */
    private function incrementPageViewsIfSupported(Model $content): void
    {
        if (in_array(\App\Traits\HasPageViews::class, class_uses_recursive($content))) {
            $content->incrementPageViews();
        }
    }

    /**
     * Create archive object
     */
    private function createArchiveObject(string $contentTypeKey): object
    {
        return (object) [
            'name' => Str::title(str_replace('-', ' ', $contentTypeKey)),
            'post_type' => $contentTypeKey,
            'description' => 'Archive of all ' . Str::title(str_replace('-', ' ', $contentTypeKey)) . ' content.'
        ];
    }

    /**
     * Set SEO metadata for archive pages
     */
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

    /**
     * Get taxonomy related content with better error handling
     */
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

    // ===== EXISTING PRIVATE METHODS (keeping the good ones) =====

    private function isFrontPage(string $slug): bool
    {
        return $slug === Config::get('cms.front_page_slug');
    }

    private function redirectToHome(string $lang, Request $request)
    {
        return redirect()->route('cms.home', array_merge(['lang' => $lang], $request->query()));
    }

    private function findStaticOrFallbackContent(string $lang, string $slug, Request $request)
    {
        $modelClass = $this->getValidModelClass($this->staticPageClass);
        $result = $this->getPublishedContentBySlug($modelClass, $lang, $slug, true);

        if ($result['content']) {
            if (!$result['found_in_requested_lang'] && $lang !== $this->defaultLanguage) {
                return redirect()->route('cms.static.page', array_merge([
                    'lang' => $this->defaultLanguage,
                    'page_slug' => $slug
                ], $request->query()));
            }
            return $result['content'];
        }

        return $this->tryFallbackContentModel($lang, $slug, $request);
    }

    private function tryFallbackContentModel(string $lang, string $slug, Request $request): ?Model
    {
        $fallbackContentType = Config::get('cms.fallback_content_model', 'posts');
        $modelClass = Config::get("cms.content_models.{$fallbackContentType}.model");

        if (!$modelClass || !class_exists($modelClass)) {
            return null;
        }

        $result = $this->getPublishedContentBySlug($modelClass, $lang, $slug, true);

        if ($result['content']) {
            $targetLang = $result['found_in_requested_lang'] ? $lang : $this->defaultLanguage;
            
            redirect()->route('cms.single.content', array_merge([
                'lang' => $targetLang,
                'content_type_key' => $fallbackContentType,
                'content_slug' => $slug,
            ], $request->query()))->send();
            exit;
        }

        return null;
    }

    private function queryContentBySlugAndLanguage(string $modelClass, string $queryLang, string $contentSlug, bool $checkStatus): Builder
    {
        $query = $modelClass::whereJsonContains('slug->' . $queryLang, $contentSlug);

        if ($checkStatus) {
            $query->where('status', ContentStatus::Published);
        }

        return $query;
    }

    private function getPublishedContentBySlug(string $modelClass, string $lang, string $contentSlug, bool $checkStatus = false): array
    {
        // Try requested language first
        $content = $this->queryContentBySlugAndLanguage($modelClass, $lang, $contentSlug, $checkStatus)->first();

        if ($content) {
            return ['content' => $content, 'found_in_requested_lang' => true];
        }

        // Try default language if different
        if ($lang !== $this->defaultLanguage) {
            $content = $this->queryContentBySlugAndLanguage($modelClass, $this->defaultLanguage, $contentSlug, $checkStatus)->first();
            if ($content) {
                return ['content' => $content, 'found_in_requested_lang' => false];
            }
        }

        return ['content' => null, 'found_in_requested_lang' => false];
    }

    private function getPublishedContentBySlugOrFail(string $modelClass, string $lang, string $contentSlug, bool $checkStatus = false): array
    {
        $result = $this->getPublishedContentBySlug($modelClass, $lang, $contentSlug, $checkStatus);

        if ($result['content']) {
            return $result;
        }

        throw (new ModelNotFoundException)->setModel(
            $modelClass,
            "No query results for [{$modelClass}] with slug '{$contentSlug}' in language '{$lang}' or default language '{$this->defaultLanguage}'."
        );
    }

    // Template resolution methods remain the same...
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
                    $slugForClass = $content->getTranslation('slug', $this->defaultLanguage) ?? $contentSlug;
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

        // Route-based classes
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