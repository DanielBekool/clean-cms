<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Split;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Get;
use Filament\Forms\Set;
use SolutionForest\FilamentTranslateField\Forms\Component\Translate;
use CodeZero\UniqueTranslation\UniqueTranslationRule as UTR;
use Illuminate\Database\Eloquent\Model;
use Awcodes\Curator\Components\Forms\CuratorPicker;

abstract class BaseTaxonomyResource extends BaseResource
{

    protected static function formContentFields(string $locale): array
    {

        return [
            RichEditor::make('content')
                ->nullable(),
        ];
    }

    protected static function formAuthorRelationshipField(): array
    {
        return []; // No author relationship for taxonomy resources
    }

    protected static function formStatusField(): array
    {
        return []; // No status field for taxonomy resources
    }

    protected static function formFeaturedField(): array
    {
        return []; // No featured field for taxonomy resources
    }


    protected static function tableFeaturedColumn(): array
    {
        return []; // No featured column for taxonomy resources
    }
    protected static function tableStatusColumn(): array
    {
        return []; // No status column for taxonomy resources

    }
    protected static function tableAuthorColumn(): array
    {
        return []; // No author column for taxonomy resources

    }
    protected static function tableFilters(): array
    {
        return [];
    }


}
