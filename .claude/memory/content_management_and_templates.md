# Content Management and Templates

## Content Models System

### Configuration Location
- **Main Config**: `config/cms.php`
- **Model Schema**: `schemas/models.yaml`

### YAML Schema Structure
```yaml
models:
    ModelName:
        fields:          # Database columns and properties
        relationships:   # Eloquent relationships
        traits:         # PHP traits
        special_methods: # Custom methods, accessors, appends
```

### Field Types and Properties
**Supported Types**:
- `string` (with optional `length`)
- `text`, `longtext`
- `int`, `integer`, `bigint`, `tinyint`
- `float`, `double`, `decimal` (with `precision` and `scale`)
- `bool`, `boolean`
- `date`, `datetime`, `timestamp`, `time`
- `json`
- `uuid`
- `enum` (requires `enum` array with values)

**Field Properties**:
- `type`: Column type (required)
- `nullable`: Can be null (default: true)
- `unique`: Unique constraint
- `default`: Default value
- `index`: Create index
- `unsigned`: For integers
- `comment`: Database comment
- `translatable`: Spatie Translatable integration
- `enum`: Array of possible values
- `enum_class`: PHP enum class reference

### Relationship Types
- `belongsTo`: Many-to-one
- `hasMany`: One-to-many
- `belongsToMany`: Many-to-many (creates pivot tables)
- `morphTo`: Polymorphic
- `morphMany`: One-to-many polymorphic

## Template System

### Template Resolution Process
**Controller**: `ContentController.php`

**Resolver Methods**:
- `resolveHomeTemplate()` - Home page
- `resolvePageTemplate()` - Static pages
- `resolveSingleTemplate()` - Single content
- `resolveArchiveTemplate()` - Content archives
- `resolveTaxonomyTemplate()` - Taxonomy archives

**Helper Functions**:
- `getContentCustomTemplates()` - Extract custom templates from models
- `findFirstExistingTemplate()` - Check template existence

### Creating Custom Templates

#### Page-Specific Template
```php
// resources/views/templates/singles/about.blade.php
<x-layouts.app :title="$content->title ?? 'About Us'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
        <article class="page about-page">
            <header>
                <h1>{{ $content->title ?? 'About Us' }}</h1>
            </header>
            <div class="page-content">
                {!! $content->content ?? 'Content goes here.' !!}
            </div>
            <!-- Custom sections for this page -->
            <section class="team-section">
                <h2>Our Team</h2>
            </section>
        </article>
    </main>
    <x-partials.footer />
</x-layouts.app>
```

#### Content Type Template
```php
// resources/views/templates/singles/post.blade.php
<x-layouts.app :title="$content->title" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
        <article class="post">
            <header>
                <h1>{{ $content->title }}</h1>
                <div class="post-meta">
                    <time>{{ $content->published_at?->format('F j, Y') }}</time>
                    <span>by {{ $content->author->name }}</span>
                </div>
            </header>
            <div class="post-content">
                {!! $content->content !!}
            </div>
            
            <!-- Post-specific features -->
            <div class="post-engagement">
                <livewire:like-button :content="$content" />
                <x-ui.page-views :count="$content->page_views" />
            </div>
        </article>
    </main>
    <x-partials.footer />
</x-layouts.app>
```

## Dynamic Content Blocks

### Page Section Field
**Model**: Page model includes `section` field (cast to array)

**Accessor**: `getBlocksAttribute()` processes raw section data and injects `media_url` for images

### Displaying Section Data
```blade
{{-- In any page template --}}
@if ($content->blocks)
    @foreach ($content->blocks as $block)
        @if ($block['type'] === 'hero')
            <section class="hero-block">
                @if (isset($block['data']['heading']))
                    <h1>{{ $block['data']['heading'] }}</h1>
                @endif
                @if (isset($block['data']['description']))
                    <div>{!! $block['data']['description'] !!}</div>
                @endif
                @if (isset($block['data']['media_url']))
                    <img src="{{ $block['data']['media_url'] }}" alt="{{ $block['data']['heading'] ?? 'Hero Image' }}">
                @endif
                @if (isset($block['data']['cta-label']) && isset($block['data']['cta-url']))
                    <a href="{{ $block['data']['cta-url'] }}" class="btn">{{ $block['data']['cta-label'] }}</a>
                @endif
            </section>
        @elseif ($block['type'] === 'text')
            <section class="text-block">
                <div class="prose">{!! $block['data']['content'] ?? '' !!}</div>
            </section>
        @elseif ($block['type'] === 'gallery')
            <section class="gallery-block">
                @if (isset($block['data']['images']))
                    <div class="image-grid">
                        @foreach ($block['data']['images'] as $image)
                            <img src="{{ $image['url'] }}" alt="{{ $image['alt'] ?? '' }}">
                        @endforeach
                    </div>
                @endif
            </section>
        @endif
    @endforeach
@endif
```

## Multilingual Content Management

### Translation Fields
**Common Translatable Fields**:
- `title` (JSON)
- `slug` (JSON)
- `content` (JSON)
- `excerpt` (JSON)

### Language Fallback System
**Process**:
1. Request content in specific language
2. If not found, check default language
3. If found in default, redirect to correct URL
4. Preserves SEO and user experience

**Examples**:
- `/en/about` → `/id/tentang` (if only Indonesian exists)
- `/en/posts/article` → `/id/posts/artikel`
- `/en/categories/news` → `/id/categories/berita`

### Implementation in Templates
```blade
{{-- Access translated content --}}
<h1>{{ $content->getTranslation('title', $lang) }}</h1>
<div>{!! $content->getTranslation('content', $lang) !!}</div>

{{-- With fallback --}}
<h1>{{ $content->title ?? $content->getTranslation('title', config('app.fallback_locale')) }}</h1>
```

## Content Status Management

### Status Enum
**Location**: `app/Enums/ContentStatus.php`

**Values**:
- `draft` - Not published
- `published` - Live content
- `scheduled` - Future publication

### Scheduled Publishing
**Command**: `cms:publish-scheduled`
**Schedule**: Every 30 minutes
**Process**: Updates status from `scheduled` to `published` when `published_at` date passes

## SEO and Metadata

### SEO Fields Integration
**Component**: `SeoFields.php` in Filament forms

**Fields**:
- Meta title
- Meta description
- Meta keywords
- Open Graph data
- Twitter Card data

### Sitemap Generation
**Command**: `sitemap:generate`
**Output**: `public/sitemap.xml`
**Process**: Iterates through content models and generates XML sitemap

## Content Relationships

### Post-Category Relationship
```php
// Many-to-many via pivot table
$post->categories()->attach($categoryId);
$post->categories()->detach($categoryId);
$category->posts; // Get all posts in category
```

### Post-Tag Relationship
```php
// Many-to-many via pivot table
$post->tags()->sync($tagIds);
$tag->posts; // Get all posts with tag
```

### Comments System
```php
// Polymorphic relationship
$post->comments; // Get all comments for post
$comment->commentable; // Get the parent content (post/page)
```

### Author Relationship
```php
// Belongs to User
$post->author; // Get post author
$user->posts; // Get all posts by user
```

## Performance Optimization

### Response Caching
**Package**: Spatie Laravel Response Cache
**Configuration**: Automatic caching of static content

### Page View Tracking
**Storage**: `custom_fields` JSON column with `page_views` key
**Increment**: Automatic on content view
**Display**: `<x-ui.page-views>` component

### Query Optimization
**Scopes Available**:
- `orderByPageViews()` - Sort by popularity
- `mostViewed($limit)` - Top viewed content
- `withMinViews($count)` - Filter by minimum views
- `orderByPageLikes()` - Sort by likes
- `mostLiked($limit)` - Top liked content