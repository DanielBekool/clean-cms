<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;

class PostResource extends BaseContentResource
{

    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Contents';
    protected static ?int $navigationSort = 20;

    protected static ?string $recordTitleAttribute = 'title';

    protected static function formRelationshipsFields(): array
    {
        return [
            ...static::formTaxonomyRelationshipField('categories'),
            ...static::formTaxonomyRelationshipField('tags'),
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

}
