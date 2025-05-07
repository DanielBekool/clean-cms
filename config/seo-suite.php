<?php

return [
    /**
     * Override the SEO Model to perform custom actions.
     */
    'model' => \Afatmustafa\SeoSuite\Models\SeoSuite::class,
    'table_name' => 'seo_suite',

    /*
    |--------------------------------------------------------------------------
    | Enabled features.
    | If you want to disable a feature, set it to false.
    |--------------------------------------------------------------------------
    */
    'features' => [
        'general' => [
            'enabled' => true,
            'fields' => [
                'title' => true,
                'description' => true,
            ],
        ],
        'advanced' => [
            'enabled' => true,
            'fields' => [
                'canonical' => true,
                'noindex' => true,
                'nofollow' => true,
                'metas' => true,
            ],
        ],
        'opengraph' => [
            'enabled' => true,
            'fields' => [
                'og_title' => true,
                'og_description' => true,
                'og_type' => true,
                'og_properties' => true,
            ],
        ],
        'x' => [
            'enabled' => false,
            'fields' => [
                'x_card_type' => true,
                'x_title' => true,
                'x_site' => true,
            ],
        ],
    ],
    // SEO fallbacks
    'fallbacks' => [
        'title' => 'title',
        'description' => 'content',
        'og_type' => 'article',
    ],
];
