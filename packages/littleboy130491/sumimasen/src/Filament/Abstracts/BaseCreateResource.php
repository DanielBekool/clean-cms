<?php

namespace App\Filament\Abstracts;

use Filament\Resources\Pages\CreateRecord;
use Filament\Actions\CreateAction;
abstract class BaseCreateResource extends CreateRecord
{
    protected function getHeaderActions(): array
    {
        return [
            $this->getCreateFormAction()
                ->formId('form'),
        ];
    }

}
