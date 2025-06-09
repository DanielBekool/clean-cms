# Features and Integrations

## Advanced Debug Mode

### Configuration
**Location**: `config/cms.php` under `debug_mode` array

**Environment Variables**:
```env
CMS_DEBUG_MODE_ENABLED=true
APP_ENV=local
```

### Features Provided
- **Request Details**: ID, timestamp, environment
- **Route Information**: Name, URI, methods, controller, middleware
- **View Information**: Template names and variables (sensitive data redacted)
- **Database Queries**: Queries, bindings, execution time
- **Cache Information**: Hits/misses with keys
- **Component Data**: Dynamic component information
- **Performance Metrics**: Memory usage, execution time

### Configuration Options
```php
'debug_mode' => [
    'enabled' => env('CMS_DEBUG_MODE_ENABLED', false),
    'environments' => ['local', 'development'],
    'max_variable_depth' => 3,
    'max_array_items' => 50,
    'include_queries' => true,
    'include_cache_info' => true,
    'redacted_keys' => ['password', 'token', 'secret', 'key', 'api_key'],
],
```

### Usage
Debug information is injected as HTML comments in the page source. View with browser developer tools or "View Page Source".

## Email Notification System

### Form Submission Notifications
**Components**:
- `app/Mail/FormSubmissionNotification.php` - Mailable class
- `resources/views/emails/admin/form-submission.blade.php` - Template
- `app/Livewire/SubmissionForm.php` - Sends notifications

**Configuration**:
```env
MAIL_ADMIN_EMAIL=admin@example.com
MAIL_MAILER=mailgun
MAIL_FROM_ADDRESS=noreply@example.com
MAILGUN_DOMAIN=mg.example.com
MAILGUN_SECRET=your-secret
```

**Features**:
- Professional Markdown formatting
- Queue support (`ShouldQueue`)
- Reply-to functionality
- Technical information (IP, user agent)
- Direct admin panel links

### Admin Login Notifications
**Components**:
- `app/Mail/AdminLoggedInNotification.php`
- `app/Listeners/SendAdminLoginNotification.php`
- `resources/views/emails/admin/loggedin.blade.php`

### Comment Notifications
**Components**:
- `app/Mail/NewCommentNotification.php`
- `app/Mail/CommentReplyNotification.php`
- Templates in `resources/views/emails/comment/`

## Livewire Components

### Like Button Component
**Location**: `app/Livewire/LikeButton.php`

**Features**:
- Real-time like/unlike functionality
- Cookie-based tracking (`liked_content_{id}`, 1-year expiry)
- Loading states and accessibility
- No page refresh required

**Usage**:
```blade
<livewire:like-button :content="$post" :lang="$lang" :content-type="$contentType" />
```

**Properties**:
- `size`: 'sm', 'md', 'lg'
- `variant`: 'default', 'minimal', 'outline'
- `showCount`: boolean

### Submission Form Component
**Location**: `app/Livewire/SubmissionForm.php`

**Features**:
- Real-time validation with `#[Validate]` attributes
- Animated success messages
- Google reCAPTCHA v2 integration
- Multi-language support
- CSRF protection and input sanitization

**Usage**:
```blade
<livewire:submission-form />
```

**Security Features**:
- Automatic CSRF protection
- IP tracking and user agent logging
- Input sanitization
- Single submission protection

## Page Views Tracking

### Implementation
**Trait**: `app/Traits/HasPageViews.php`
**Storage**: `custom_fields` JSON column with `page_views` key
**Controller**: Auto-increment in `ContentController::singleContent()`

**Features**:
- Automatic view counting
- Query scopes for ordering and filtering
- Blade component for display

**Usage**:
```blade
<x-ui.page-views :count="$post->page_views" />
```

**Query Scopes**:
```php
$posts = Post::orderByPageViews()->get();
$popular = Post::mostViewed(10)->get();
$active = Post::withMinViews(100)->get();
```

## Google reCAPTCHA Integration

### Setup Steps
1. Create site at [Google reCAPTCHA Admin](https://www.google.com/recaptcha/admin)
2. Choose v2 "I'm not a robot" Checkbox
3. Add domains (production and development)

### Configuration
```env
NOCAPTCHA_SITEKEY=your-site-key
NOCAPTCHA_SECRET=your-secret-key
```

### Package Integration
**Package**: `anhskohbo/no-captcha`
**Usage**: Automatically integrated in Livewire forms

### Troubleshooting
- Check domain registration in reCAPTCHA console
- Verify environment variables
- Ensure HTTPS in production
- Monitor browser console for errors

## Instagram Feed Integration

### Package
**Package**: `yizack/instagram-feed`

### Setup
1. **Install**: `composer require yizack/instagram-feed`
2. **Get Access Token**: Follow Meta Developer App instructions
3. **Configure**:
   ```env
   INSTAGRAM_ACCESS_TOKEN="your-access-token"
   ```

### Component Usage
**Location**: `app/View/Components/InstagramFeed.php`

```blade
<x-instagram-feed type="all" :columns="4" />
```

**Parameters**:
- `type`: 'all', 'image', 'video', 'reel'
- `columns`: 1-6 (grid columns)

### Token Management
**Command**: `./vendor/bin/sail artisan instagram:refresh-token`
**Schedule**: Monthly automatic refresh
**Storage**: `public/ig_token/updated.json`

## Role Management System

### Package Integration
**Package**: Spatie Permission with Filament Shield

### Predefined Roles
**Command**: `./vendor/bin/sail artisan cms:generate-roles`

1. **Super Admin**: Full system access
2. **Admin**: Comprehensive content and user management
3. **Editor**: Content-focused, restricted system access

### Permission Structure
- **Super Admin**: All permissions
- **Admin**: All permissions (same as Super Admin)
- **Editor**: Content permissions only, excludes:
  - User management
  - Role management
  - System backups

### Usage
```php
// Assign role
$user->assignRole('editor');

// Check permission
$user->can('view_any_post');

// In Filament policies
class PostPolicy
{
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_post');
    }
}
```

## Media Management

### Curator Integration
**Package**: `awcodes/filament-curator`

**Features**:
- File upload and management
- Image optimization
- Gallery organization
- Alt text and metadata

### Media Sync Command
**Command**: `./vendor/bin/sail artisan media:sync`

**Options**:
- `--update`: Update metadata for existing files
- `--prune`: Remove orphaned database records
- `--disk=public`: Specify filesystem disk
- `--dir=media`: Specify directory

**Use Cases**:
```bash
# Full sync (import, update, prune)
./vendor/bin/sail artisan media:sync --update --prune

# Only import new files
./vendor/bin/sail artisan media:sync

# Update existing metadata
./vendor/bin/sail artisan media:sync --update
```

## SEO Integration

### Package
**Package**: `afatmustafa/seo-suite`

### Features
- Meta title and description management
- Open Graph tags
- Twitter Card support
- Schema.org markup
- Sitemap generation

### Usage in Filament
**Component**: `SeoFields.php` provides form fields for:
- Meta title
- Meta description  
- Meta keywords
- Social media metadata

### Sitemap Generation
**Command**: `./vendor/bin/sail artisan sitemap:generate`
**Output**: `public/sitemap.xml`
**Content**: All published content with proper URLs and metadata

## Performance Features

### Response Caching
**Package**: Spatie Laravel Response Cache
**Configuration**: Automatic caching of static pages
**Cache Headers**: Proper ETags and Last-Modified headers

### Queue Management
**Driver**: Redis (in production) or Database
**Features**: 
- Background email sending
- Media processing
- Social media token refresh

**Commands**:
```bash
# Start queue worker
./vendor/bin/sail artisan queue:work

# Queue with specific tries
./vendor/bin/sail artisan queue:listen --tries=1
```

## Testing Framework

### Pest Integration
**Framework**: Pest with Laravel plugin
**Location**: `tests/` directory
**Configuration**: `tests/Pest.php`

**Commands**:
```bash
# Run all tests
./vendor/bin/sail composer run test

# Run specific test
./vendor/bin/sail pest tests/Feature/ExampleTest.php

# Run with coverage
./vendor/bin/sail pest --coverage
```

### Test Structure
- `tests/Feature/` - Integration tests
- `tests/Unit/` - Unit tests
- `tests/TestCase.php` - Base test class