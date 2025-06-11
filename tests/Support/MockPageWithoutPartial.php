<?php

namespace Tests\Support;

use App\Enums\ContentStatus;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

/**
 * A mock model for testing that uses basic Spatie translations
 * but does NOT use any of the custom fallback traits.
 */
class MockPageWithoutPartial extends Model
{
    use HasTranslations;

    protected $table = 'pages';
    protected $guarded = [];
    public $translatable = ['title', 'slug', 'content'];
    protected $casts = [
        'status' => ContentStatus::class,
    ];
}