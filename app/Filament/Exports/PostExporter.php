<?php

namespace App\Filament\Exports;

use App\Models\Post;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class PostExporter extends Exporter
{
    protected static ?string $model = App\Models\Post::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id'),
            ExportColumn::make('title'),
            ExportColumn::make('slug'),
            ExportColumn::make('content'),
            ExportColumn::make('excerpt'),
            ExportColumn::make('custom_fields'),
            ExportColumn::make('featured_image'),
            ExportColumn::make('template'),
            ExportColumn::make('menu_order'),
            ExportColumn::make('featured'),
            ExportColumn::make('status'),
            ExportColumn::make('published_at'),
            ExportColumn::make('author.id'), // Related User ID
            ExportColumn::make('categories')->formatStateUsing(fn ($state) => $state->pluck('id')->join(', ')), // Related Category IDs
            ExportColumn::make('tags')->formatStateUsing(fn ($state) => $state->pluck('id')->join(', ')), // Related Tag IDs
            ExportColumn::make('created_at'),
            ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your Post export has completed and ' . number_format($export->successful_rows) . ' ' . Str::plural('row', $export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . Str::plural('row', $failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}