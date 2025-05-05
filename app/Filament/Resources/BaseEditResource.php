<?php

namespace App\Filament\Resources;

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
            // Actions\Action::make('create_new')
            //     ->url(static::$resource::getUrl('create'))
            //     ->color('success'),
        ];
    }
}
