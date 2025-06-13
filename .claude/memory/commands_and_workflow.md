# Commands and Development Workflow

## Development Environment Setup
This project uses **Laravel Sail** (Docker-based development environment).

### Essential Development Commands

#### Starting Development Environment
```bash
# Start Sail containers
./vendor/bin/sail up -d

# Start all services (server, queue, logs, vite in parallel) - Custom script
composer run dev
# OR using Sail directly
./vendor/bin/sail composer run dev

# Individual Sail commands
./vendor/bin/sail artisan serve
./vendor/bin/sail artisan queue:listen --tries=1
./vendor/bin/sail artisan pail --timeout=0
./vendor/bin/sail npm run dev
```

#### Stopping Environment
```bash
./vendor/bin/sail down
```

### Testing
```bash
# Using composer script
./vendor/bin/sail composer run test

# Direct testing
./vendor/bin/sail artisan test
./vendor/bin/sail pest
```

### Frontend Build
```bash
./vendor/bin/sail npm run build     # Production build
./vendor/bin/sail npm run dev       # Development build with watch mode
```

### Code Quality
```bash
./vendor/bin/sail artisan pint     # Laravel Pint code formatter
```

## Model and Migration Generation

### From YAML Schema
```bash
# Generate all models from schemas/models.yaml
./vendor/bin/sail artisan make:model:from-yaml

# Generate specific model
./vendor/bin/sail artisan make:model:from-yaml --model=Post

# Force overwrite existing files
./vendor/bin/sail artisan make:model:from-yaml --force

# Generate migrations for all models
./vendor/bin/sail artisan make:migration:from-yaml

# Generate migration for specific model
./vendor/bin/sail artisan make:migration:from-yaml --model=Category
```

### Workflow for Schema Changes
1. Modify `schemas/models.yaml`
2. Run `./vendor/bin/sail artisan make:model:from-yaml`
3. Run `./vendor/bin/sail artisan make:migration:from-yaml`
4. Run `./vendor/bin/sail artisan migrate`
5. Verify generated files

## Content Management Commands

### Scheduled Content
```bash
./vendor/bin/sail artisan cms:publish-scheduled      # Publish scheduled content
```

### SEO and Sitemap
```bash
./vendor/bin/sail artisan sitemap:generate          # Generate sitemap.xml
```

### Media Management
```bash
# Sync Curator media files
./vendor/bin/sail artisan media:sync --update --prune

# Import new files only
./vendor/bin/sail artisan media:sync

# Update metadata for existing
./vendor/bin/sail artisan media:sync --update

# Remove orphaned database records
./vendor/bin/sail artisan media:sync --prune
```

### Instagram Integration
```bash
./vendor/bin/sail artisan instagram:refresh-token    # Refresh Instagram access token
```

### Role Management
```bash
# Generate predefined roles (Super Admin, Admin, Editor)
./vendor/bin/sail artisan cms:generate-roles

# Force overwrite existing roles
./vendor/bin/sail artisan cms:generate-roles --force
```

## Database Operations
```bash
# Run migrations
./vendor/bin/sail artisan migrate

# Fresh migration with seeding
./vendor/bin/sail artisan migrate:fresh --seed

# Rollback migrations
./vendor/bin/sail artisan migrate:rollback

# Database seeding
./vendor/bin/sail artisan db:seed
```

## Custom Command Locations
- `app/Console/Commands/CreateModelCommand.php` - Model generation from YAML
- `app/Console/Commands/CreateMigrationCommand.php` - Migration generation from YAML
- `app/Console/Commands/PublishScheduledContent.php` - Scheduled content publishing
- `app/Console/Commands/GenerateSitemap.php` - Sitemap generation
- `app/Console/Commands/SyncCuratorMedia.php` - Media synchronization
- `app/Console/Commands/RefreshInstagramToken.php` - Instagram token refresh
- `app/Console/Commands/GenerateRolesCommand.php` - Role management

## Tailwind CSS Compilation
```bash
# Compile Filament admin theme
./vendor/bin/sail npx tailwindcss@3 --input ./resources/css/filament/admin/theme.css --output ./public/css/filament/admin/theme.css --config ./resources/css/filament/admin/tailwind.config.js --minify
```

## Useful Sail Shortcuts
```bash
# Create alias for easier usage (add to ~/.bashrc or ~/.zshrc)
alias sail='./vendor/bin/sail'

# Then you can use:
sail up -d
sail artisan migrate
sail npm run dev
```

## Container Management
```bash
# View running containers
./vendor/bin/sail ps

# View logs
./vendor/bin/sail logs

# Access container shell
./vendor/bin/sail shell

# Access MySQL
./vendor/bin/sail mysql

# Clear all caches
./vendor/bin/sail artisan optimize:clear
```

## Scheduled Tasks (Production Cron Configuration)
For production deployment, add to server crontab:
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

Scheduled tasks defined in `routes/console.php`:
- `cms:publish-scheduled` runs every 30 minutes
- `instagram:refresh-token` runs monthly