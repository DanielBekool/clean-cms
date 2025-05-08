<?php

namespace App\Filament\Abstracts;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

abstract class BaseEditResource extends EditRecord
{
    protected function getHeaderActions(): array
    {
        return [
            $this->getSaveFormAction()
                ->formId('form'),
            Actions\DeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
