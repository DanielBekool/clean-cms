# Architecture and Components

## Core Architecture Overview

### Content Models System
- **Configuration**: Defined in `config/cms.php`
- **Purpose**: Flexible content type management (pages, posts, categories, tags)
- **Benefits**: Easy extension without code changes, declarative configuration

### Schema-Driven Development
- **Central Schema**: `schemas/models.yaml`
- **Model Generation**: `php artisan make:model:from-yaml`
- **Migration Generation**: `php artisan make:migration:from-yaml`
- **Features**: Supports multilingual content, relationships, enums, traits

### Template Hierarchy System
**Location**: `resources/views/templates/`

**Hierarchy Priority** (most specific to general):

1. **Home Page**:
   - `templates/singles/home.blade.php`
   - `templates/singles/front-page.blade.php`
   - `templates/home.blade.php`
   - `templates/front-page.blade.php`
   - `templates/singles/default.blade.php`
   - `templates/default.blade.php`

2. **Static Pages**:
   - Custom template (from `template` field)
   - `templates/singles/{slug}.blade.php`
   - `templates/singles/page.blade.php`
   - `templates/page.blade.php`
   - `templates/singles/default.blade.php`
   - `templates/default.blade.php`

3. **Single Content** (Posts, Custom Post Types):
   - Custom template (from `template` field)
   - `templates/singles/{post_type}-{slug}.blade.php`
   - `templates/singles/{post_type}.blade.php`
   - `templates/{post_type}.blade.php`
   - `templates/singles/default.blade.php`
   - `templates/default.blade.php`

4. **Taxonomy Archives**:
   - Custom template (from `template` field)
   - Config `cms.content_models` archive_view
   - `templates/archives/{taxonomy}-{slug}.blade.php`
   - `templates/archives/{taxonomy}.blade.php`
   - `templates/{taxonomy}-{slug}.blade.php`
   - `templates/{taxonomy}.blade.php`
   - `templates/archives/archive.blade.php`
   - `templates/archive.blade.php`

## Filament Resource Inheritance Hierarchy

### BaseResource (`app/Filament/Abstracts/BaseResource.php`)
**Foundation class for all Filament resources**

**Features**:
- Translatable fields handling
- Standard form fields (featured_image, author_id, status, template, etc.)
- Standard table columns and actions
- Soft delete support
- Reordering by menu_order

**Key Methods**:
- `formContentFields()` - Content-specific form fields
- `formRelationshipsFields()` - Relationship form fields
- `tableColumns()` - Table column definitions

### BaseContentResource (`app/Filament/Abstracts/BaseContentResource.php`)
**Extends BaseResource for content types (Post, Page)**

**Additional Features**:
- Rich editor for content
- Textarea for excerpt
- KeyValue for custom_fields

### BaseTaxonomyResource (`app/Filament/Abstracts/BaseTaxonomyResource.php`)
**Extends BaseResource for taxonomies (Category, Tag)**

**Differences**:
- Removes author, status, featured fields
- Simplified interface for taxonomy management

### BaseEditResource (`app/Filament/Abstracts/BaseEditResource.php`)
**Base for edit pages**

**Actions**:
- Save action
- Delete action
- Restore action

### BaseCreateResource (`app/Filament/Abstracts/BaseCreateResource.php`)
**Base for create pages**

**Actions**:
- Create action

## ContentController - Central Routing

**Location**: `app/Http/Controllers/ContentController.php`

**Responsibilities**:
- Handle all frontend content display
- Multilingual routing with fallback
- Template resolution
- Performance tracking (page views)

**Key Methods**:
- `resolveHomeTemplate()` - Home page templates
- `resolvePageTemplate()` - Static page templates
- `resolveSingleTemplate()` - Single content templates
- `resolveArchiveTemplate()` - Archive templates
- `getPublishedContentBySlug()` - Content retrieval with language detection

## Dynamic Component System

### ComponentLoader (`app/View/Components/ComponentLoader.php`)
**Purpose**: Database-driven component rendering

**Usage**:
```blade
<x-component-loader name="component-slug" />
```

**Implementation**:
1. Fetches component data from `components` table
2. Renders corresponding Blade view in `resources/views/components/dynamic/`
3. Passes component data to view via `$componentData->blocks`

**Example Component Structure**:
```php
// resources/views/components/dynamic/slider.blade.php
@foreach ($componentData->blocks as $block)
    @if ($block['type'] === 'slider')
        <div class="slider-item">
            <h2>{{ $block['data']['heading'] }}</h2>
            <p>{{ $block['data']['description'] }}</p>
            <img src="{{ $block['data']['image_url'] }}" alt="">
        </div>
    @endif
@endforeach
```

## Model Traits System

### HasPageViews (`app/Traits/HasPageViews.php`)
**Features**:
- Automatic view count tracking
- Stored in `custom_fields` JSON column
- Query scopes: `orderByPageViews`, `mostViewed`, `withMinViews`

### HasPageLikes (`app/Traits/HasPageLikes.php`)
**Features**:
- Like/unlike functionality
- Methods: `incrementPageLikes`, `decrementPageLikes`, `setPageLikes`
- Query scopes: `orderByPageLikes`, `mostLiked`, `withMinLikes`

## Multilingual System

### Language Fallback Mechanism
**Implementation**: ContentController with intelligent redirects

**Process**:
1. Check content in requested language
2. If not found, check default language
3. If found in default, redirect to correct language URL
4. Maintains URL-content language consistency

**Example**: `/en/about` → `/id/tentang` (if only Indonesian version exists)

## Database Design Patterns

### JSON Fields for Multilingual Content
- `title`, `slug`, `content`, `excerpt` stored as JSON
- Spatie Translatable package integration
- Fallback language support

### Polymorphic Relationships
- Comments system using `commentable_id` and `commentable_type`
- Flexible association with any content type

### Enum Integration
- Modern PHP enum classes
- Database storage with enum validation
- Example: `App\Enums\ContentStatus`

## Key Configuration Files

### `config/cms.php`
- Content models configuration
- Debug mode settings
- Feature toggles

### `schemas/models.yaml`
- Model definitions
- Field specifications
- Relationship mappings
- Trait assignments