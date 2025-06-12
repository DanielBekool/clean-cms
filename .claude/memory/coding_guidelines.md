# Laravel 12 Coding Guidelines

## PHP Coding Standards
- Follow PSR-12 coding standards
- Use typed properties and return types
- Use native PHP 8.3+ features when available

## Laravel-Specific Guidelines
- Use Laravel's built-in validation rules
- Implement repository pattern for database operations
- Use Laravel's service container for dependency injection
- Prefer Eloquent over raw queries when possible

## File Structure
- Controllers should be thin and delegate to services
- Business logic should live in dedicated service classes
- Use Laravel Resources for API responses
- Store complex queries in dedicated Query objects

## Naming Conventions
- Controllers: Plural, PascalCase (e.g., UsersController)
- Models: Singular, PascalCase (e.g., User)
- Database tables: Plural, snake_case (e.g., user_profiles)
- Database columns: snake_case (e.g., first_name)

## Testing
- Write feature tests for all API endpoints
- Use factories for test data
- Mock external services

# Filament PHP Guidelines for Laravel 12

## Filament Resources
- Use one resource class per model
- Group related resources using panels
- Implement custom authorization policies for each resource
- Prefer Filament Forms API over custom form implementations

## Form Fields
- Group related fields using fieldsets or tabs
- Add helpful placeholder text and hints for complex fields
- Use field validation consistent with model validation
- Implement custom field behavior with hooks rather than overriding core methods

## Tables
- Use consistent column formatting across similar resources
- Implement appropriate filters for each resource
- Use bulk actions for common operations
- Configure default sorting based on user needs

## Components
- Create reusable custom form components for project-specific needs
- Follow Filament's naming conventions for custom components
- Store custom components in app/Filament/Components directory

## Themes & Styling
- Use Tailwind classes for styling
- Store custom theme configuration in dedicated config files
- Use custom panels for different application sections
- Maintain consistent branding across all panels

## Widgets & Dashboard
- Create purpose-specific dashboards for different user roles
- Use widgets for displaying key metrics and data
- Implement caching for performance-intensive widgets

## Best Practices
- Use Filament's notification system for user feedback
- Leverage Filament's built-in impersonation features for admin user support
- Implement proper authorization using Filament's authorization features
- Use Laravel's localization features for multi-language support

## Code Comments Policy

**Rule**: Only add essential comments that provide critical context or explain complex logic. Avoid verbose or obvious comments.

**Examples of Good Comments**:
```php
// Fallback to default language if translation missing
$content = $this->getTranslation('content', $locale) ?? $this->getTranslation('content', config('app.fallback_locale'));

// Complex query optimization for performance
$posts = Post::with(['author', 'categories'])
    ->whereHas('categories', function ($query) use ($categoryIds) {
        // Using whereIn for better performance than multiple OR conditions
        $query->whereIn('id', $categoryIds);
    })
    ->get();
```

**Examples of Unnecessary Comments to Avoid**:
```php
// Bad: Obvious what the code does
$user = new User(); // Create a new user instance
$user->save(); // Save the user to database

// Bad: Verbose explanation of simple logic
if ($status === 'published') { // Check if the status is published
    return true; // Return true if published
}
```

**When to Comment**:
- Complex business logic or algorithms
- Non-obvious performance optimizations
- Workarounds for specific issues
- Integration points with external services
- Schema or data structure decisions

**When NOT to Comment**:
- Self-explanatory code
- Standard Laravel patterns
- Simple variable assignments
- Basic CRUD operations
- Framework conventions

**Additional Guidelines**:
- Add comments only if necessary for understanding
- Prefer self-documenting code over comments
- Use meaningful variable and method names instead of comments when possible