<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;


abstract class BaseContentResource extends BaseResource
{


    protected static function formContentFields(string $locale): array
    {

        return [
            RichEditor::make('content')
                ->nullable(),
            Textarea::make('excerpt')
                ->nullable(),
            KeyValue::make('custom_fields')
                ->nullable(),
        ];
    }

    protected static function formTemplateField(): array
    {
        $subPath = 'singles';

        return static::getTemplateOptions($subPath);
    }

    protected static function formRelationshipsFields(): array
    {
        return []; // relationships are handled in the child class
    }

}
