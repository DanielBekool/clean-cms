<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentResource\Pages;
use App\Models\Comment;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Enums\CommentStatus;

class CommentResource extends Resource
{
    protected static ?string $model = Comment::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-ellipsis';
    protected static ?int $navigationSort = 40;

    protected static array $commentableResources = [
        \App\Models\Post::class => \App\Filament\Resources\PostResource::class,
        \App\Models\Page::class => \App\Filament\Resources\PageResource::class,
        \App\Models\Product::class => \App\Filament\Resources\ProductResource::class,
    ];

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ...static::formSchema(),
            ])
            ->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ...static::tableColumns(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    ...static::tableEditBulkAction(),
                ]),
            ])
            ->emptyStateHeading('No comments yet')
            ->emptyStateDescription('');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListComments::route('/'),
            'create' => Pages\CreateComment::route('/create'),
            'edit' => Pages\EditComment::route('/{record}/edit'),
        ];
    }

    public static function formSchema(): array
    {
        return [
            Textarea::make('content')
                ->required()
                ->maxLength(255)
                ->columnSpan('full'),
            TextInput::make('name')
                ->required()
                ->maxLength(255),
            TextInput::make('email')
                ->required()
                ->maxLength(255),
            Select::make('status')
                ->enum(CommentStatus::class)
                ->options(CommentStatus::class)
                ->default(CommentStatus::Pending)
                ->required(),
            Select::make('parent_id')
                ->relationship(
                    name: 'parent',
                    titleAttribute: 'id',
                    ignoreRecord: true,
                    modifyQueryUsing: fn(Builder $query) => $query->where('status', CommentStatus::Approved)
                )
                ->label('Reply to'),
        ];
    }

    public static function tableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('id')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('content')
                ->limit(50)
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('name')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('email')
                ->sortable()
                ->searchable(),
            ...static::tableColumnsCommentable(),
            Tables\Columns\SelectColumn::make('status')->options(CommentStatus::class)
                ->sortable(),
            Tables\Columns\TextColumn::make('parent.id')
                ->label('Reply to')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('created_at')->sortable(),
        ];
    }

    public static function tableColumnsCommentable(): array
    {
        return [
            Tables\Columns\TextColumn::make('commentable_type')
                ->label('Type')
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('commentable.id')
                ->sortable()
                ->searchable()
                ->url(fn($record): string =>
                    (static::$commentableResources[$record->commentable_type])::getUrl(
                        'edit',
                        ['record' => $record->commentable]
                    )),
        ];
    }
    public static function tableEditBulkAction(): array
    {
        return [
            Tables\Actions\BulkAction::make('edit')
                ->form([
                    Select::make('status')
                        ->enum(CommentStatus::class)
                        ->options(CommentStatus::class)
                        ->nullable(),
                ])
                ->action(function (\Illuminate\Support\Collection $records, array $data) {
                    $records->each(function (\Illuminate\Database\Eloquent\Model $record) use ($data) {
                        $updateData = [];
                        if (isset($data['status'])) {
                            $updateData['status'] = $data['status'];
                        }
                        $record->update($updateData);
                    });
                })
                ->deselectRecordsAfterCompletion()
                ->icon('heroicon-o-pencil-square')
                ->color('primary')
                ->label('Edit selected'),
        ];
    }
}
