# Project Overview

## Clean CMS - Laravel-based Content Management System

A modern Laravel 12-based CMS with Filament 3 admin panel, featuring a modular architecture similar to WordPress but built with Laravel best practices.

### Key Technologies
- **Laravel 12** - Core framework
- **Filament 3** - Admin panel interface
- **Livewire** - Interactive frontend components
- **Spatie Translatable** - Multilingual content support
- **Curator** - Media management
- **Shield** - Role-based permissions
- **SEO Suite** - Comprehensive SEO tools

### Core Features
- **Content Models System**: Flexible, configurable content types (pages, posts, categories, tags)
- **Schema-Driven Development**: Models and migrations generated from YAML schema
- **Template Hierarchy**: WordPress-like template resolution system
- **Multilingual Support**: Built-in multi-language with intelligent fallback
- **Dynamic Components**: Database-driven component system
- **Advanced Debug Mode**: Comprehensive debugging with HTML comment injection
- **Email Notifications**: Automated notifications for forms and admin actions
- **Performance Features**: Page views tracking, like functionality, response caching

### Project Structure
```
app/
├── Console/Commands/      # Custom Artisan commands
├── Filament/             # Admin panel resources
│   ├── Abstracts/        # Base classes for resources
│   └── Resources/        # Specific resource implementations
├── Http/Controllers/     # Main controllers (ContentController is central)
├── Livewire/            # Interactive components
├── Models/              # Eloquent models
├── Traits/              # Reusable model traits
└── View/Components/     # Blade components

resources/
├── views/
│   ├── templates/       # Frontend template hierarchy
│   ├── components/      # Blade components
│   └── livewire/       # Livewire views
└── css/                # Styling files

schemas/
└── models.yaml         # Central model definitions
```

### Development Environment
- Uses Docker Compose for containerization
- Pest for testing framework
- Laravel Pint for code formatting
- Vite for asset compilation
- Tailwind CSS for styling

### Key Configuration Files
- `config/cms.php` - CMS-specific configuration
- `schemas/models.yaml` - Model definitions for code generation
- `CLAUDE.md` - Development instructions and architecture notes