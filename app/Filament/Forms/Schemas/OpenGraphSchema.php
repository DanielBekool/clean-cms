<?php

namespace App\Filament\Forms\Schemas;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Afatmustafa\SeoSuite\Schemas\OpenGraphSchema as BaseOpenGraphSchema;
use Afatmustafa\SeoSuite\Enums\OpenGraphTypes;
class OpenGraphSchema extends BaseOpenGraphSchema
{

    public static function make(): array
    {
        return [
            TextInput::make('og_title')
                ->translateLabel()
                ->label('seo-suite::seo-suite.opengraph.og_title_label')
                ->hint(__('seo-suite::seo-suite.opengraph.og_title_hint'))
                ->helperText(__('seo-suite::seo-suite.opengraph.og_title_helper'))
                ->visible(fn(): bool => config('seo-suite.features.opengraph.fields.og_title')),
            Textarea::make('og_description')
                ->translateLabel()
                ->label('seo-suite::seo-suite.opengraph.og_description_label')
                ->hint(__('seo-suite::seo-suite.opengraph.og_description_hint'))
                ->helperText(__('seo-suite::seo-suite.opengraph.og_description_helper'))
                ->visible(fn(): bool => config('seo-suite.features.opengraph.fields.og_description')),
            Grid::make(1)
                ->schema(self::openGraphTypes())
                ->visible(fn(): bool => config('seo-suite.features.opengraph.fields.og_type')),
        ];
    }

    public static function openGraphTypes(): array
    {
        return [
            Select::make('og_type')
                ->translateLabel()
                ->label('seo-suite::seo-suite.opengraph.og_type_label')
                ->hint(__('seo-suite::seo-suite.opengraph.og_type_hint'))
                ->default(OpenGraphTypes::ARTICLE)
                ->options(OpenGraphTypes::class)
                ->live(onBlur: true)
                ->native(false)
                ->searchable(),
            self::ogTypeFields(),
            Repeater::make('og_properties')
                ->translateLabel()
                ->label('seo-suite::seo-suite.opengraph.og_properties.og_properties_label')
                ->addActionLabel(__('seo-suite::seo-suite.opengraph.og_properties.add_og_property_label'))
                ->collapsed()
                ->cloneable()
                ->schema([
                    TextInput::make('key')
                        ->translateLabel()
                        ->label('seo-suite::seo-suite.opengraph.og_properties.key_label')
                        ->hint(__('seo-suite::seo-suite.opengraph.og_properties.key_hint')),
                    TextInput::make('value')
                        ->translateLabel()
                        ->label('seo-suite::seo-suite.opengraph.og_properties.value_label')
                        ->hint(__('seo-suite::seo-suite.opengraph.og_properties.value_hint')),
                ])
                ->itemLabel(fn(array $state) => $state['key'] . ' - ' . $state['value'])
                ->columns(2)
                ->visible(fn(): bool => config('seo-suite.features.opengraph.fields.og_properties')),
        ];
    }

    public static function ogTypeFields(): Grid
    {
        return Grid::make()
            ->schema([

            ]);
    }

}
