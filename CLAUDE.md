# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Essential Commands

### Development
```bash
# Start development environment (runs server, queue, logs, and vite in parallel)
composer run dev

# Alternative individual commands
php artisan serve
php artisan queue:listen --tries=1
php artisan pail --timeout=0
npm run dev
```

### Testing
```bash
composer run test  # Clears config and runs tests
php artisan test   # Run tests directly
```

### Frontend Build
```bash
npm run build     # Production build
npm run dev       # Development build with watch mode
```

### Common Artisan Commands
```bash
# Model and migration generation from YAML schema
php artisan make:model:from-yaml
php artisan make:migration:from-yaml

# Content management
php artisan cms:publish-scheduled      # Publish scheduled content
php artisan sitemap:generate          # Generate sitemap.xml
php artisan media:sync --update --prune   # Sync Curator media files

# Instagram integration
php artisan instagram:refresh-token    # Refresh Instagram access token
```

### Linting and Code Quality
```bash
php artisan pint     # Laravel Pint code formatter
```

## Architecture Overview

This is a Laravel 12-based CMS with Filament 3 admin panel, featuring a modular architecture similar to WordPress but built with modern Laravel practices.

### Core Architecture

**Content Models System**: The CMS uses a flexible content model system defined in `config/cms.php`. Content types (pages, posts, categories, tags) are configured declaratively, enabling easy extension without code changes.

**Schema-Driven Development**: Models and migrations are generated from `schemas/models.yaml` using custom Artisan commands. This ensures consistency between database structure and Eloquent models while supporting multilingual content via Spatie Translatable.

**Template Hierarchy**: Implements a WordPress-like template hierarchy system in `resources/views/templates/`. Templates are resolved based on content type, slug, and custom template fields, falling back gracefully to default templates.

**Filament Resource Inheritance**: Admin resources use a sophisticated inheritance hierarchy:
- `BaseResource` - Common functionality for all resources
- `BaseContentResource` - Extends BaseResource for content types (Post, Page)
- `BaseTaxonomyResource` - Extends BaseResource for taxonomies (Category, Tag)

### Key Components

**ContentController**: Central routing controller (`app/Http/Controllers/ContentController.php`) that handles all frontend content display with multilingual support and template resolution.

**Dynamic Components**: Database-driven component system where components are managed in the admin panel and rendered dynamically using `ComponentLoader` (`app/View/Components/ComponentLoader.php`).

**Multilingual Support**: Built-in support for multiple languages using Spatie Translatable, with fallback to default language and proper URL structure.

**SEO Integration**: Uses Afatmustafa SEO Suite for comprehensive SEO management with automatic sitemap generation.

### Database Design

Models are defined in YAML schema with support for:
- JSON fields for multilingual content
- Polymorphic relationships (comments)
- Many-to-many relationships with pivot tables
- Self-referencing hierarchies (categories, pages)
- Soft deletes and status enums

### Admin Panel Features

**Filament 3 Integration**: Modern admin interface with:
- Translatable field components
- File management via Curator
- Role-based permissions via Shield
- Bulk operations and advanced filtering
- Content scheduling and status management

**Debug Mode**: Advanced debugging system that injects HTML comments into frontend output with request details, queries, and performance metrics (configurable in `config/cms.php`).

## Important File Locations

- `schemas/models.yaml` - Model definitions for code generation
- `config/cms.php` - CMS configuration including content models and features
- `app/Filament/Abstracts/` - Base classes for admin resources
- `resources/views/templates/` - Frontend template hierarchy
- `app/Http/Controllers/ContentController.php` - Main content routing

## Development Notes

**Custom Artisan Commands**: The project includes several custom commands in `app/Console/Commands/` for model generation, content publishing, and media management.

**Performance Features**: Includes page view tracking, like functionality, and response caching via Spatie Laravel Response Cache.

**Email System**: Automated email notifications for form submissions and admin actions with queue support.

**Testing Framework**: Uses Pest for testing with Laravel-specific plugins configured.