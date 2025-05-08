<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('{lang}')
    ->middleware(['setLocale'])
    ->group(function () {
        // Home route
        Route::get('/', [App\Http\Controllers\ContentController::class, 'home'])->name('home');

        // Custom post type archive route (e.g., /posts, /products)
        Route::get('/archive/{post_type}', [App\Http\Controllers\ContentController::class, 'archiveContent'])
            ->where('post_type', '[a-zA-Z0-9-]+') // Basic type validation
            ->name('archive.content');

        // Taxonomy archive route (e.g., /category/news, /tag/featured)
        Route::get('/{taxonomy}/{taxonomy_slug}', [App\Http\Controllers\ContentController::class, 'taxonomyArchive'])
            ->where('taxonomy', '[a-zA-Z0-9-]+') // Basic taxonomy validation
            ->where('taxonomy_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('taxonomy.archive');

        // Sub-taxonomy archive route (e.g., /category/news/featured)
        Route::get('/{taxonomy}/{taxonomy_parent}/{taxonomy_slug}', [App\Http\Controllers\ContentController::class, 'subTaxonomyArchive'])
            ->where('taxonomy', '[a-zA-Z0-9-]+') // Basic taxonomy validation
            ->where('taxonomy_parent', '[a-zA-Z0-9-]+') // Basic parent validation
            ->where('taxonomy_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('sub.taxonomy.archive');

        // Content single route (e.g., /post/hello-world)
        Route::get('/{content_type}/{content_slug}', [App\Http\Controllers\ContentController::class, 'singleContent'])
            ->where('content_type', '[a-zA-Z0-9-]+') // Basic type validation
            ->where('content_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('single.content');

        // Static page route (must be last to avoid conflicts)
        Route::get('/{content_slug}', [App\Http\Controllers\ContentController::class, 'staticPage'])
            ->where('content_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('static.page');
    });
