<?php

return [

    'multilanguage_enabled' => env('MULTILANGUAGE_ENABLED', true),

    'default_language' => env('DEFAULT_LANGUAGE', 'en'),

    'language_available' => [
        'en' => 'English',
        'id' => 'Indonesian',
        'zh-cn' => 'Chinese',
    ],

    'content_models' => [
        'pages' => [
            'model' => App\Models\Page::class,
            'type' => 'content',
            'has_archive' => false,
            'has_single' => true,
            'single_view' => 'templates.singles.page',
        ],
        'posts' => [
            'model' => App\Models\Post::class,
            'type' => 'content',
            'has_archive' => true,
            'has_single' => true,
            'archive_view' => 'templates.archives.post',
            'single_view' => 'templates.singles.post',

        ],
        'categories' => [
            'model' => App\Models\Category::class,
            'type' => 'taxonomy',
            'has_archive' => true,
            'has_single' => false,
            'archive_view' => 'templates.archives.category',
            'display_content_from' => 'posts', // the relationship name in the model

        ],
        'tags' => [
            'model' => App\Models\Tag::class,
            'type' => 'taxonomy',
            'has_archive' => true,
            'has_single' => false,
            'archive_view' => 'templates.archives.tag',
            'display_content_from' => 'posts', // the relationship name in the model

        ],
    ],

    'static_page_model' => App\Models\Page::class,
    'static_page_slug' => 'pages',

    'pagination_limit' => env('CMS_PAGINATION_LIMIT', 12),
];