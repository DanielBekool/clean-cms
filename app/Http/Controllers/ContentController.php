<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Models\Page; // Assuming App\Models\Page is your default static page model
use App\Enums\ContentStatus;
use Illuminate\Http\Request;
use Afatmustafa\SeoSuite\Traits\SetsSeoSuite;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException; // Import this

class ContentController extends Controller
{
    use SetsSeoSuite;
    /**
     * Base template directory
     */
    protected string $templateBase = 'templates';

    protected string $defaultLanguage;

    protected int $paginationLimit;

    protected string $staticPageClass;

    /**
     * Constructor to initialize default language, pagination limit, and static page model class.
     */
    public function __construct()
    {
        $this->defaultLanguage = Config::get('cms.default_language');
        $this->paginationLimit = Config::get('cms.pagination_limit', 12);
        $this->staticPageClass = Config::get('cms.static_page_model', Page::class); // Ensure a default fallback here
    }

    /**
     * Displays the home page content based on the configured static page model or a fallback.
     *
     * @param string $lang The current language.
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function home($lang)
    {
        $modelClass = $this->staticPageClass;

        if (!$modelClass || !class_exists($modelClass)) {
            $modelClass = Page::class; // Fallback to default Page model
        }

        // Home page typically uses the default language slug for consistency
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

        // Set SEO metadata
        $this->setsSeo($content);

        $bodyClasses = $this->generateBodyClasses($lang, $content);

        return view($viewName, [
            'lang' => $lang,
            'content' => $content,
            'bodyClasses' => $bodyClasses, // Convert to string for class attribute
        ]);
    }

    /**
     * Static page
     */
    /**
     * Displays a static page based on its slug and language.
     * Redirects to home if the slug matches the configured front page slug.
     *
     * @param \Illuminate\Http\Request $request The incoming request.
     * @param string $lang The current language.
     * @param string $content_slug The slug of the static page.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function staticPage(Request $request, $lang, $content_slug)
    {
        if ($this->isFrontPage($content_slug)) {
            return $this->redirectToHome($lang, $request);
        }

        $result = $this->findStaticOrFallbackContent($lang, $content_slug, $request);

        // If result is a redirect response, return it
        if ($result instanceof \Illuminate\Http\RedirectResponse) {
            return $result;
        }

        // If no content found, throw a 404 error
        if (!$result) {
            abort(404, "Content not found for slug '{$content_slug}' in language '{$lang}'.");
        }

        $content = $result;

        // Determine the template using our page template hierarchy
        $viewName = $this->resolvePageTemplate($content);

        // Set SEO metadata
        $this->setsSeo($content);

        $bodyClasses = $this->generateBodyClasses($lang, $content);

        return view($viewName, [
            'lang' => $lang,
            'content' => $content,
            'bodyClasses' => $bodyClasses, // Convert to string for class attribute
        ]);
    }

    /**
     * Checks if the given slug matches the configured front page slug.
     *
     * @param string $slug The slug to check.
     * @return bool True if the slug is the front page slug, false otherwise.
     */
    private function isFrontPage(string $slug): bool
    {
        return $slug === Config::get('cms.front_page_slug');
    }

    /**
     * Redirects to the home page route, preserving query parameters.
     *
     * @param string $lang The current language.
     * @param \Illuminate\Http\Request $request The incoming request.
     * @return \Illuminate\Http\RedirectResponse
     */
    private function redirectToHome(string $lang, Request $request)
    {
        return redirect()->route('cms.home', array_merge(['lang' => $lang], $request->query()));
    }

    /**
     * Finds static page content by slug and language, or attempts to find fallback content.
     *
     * @param string $lang The current language.
     * @param string $slug The slug of the content.
     * @param \Illuminate\Http\Request $request The incoming request.
     * @return \Illuminate\Database\Eloquent\Model|null|\Illuminate\Http\RedirectResponse The found content model, null, or redirect response.
     */
    private function findStaticOrFallbackContent(string $lang, string $slug, Request $request)
    {
        $modelClass = class_exists($this->staticPageClass) ? $this->staticPageClass : Page::class;

        // Use the updated getPublishedContentBySlug which now handles default language fallback
        $result = $this->getPublishedContentBySlug($modelClass, $lang, $slug, true);

        if ($result['content']) {
            // If content found in fallback language (not requested language), redirect to default language URL
            if (!$result['found_in_requested_lang'] && $lang !== $this->defaultLanguage) {
                return redirect()->route('cms.static.page', array_merge([
                    'lang' => $this->defaultLanguage,
                    'page_slug' => $slug
                ], $request->query()));
            }
            return $result['content'];
        }

        $content = $this->tryFallbackContentModel($lang, $slug, $request);
        return $content;
    }

    /**
     * Attempts to find content using a fallback content model (e.g., 'posts') and redirects if found.
     *
     * @param string $lang The current language.
     * @param string $slug The slug of the content.
     * @param \Illuminate\Http\Request $request The incoming request.
     * @return \Illuminate\Database\Eloquent\Model|null The found content model or null.
     */
    private function tryFallbackContentModel(string $lang, string $slug, Request $request): ?Model
    {
        $fallbackContentType = Config::get('cms.fallback_content_model', 'posts');
        $modelClass = Config::get("cms.content_models.{$fallbackContentType}.model");

        // Use the updated getPublishedContentBySlug which now handles default language fallback
        $result = $this->getPublishedContentBySlug($modelClass, $lang, $slug, true);

        if ($result['content']) {
            // Determine target language for redirect
            $targetLang = $result['found_in_requested_lang'] ? $lang : $this->defaultLanguage;
            
            // Redirect to post route if found
            redirect()->route('cms.single.content', array_merge([
                'lang' => $targetLang,
                'content_type_key' => $fallbackContentType,
                'content_slug' => $slug,
            ], $request->query()))->send(); // Send response immediately
            exit;
        }

        return null;
    }

    /**
     * Builds a query to find published content by slug and language.
     * This private helper is for building the specific query for a given language.
     *
     * @param string $modelClass The fully qualified class name of the model.
     * @param string $queryLang The language code for the query.
     * @param string $contentSlug The slug of the content.
     * @param bool $checkStatus Whether to filter by published status.
     * @return \Illuminate\Database\Eloquent\Builder The query builder instance.
     */
    private function queryContentBySlugAndLanguage(string $modelClass, string $queryLang, string $contentSlug, bool $checkStatus): Builder
    {
        $query = $modelClass::whereJsonContains('slug->' . $queryLang, $contentSlug);

        if ($checkStatus) {
            $query->where('status', ContentStatus::Published);
        }

        return $query;
    }

    /**
     * Finds published content by slug and language, with fallback to default language slug.
     *
     * @param string $modelClass The fully qualified class name of the model.
     * @param string $lang The language code requested (e.g., 'en').
     * @param string $contentSlug The slug of the content.
     * @param bool $checkStatus Whether to filter by published status.
     * @return array ['content' => Model|null, 'found_in_requested_lang' => bool] 
     */
    private function getPublishedContentBySlug(string $modelClass, string $lang, string $contentSlug, bool $checkStatus = false): array
    {
        // 1. Try to find content in the requested language
        $content = $this->queryContentBySlugAndLanguage($modelClass, $lang, $contentSlug, $checkStatus)->first();

        if ($content) {
            return ['content' => $content, 'found_in_requested_lang' => true];
        }

        // 2. If not found in the requested language, try to find in the default language
        // This ensures that if 'en' slug is missing, it falls back to 'id' slug.
        // Only attempt this if the requested language is *not* already the default language
        if ($lang !== $this->defaultLanguage) {
            $content = $this->queryContentBySlugAndLanguage($modelClass, $this->defaultLanguage, $contentSlug, $checkStatus)->first();
            if ($content) {
                return ['content' => $content, 'found_in_requested_lang' => false];
            }
        }

        return ['content' => null, 'found_in_requested_lang' => false];
    }

    /**
     * Finds published content by slug and language, with fallback to default language slug, or throws a ModelNotFoundException.
     *
     * @param string $modelClass The fully qualified class name of the model.
     * @param string $lang The language code requested (e.g., 'en').
     * @param string $contentSlug The slug of the content.
     * @param bool $checkStatus Whether to filter by published status.
     * @return array ['content' => Model, 'found_in_requested_lang' => bool]
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    private function getPublishedContentBySlugOrFail(string $modelClass, string $lang, string $contentSlug, bool $checkStatus = false): array
    {
        // Attempt to get content using the same logic as getPublishedContentBySlug
        $result = $this->getPublishedContentBySlug($modelClass, $lang, $contentSlug, $checkStatus);

        if ($result['content']) {
            return $result;
        }

        // If still not found after trying both requested and default languages, throw an exception
        throw (new ModelNotFoundException)->setModel(
            $modelClass,
            "No query results for [{$modelClass}] with slug '{$contentSlug}' in language '{$lang}' or default language '{$this->defaultLanguage}'."
        );
    }

    /**
     * Displays a single content item (e.g., post, custom post type) based on its type, slug, and language.
     * Redirects static page slugs to the staticPage route.
     *
     * @param \Illuminate\Http\Request $request The incoming request.
     * @param string $lang The current language.
     * @param string $content_type_key The key for the content type (e.g., 'posts').
     * @param string $content_slug The slug of the content item.
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
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
        $modelConfig = Config::get("cms.content_models.{$content_type_key}");
        if (!$modelConfig) {
            abort(404, "Content type '{$content_type_key}' not found in configuration.");
        }
        $modelClass = $modelConfig['model'];

        if (!class_exists($modelClass)) {
            abort(404, "Model for content type '{$content_type_key}' not found or not configured correctly.");
        }

        // This call will now use the updated getPublishedContentBySlugOrFail, handling the default language fallback
        $result = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $content_slug, true);

        // If content found in fallback language (not requested language), redirect to default language URL
        if (!$result['found_in_requested_lang'] && $lang !== $this->defaultLanguage) {
            return redirect()->route('cms.single.content', array_merge([
                'lang' => $this->defaultLanguage,
                'content_type_key' => $content_type_key,
                'content_slug' => $content_slug
            ], $request->query()));
        }

        $content = $result['content'];

        // Increment page views for models that use the HasPageViews trait
        if (in_array(\App\Traits\HasPageViews::class, class_uses_recursive($content))) {
            $content->incrementPageViews();
        }

        // Determine the template using our single content template hierarchy
        $viewName = $this->resolveSingleTemplate($content, $content_type_key, $content_slug);

        // Set SEO metadata
        $this->setsSeo($content);

        $bodyClasses = $this->generateBodyClasses($lang, $content, $content_type_key, $content_slug);

        return view($viewName, [
            'lang' => $lang,
            'content_type' => $content_type_key,
            'content_slug' => $content_slug,
            'content' => $content,
            'title' => $content->title ?? Str::title($content_slug),
            'bodyClasses' => $bodyClasses, // Convert to string for class attribute
        ]);
    }

    /**
     * Displays an archive page for a custom post type.
     * Fetches and paginates content of the specified type.
     *
     * @param string $lang The current language.
     * @param string $content_type_archive_key The key for the content type archive (e.g., 'posts').
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function archiveContent($lang, $content_type_archive_key)
    {
        // Determine the model class from configuration
        $modelConfig = Config::get("cms.content_models.{$content_type_archive_key}");
        if (!$modelConfig) {
            abort(404, "Post type '{$content_type_archive_key}' not found in configuration.");
        }
        $modelClass = $modelConfig['model'];

        if (!class_exists($modelClass)) {
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

        // Set SEO metadata from config or default
        $archiveTitle = Config::get("cms.content_models.{$content_type_archive_key}.archive_SEO_title");
        if ($archiveTitle) {
            SEOTools::setTitle($archiveTitle);
        } else {
            SEOTools::setTitle('Archive: ' . Str::title(str_replace('-', ' ', $content_type_archive_key)));
        }

        $archiveDescription = Config::get("cms.content_models.{$content_type_archive_key}.archive_SEO_description", "Archive of all " . $content_type_archive_key);
        SEOTools::setDescription($archiveDescription);

        $bodyClasses = $this->generateBodyClasses($lang, $archive, $content_type_archive_key);

        return view($viewName, [
            'lang' => $lang,
            'post_type' => $content_type_archive_key,
            'archive' => $archive,
            'title' => 'Archive: ' . Str::title(str_replace('-', ' ', $content_type_archive_key)),
            'posts' => $posts,
            'bodyClasses' => $bodyClasses, // Convert to string for class attribute
        ]);
    }

    /**
     * Displays an archive page for a specific taxonomy term.
     * Fetches the taxonomy term and related content (e.g., posts).
     *
     * @param string $lang The current language.
     * @param string $taxonomy_key The key for the taxonomy type (e.g., 'categories').
     * @param string $taxonomy_slug The slug of the taxonomy term.
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function taxonomyArchive($lang, $taxonomy_key, $taxonomy_slug)
    {
        // Determine the model class from configuration
        $modelConfig = Config::get("cms.content_models.{$taxonomy_key}");
        if (!$modelConfig) {
            abort(404, "Taxonomy type '{$taxonomy_key}' not found in configuration.");
        }
        $modelClass = $modelConfig['model'];

        if (!class_exists($modelClass)) {
            abort(404, "Model for taxonomy type '{$taxonomy_key}' not found or not configured correctly.");
        }

        // Fetch the taxonomy term based on the slug using the private helper function
        // This call will now use the updated getPublishedContentBySlugOrFail, handling the default language fallback
        $result = $this->getPublishedContentBySlugOrFail($modelClass, $lang, $taxonomy_slug, false);

        // If content found in fallback language (not requested language), redirect to default language URL
        if (!$result['found_in_requested_lang'] && $lang !== $this->defaultLanguage) {
            return redirect()->route('cms.taxonomy.archive', array_merge([
                'lang' => $this->defaultLanguage,
                'taxonomy_key' => $taxonomy_key,
                'taxonomy_slug' => $taxonomy_slug
            ], request()->query()));
        }

        $taxonomyModel = $result['content'];

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

        // Set SEO metadata
        $this->setsSeo($taxonomyModel);

        $bodyClasses = $this->generateBodyClasses($lang, $taxonomyModel, $taxonomy_key, $taxonomy_slug);

        return view($viewName, [
            'lang' => $lang,
            'taxonomy' => $taxonomy_key,
            'taxonomy_slug' => $taxonomy_slug,
            'taxonomy_model' => $taxonomyModel,
            'title' => Str::title(str_replace('-', ' ', $taxonomy_key)) . ': ' . Str::title(str_replace('-', ' ', $taxonomy_slug)),
            'posts' => $posts,
            'bodyClasses' => $bodyClasses, // Convert to string for class attribute
        ]);
    }

    /**
     * Resolves the view template for the home page based on a defined hierarchy.
     *
     * @param \Illuminate\Database\Eloquent\Model|null $content The content model for the home page.
     * @return string The name of the view template.
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
     * Resolves the view template for a static page based on a defined hierarchy.
     *
     * @param \Illuminate\Database\Eloquent\Model $content The content model for the page.
     * @return string The name of the view template.
     */
    private function resolvePageTemplate(Model $content): string
    {
        $slug = $content->slug;

        $defaultLanguage = $this->defaultLanguage;
        // Use a null coalesce for getTranslation to handle cases where it might not exist
        $defaultSlug = method_exists($content, 'getTranslation') ? ($content->getTranslation('slug', $defaultLanguage) ?? $slug) : $slug;

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
     * Resolves the view template for a single content item based on a defined hierarchy.
     *
     * @param \Illuminate\Database\Eloquent\Model|null $content The content model.
     * @param string $content_type_key The key for the content type.
     * @param string $contentSlug The slug of the content item.
     * @return string The name of the view template.
     */
    private function resolveSingleTemplate(?Model $content = null, string $content_type_key, string $contentSlug): string
    {
        $postType = Str::kebab(Str::singular($content_type_key));
        $defaultLanguage = $this->defaultLanguage;
        // Use a null coalesce for getTranslation to handle cases where it might not exist
        $defaultSlug = method_exists($content, 'getTranslation') ? ($content->getTranslation('slug', $defaultLanguage) ?? $contentSlug) : $contentSlug;

        $templates = [
            "{$this->templateBase}.singles.{$postType}-{$defaultSlug}", // templates/singles/{post_type}-{slug}.blade.php
            "{$this->templateBase}.singles.{$postType}",                // templates/singles/{post_type}.blade.php
            "{$this->templateBase}.{$postType}",                        // templates/{post_type}.blade.php
            "{$this->templateBase}.singles.default",                     // templates/singles/default.blade.php
            "{$this->templateBase}.default"                              // templates/default.blade.php
        ];

        // If we have content, check for custom template first
        if ($content) {
            $customTemplates = $this->getContentCustomTemplates($content);
            $templates = array_merge($customTemplates, $templates);
        }

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolves the view template for a content archive based on a defined hierarchy.
     *
     * @param string $content_type_archive_key The key for the content type archive.
     * @return string The name of the view template.
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
            "{$this->templateBase}.archives.archive",                             // 4. templates/archives/archive.blade.php
            "{$this->templateBase}.archive",                                      // 5. templates/archive.blade.php
        ];

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Resolves the view template for a taxonomy archive based on a defined hierarchy.
     *
     * @param string $taxonomySlug The slug of the taxonomy term.
     * @param string $taxonomy_key The key for the taxonomy type.
     * @param \Illuminate\Database\Eloquent\Model|null $taxonomyModel The taxonomy term model.
     * @return string The name of the view template.
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
            "{$this->templateBase}.archives.archive",                         // 7. templates/archives/archive.blade.php
            "{$this->templateBase}.archive",                                  // 8. templates/archive.blade.php
        ];

        return $this->findFirstExistingTemplate($templates);
    }

    /**
     * Get custom templates from content model
     */
    /**
     * Gets potential custom template names from a content model.
     * Checks for a 'template' field and a translated slug.
     *
     * @param \Illuminate\Database\Eloquent\Model $content The content model.
     * @return array An array of potential custom template names.
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
    /**
     * Finds the first existing view template from a given array of template names.
     * Returns a default template if none of the provided templates exist.
     *
     * @param array $templates An array of potential template names.
     * @return string The name of the first existing template or the default template.
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

    /**
     * Generates body classes based on language, content, and template.
     *
     * @param string $lang The current language.
     * @param \Illuminate\Database\Eloquent\Model|object|null $content The content model or archive object.
     * @param string|null $contentTypeKey The key for the content type (optional).
     * @param string|null $contentSlug The slug of the content item (optional).
     * @return string The generated body classes string.
     */
    private function generateBodyClasses(string $lang, $content = null, ?string $contentTypeKey = null, ?string $contentSlug = null): string
    {
        $classes = ["lang-{$lang}"];

        if ($content) {
            if ($content instanceof Model) {
                // For actual Eloquent models (single content, static pages, taxonomy terms)
                $classes[] = 'type-' . ($contentTypeKey ?? Str::kebab(Str::singular($content->getTable())));

                // Use default language slug for body class if available, or current slug
                $slugForClass = '';
                if (method_exists($content, 'getTranslation')) {
                    $slugForClass = $content->getTranslation('slug', $this->defaultLanguage) ?? $contentSlug;
                } else {
                    $slugForClass = $contentSlug;
                }
                if ($slugForClass) {
                    $classes[] = 'slug-' . $slugForClass;
                }

                // Add template-specific class if content has a 'template' field
                if (!empty($content->template)) {
                    $classes[] = 'template-' . Str::kebab($content->template);
                }

            } elseif (is_object($content)) {
                // For archive objects (e.g., in archiveContent method)
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
            // General page, like a custom route not tied to a model directly (less common with your setup)
            if ($contentTypeKey) {
                $classes[] = 'page-' . $contentTypeKey;
            }
        }

        // Add a class indicating if it's the home page
        if (request()->routeIs('cms.home')) {
            $classes[] = 'home';
        }

        // Add a class for archives based on route
        if (request()->routeIs('cms.archive.content')) {
            $classes[] = 'archive-page';
        }
        if (request()->routeIs('cms.taxonomy.archive')) {
            $classes[] = 'taxonomy-archive-page';
        }


        // Remove duplicates and return as a space-separated string
        return implode(' ', array_unique($classes));
    }
}