<?php

namespace App\Filament\Resources\PageResource\Pages;

use App\Filament\Exports\PageExporter;
use App\Filament\Imports\PageImporter;
use App\Filament\Resources\PageResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPages extends ListRecords
{
    protected static string $resource = PageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(PageImporter::class),
            Actions\ExportAction::make()
                ->exporter(PageExporter::class),
            Actions\CreateAction::make(),
        ];
    }
}
