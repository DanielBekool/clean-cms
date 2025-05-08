<?php

return [

    'multilanguage_enabled' => env('MULTILANGUAGE_ENABLED', true),

    'language_available' => [
        'en' => 'English',
        'id' => 'Indonesian',
        'zh-CN' => 'Chinese',
    ],

    'default_language' => env('DEFAULT_LANGUAGE', 'en'),

    'content_types' => [
        'slug' => 'posts',
        'model' => App\Models\Post::class,
    ],
    'taxonomy_types' => [
        'slug' => 'categories',
        'model' => App\Models\Category::class,
    ],
];