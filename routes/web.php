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

        // Static page route
        Route::get('/{content_slug}', [App\Http\Controllers\ContentController::class, 'staticPage'])
            ->where('content_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('static.page');

        // Content single route
        Route::get('/{content_type}/{content_slug}', [App\Http\Controllers\ContentController::class, 'singleContent'])
            ->where('content_type', '[a-zA-Z0-9-]+') // Basic type validation
            ->where('content_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('single.content');

        // Taxonomy archive route
        Route::get('/{taxonomy_slug}', [App\Http\Controllers\ContentController::class, 'taxonomyArchive'])
            ->where('taxonomy_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('taxonomy.archive');

        // Sub-taxonomy archive route
        Route::get('/{taxonomy_parent}/{taxonomy_slug}', [App\Http\Controllers\ContentController::class, 'subTaxonomyArchive'])
            ->where('taxonomy_parent', '[a-zA-Z0-9-]+') // Basic parent validation
            ->where('taxonomy_slug', '[a-zA-Z0-9-]+') // Basic slug validation
            ->name('sub.taxonomy.archive');
    });
