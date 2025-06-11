<?php

namespace Tests\Support;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use App\Traits\HandlesPartialTranslation;
use App\Enums\ContentStatus;

class TestPage extends Model
{
    use HandlesPartialTranslation, HasTranslations;

    protected $table = 'pages'; // Use the existing pages table

    protected $fillable = [
        'title',
        'slug',
        'content',
        'section',
        'excerpt',
        'custom_fields',
        'featured_image',
        'template',
        'menu_order',
        'parent_id',
        'status',
        'published_at',
        'author_id',
    ];

    protected $casts = [
        'title' => 'array',
        'slug' => 'array',
        'content' => 'array',
        'section' => 'array',
        'excerpt' => 'array',
        'custom_fields' => 'array',
        'published_at' => 'datetime',
        'status' => ContentStatus::class,
    ];

    public $translatable = ['title', 'slug', 'content', 'section', 'excerpt', 'custom_fields'];

    // Define a published scope for consistency with ContentController
    public function scopePublished($query)
    {
        return $query->where('status', ContentStatus::Published);
    }
}