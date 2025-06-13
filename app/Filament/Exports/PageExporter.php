<?php
namespace App\Filament\Exports;

use App\Models\Page;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PageExporter extends Exporter
{
    protected static ?string $model = Page::class;

    public static function modifyQuery(Builder $query): Builder
    {
        return $query->with(['featuredImage', 'author', 'parent']);
    }

    /**
     * Get translatable attributes from the model
     */
    protected static function getTranslatableAttributes(): array
    {
        $model = new (static::$model);
        return $model->getTranslatableAttributes();
    }

    /**
     * Override resolveRecord to add virtual attributes for translations
     */
    public static function resolveRecord(Model $baseRecord): array
    {
        /** @var Page $record */
        $record = $baseRecord;

        // Start with the base array
        $data = $record->toArray();

        // Get translatable attributes from the model
        $translatableAttributes = static::getTranslatableAttributes();
        $availableLocales = array_keys(config('cms.language_available', ['en' => 'English']));

        // Add translation data as separate keys
        foreach ($translatableAttributes as $attribute) {
            $translations = $record->getTranslations($attribute);
            foreach ($availableLocales as $locale) {
                $key = "{$attribute}_{$locale}";
                $value = $translations[$locale] ?? '';

                // Handle arrays (like section data)
                if (is_array($value)) {
                    $value = json_encode($value);
                }

                $data[$key] = $value;
            }
        }

        // Add related data
        $data['author_name'] = $record->author?->name ?? '';
        $data['parent_title'] = $record->parent?->title ?? '';

        return $data;
    }

    public static function getColumns(): array
    {
        $columns = [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('status')
                ->label('Status')
                ->formatStateUsing(fn($state) => $state instanceof \UnitEnum ? $state->value : $state),
            ExportColumn::make('template')->label('Template'),
            ExportColumn::make('menu_order')->label('Menu Order'),
            ExportColumn::make('author_name')->label('Author'),
            ExportColumn::make('parent_title')->label('Parent Page'),
            ExportColumn::make('featured_image')->label('Featured Image ID'),
            ExportColumn::make('published_at')->label('Published At'),
            ExportColumn::make('created_at')->label('Created At'),
            ExportColumn::make('updated_at')->label('Updated At'),
            ExportColumn::make('custom_fields')
                ->label('Custom Fields (JSON)')
                ->formatStateUsing(fn($state) => is_array($state) ? json_encode($state) : $state),
        ];

        // Get translatable attributes from the model
        $translatableAttributes = static::getTranslatableAttributes();
        $availableLocales = array_keys(config('cms.language_available', ['en' => 'English']));

        // Now we can safely add columns for each translation
        foreach ($translatableAttributes as $attribute) {
            foreach ($availableLocales as $locale) {
                $columns[] = ExportColumn::make("{$attribute}_{$locale}")
                    ->label(ucfirst($attribute) . ' (' . strtoupper($locale) . ')');
            }
        }

        return $columns;
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your Page export has completed and ' . number_format($export->successful_rows) . ' ' . Str::plural('row', $export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . Str::plural('row', $failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}