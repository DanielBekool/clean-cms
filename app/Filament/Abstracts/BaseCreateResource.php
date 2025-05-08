<?php

namespace App\Filament\Abstracts;

use Filament\Resources\Pages\CreateRecord;

abstract class BaseCreateResource extends CreateRecord
{
    protected function getHeaderActions(): array
    {
        return [
            $this->getCreateAction(),
        ];
    }
}
