<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Split;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Forms\Set;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;
use CodeZero\UniqueTranslation\UniqueTranslationRule as UTR;
use Awcodes\Curator\Components\Forms\CuratorPicker;

abstract class BaseResource extends Resource
{

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Form $form): Form
    {

        return $form
            ->schema([
                ...static::formSchema(),
            ])
            ->columns(1); // Main form now has 1 column as Translate takes full width
    }

    protected static function formSchema(): array
    {

        return [
            Split::make([
                Translate::make()
                    ->columnSpanFull()
                    ->schema(function (string $locale): array {
                        return [
                            ...static::formTitleSlugFields($locale), // Common title/slug fields
                            ...static::formContentFields($locale), // Specific content fields
                        ];
                    }),
                // Section for non-translatable fields and relationships
                Section::make()
                    ->schema([
                        ...static::formFeaturedImageField(),
                        ...static::formRelationshipsFields(), // taxonomy and parent relationships
                        ...static::formAuthorRelationshipField(),
                        ...static::formStatusField(),
                        ...static::formTemplateField(),
                        ...static::formFeaturedField(),
                        ...static::formPublishedDateField(),
                        ...static::formMenuOrderField(),

                    ])
                    ->grow(false),
            ])
                ->from('md')
                ->columnSpanFull(),
        ];
    }

    protected static function modelStatusOptions(): array
    {
        $statusOptions = [];

        if (defined(static::$model . '::STATUS_OPTIONS')) {
            $statusOptions = constant(static::$model . '::STATUS_OPTIONS');
        } else {
            $statusOptions = ['draft' => 'Draft', 'published' => 'Published'];
        }

        return $statusOptions;
    }

    protected static function formTitleSlugFields(string $locale): array
    {
        $defaultLocale = config('app.default_language', 'en'); // Default fallback

        return [
            TextInput::make('title')
                ->live(onBlur: true)
                ->afterStateUpdated(function (Set $set, Get $get, ?string $state, string $operation) use ($locale) {

                    if ($operation === 'edit' && !empty($get('slug.' . $locale))) {
                        return;
                    }

                    $set('slug.' . $locale, $state ? Str::slug($state) : null);
                })
                ->required($locale === $defaultLocale),
            TextInput::make('slug')
                ->maxLength(255)
                ->rules(function (Get $get): array {
                    // Determine the table name dynamically
                    $table = app(static::$model)->getTable();

                    return [
                        UTR::for($table, 'slug')
                            ->ignore($get('id')),
                        'alpha_dash',
                    ];
                })
                ->required($locale === $defaultLocale),
        ];
    }

    protected static function formContentFields(string $locale): array
    {

        return [];
    }

    protected static function formFeaturedImageField(): array
    {
        return [
            CuratorPicker::make('featured_image')
                ->relationship('featuredImage', 'id'),
        ];
    }

    protected static function formRelationshipsFields(): array
    {
        return [];
    }

    protected static function formTaxonomyRelationshipField(string $taxonomy): array
    {
        return [
            Select::make($taxonomy)
                ->relationship($taxonomy, 'title')
                ->multiple()
                ->searchable()
                ->preload()
                ->createOptionForm([
                    TextInput::make('title')->required(),
                ]),
        ];
    }

    protected static function formParentRelationshipField(): array
    {
        return [
            Select::make('parent_id')
                ->relationship('parent', 'title'),
        ];
    }

    protected static function formAuthorRelationshipField(): array
    {
        return [
            Select::make('author_id')
                ->relationship('author', 'name')
                ->required()
                ->searchable()
                ->preload()
                ->default(fn() => auth()->id()),
        ];
    }

    protected static function formStatusField(): array
    {
        return [
            Select::make('status')
                ->options(static::modelStatusOptions())
                ->default('draft')
                ->required(),
        ];
    }

    protected static function formTemplateField(): array
    {
        return [
            TextInput::make('template')
                ->nullable(),
        ];
    }

    protected static function formFeaturedField(): array
    {

        return [
            Toggle::make('featured')
                ->default(false),
        ];
    }

    protected static function formPublishedDateField(): array
    {

        return [
            TextInput::make('menu_order') // Common menu order field
                ->numeric()
                ->default(0),
        ];
    }

    protected static function formMenuOrderField(): array
    {

        return [];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ...static::tableColumns(),
            ])
            ->filters([
                ...static::tableFilters(),
            ])
            ->actions([
                ...static::tableActions(),
            ])
            ->bulkActions([
                ...static::tableBulkActions(),
            ])
            ->reorderable('menu_order')
            ->defaultSort('created_at', 'desc');
        ;
    }

    protected static function tableColumns(): array
    {

        return [
            TextColumn::make('title')
                ->searchable(['title', 'content'])
                ->sortable()
                ->limit(50),
            TextColumn::make('slug')
                ->limit(50),
            ...static::tableFeaturedColumn(),
            ...static::tableStatusColumn(),
            ...static::tableAuthorColumn(),
            ...static::tableDateColumns(),
            TextColumn::make('menu_order')
                ->label('Order')
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    protected static function tableFeaturedColumn(): array
    {
        return [
            ToggleColumn::make('featured'),
        ];
    }
    protected static function tableStatusColumn(): array
    {
        return [
            TextColumn::make('status')
                ->formatStateUsing(fn(string $state): string => static::modelStatusOptions()[$state] ?? $state)
                ->badge()
                ->sortable(),
        ];
    }
    protected static function tableAuthorColumn(): array
    {
        return [
            TextColumn::make('author.name')
                ->sortable()
                ->searchable(),
        ];
    }
    protected static function tableDateColumns(): array
    {
        return [
            ...static::tablePublishedAtColumn(),
            TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('deleted_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
        ];
    }

    protected static function tablePublishedAtColumn(): array
    {
        return [
            TextColumn::make('published_at')
                ->dateTime()
                ->sortable(),
        ];
    }


    protected static function tableFilters(): array
    {

        return [
            Tables\Filters\TrashedFilter::make(),
        ];
    }

    protected static function tableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),
            Tables\Actions\EditAction::make(),
            Tables\Actions\Action::make('replicate')
                ->icon('heroicon-o-document-duplicate')
                ->action(function (\Filament\Tables\Actions\Action $action, \Illuminate\Database\Eloquent\Model $record, \Livewire\Component $livewire) {
                    $newRecord = $record->replicate();

                    // Handle multilingual slug uniqueness
                    $originalSlugs = $newRecord->getTranslations('slug');
                    $newSlugs = [];
                    $locales = array_keys(config('app.language_available')); // Get locales from app config
        
                    foreach ($locales as $locale) {
                        $originalSlug = $originalSlugs[$locale] ?? null;
                        if ($originalSlug) {
                            $count = 1;
                            $newSlug = $originalSlug;
                            // Check for uniqueness across all translations of the slug field
                            while (static::getModel()::whereJsonContains('slug->' . $locale, $newSlug)->exists()) {
                                $newSlug = $originalSlug . '-' . $count++;
                            }
                            $newSlugs[$locale] = $newSlug;
                        } else {
                            $newSlugs[$locale] = null; // Or handle as needed for missing translations
                        }
                    }
                    $newRecord->setTranslations('slug', $newSlugs);


                    $newRecord->save();

                    $livewire->redirect(static::getUrl('index', ['record' => $newRecord]));
                }),
            Tables\Actions\DeleteAction::make(),
            Tables\Actions\ForceDeleteAction::make(),
            Tables\Actions\RestoreAction::make(),
        ];
    }

    protected static function tableBulkActions(): array
    {
        return
            [
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ];

    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
