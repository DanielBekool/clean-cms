<?php

return [

    'multilanguage_enabled' => env('MULTILANGUAGE_ENABLED', true),

    'default_language' => env('DEFAULT_LANGUAGE', 'en'),

    'language_available' => [
        'en' => 'English',
        'id' => 'Indonesian',
        'zh-CN' => 'Chinese',
    ],

    'content_types' => [
        // 'pages' => App\Models\Page::class,
        'posts' => App\Models\Post::class,
        'categories' => App\Models\Category::class,
        'tags' => App\Models\Tag::class,
    ],
];