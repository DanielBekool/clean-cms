<?php

namespace App\Filament\Imports;

use App\Enums\ContentStatus;
use App\Models\Page;
use App\Models\User;
use Awcodes\Curator\Models\Media;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PageImporter extends Importer
{
    protected static ?string $model = Page::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('title')
                ->requiredMapping()
                ->rules(['required'])
                ->castStateUsing(function (string $state): array {
                    // Handle JSON or simple string for translatable field
                    if (str_starts_with($state, '{') && str_ends_with($state, '}')) {
                        return json_decode($state, true) ?? [$state];
                    }
                    
                    // Default to app locale if simple string
                    return [config('app.locale') => $state];
                }),

            ImportColumn::make('slug')
                ->requiredMapping()
                ->rules(['required'])
                ->castStateUsing(function (string $state): array {
                    // Handle JSON or simple string for translatable field
                    if (str_starts_with($state, '{') && str_ends_with($state, '}')) {
                        return json_decode($state, true) ?? [$state];
                    }
                    
                    // Generate slug if simple string
                    $slug = Str::slug($state);
                    return [config('app.locale') => $slug];
                }),

            ImportColumn::make('content')
                ->castStateUsing(function (?string $state): ?array {
                    if (empty($state)) {
                        return null;
                    }
                    
                    // Handle JSON or simple string for translatable field
                    if (str_starts_with($state, '{') && str_ends_with($state, '}')) {
                        return json_decode($state, true);
                    }
                    
                    return [config('app.locale') => $state];
                }),

            ImportColumn::make('excerpt')
                ->castStateUsing(function (?string $state): ?array {
                    if (empty($state)) {
                        return null;
                    }
                    
                    // Handle JSON or simple string for translatable field
                    if (str_starts_with($state, '{') && str_ends_with($state, '}')) {
                        return json_decode($state, true);
                    }
                    
                    return [config('app.locale') => $state];
                }),

            ImportColumn::make('status')
                ->castStateUsing(function (?string $state): ?ContentStatus {
                    if (empty($state)) {
                        return ContentStatus::Draft;
                    }
                    
                    return match (strtolower($state)) {
                        'published' => ContentStatus::Published,
                        'scheduled' => ContentStatus::Scheduled,
                        'draft' => ContentStatus::Draft,
                        default => ContentStatus::Draft,
                    };
                }),

            ImportColumn::make('author_email')
                ->label('Author Email')
                ->castStateUsing(function (?string $state): ?int {
                    if (empty($state)) {
                        return auth()->id(); // Default to current user
                    }
                    
                    $user = User::where('email', $state)->first();
                    return $user?->id ?? auth()->id();
                })
                ->fillRecordUsing(function (Page $record, $state): void {
                    $record->author_id = $state;
                }),

            ImportColumn::make('parent_slug')
                ->label('Parent Page Slug')
                ->castStateUsing(function (?string $state): ?int {
                    if (empty($state)) {
                        return null;
                    }
                    
                    // Find parent page by slug in any language
                    $parentPage = Page::whereJsonContains('slug', $state)->first();
                    return $parentPage?->id;
                })
                ->fillRecordUsing(function (Page $record, $state): void {
                    $record->parent_id = $state;
                }),

            ImportColumn::make('template'),

            ImportColumn::make('menu_order')
                ->numeric()
                ->castStateUsing(fn (?string $state): int => (int) ($state ?? 0)),

            ImportColumn::make('featured_image_url')
                ->label('Featured Image URL')
                ->castStateUsing(function (?string $state): ?string {
                    if (empty($state)) {
                        return null;
                    }
                    
                    // Try to find existing media by URL or filename
                    $filename = basename($state);
                    $media = Media::where('filename', $filename)
                        ->orWhere('path', 'like', "%{$filename}")
                        ->first();
                    
                    return $media?->id;
                })
                ->fillRecordUsing(function (Page $record, $state): void {
                    $record->featured_image = $state;
                }),

            ImportColumn::make('custom_fields')
                ->castStateUsing(function (?string $state): ?array {
                    if (empty($state)) {
                        return null;
                    }
                    
                    // Parse JSON string
                    return json_decode($state, true);
                }),

            ImportColumn::make('section')
                ->castStateUsing(function (?string $state): ?array {
                    if (empty($state)) {
                        return null;
                    }
                    
                    // Handle JSON or simple string for translatable field
                    if (str_starts_with($state, '{') && str_ends_with($state, '}')) {
                        $decoded = json_decode($state, true);
                        // If it's translatable content, return as is
                        if (is_array($decoded)) {
                            return $decoded;
                        }
                    }
                    
                    return null;
                }),

            ImportColumn::make('published_at')
                ->castStateUsing(function (?string $state): ?Carbon {
                    if (empty($state)) {
                        return null;
                    }
                    
                    try {
                        return Carbon::parse($state);
                    } catch (\Exception $e) {
                        return null;
                    }
                }),
        ];
    }

    public function resolveRecord(): ?Page
    {
        // Check for existing page by slug (in any language)
        $slug = $this->data['slug'] ?? null;
        
        if ($slug && is_array($slug)) {
            foreach ($slug as $locale => $slugValue) {
                $existingPage = Page::whereJsonContains('slug->' . $locale, $slugValue)->first();
                if ($existingPage) {
                    return $existingPage;
                }
            }
        }
        
        // Create new page if not found
        return new Page();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your Page import has completed and ' . number_format($import->successful_rows) . ' ' . Str::plural('row', $import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . Str::plural('row', $failedRowsCount) . ' failed to import.';
        }

        return $body;
    }

    public static function getOptionsFormComponents(): array
    {
        return [
            \Filament\Forms\Components\Checkbox::make('update_existing')
                ->label('Update existing pages')
                ->helperText('If checked, existing pages with matching slugs will be updated instead of skipped.')
                ->default(false),
        ];
    }
}