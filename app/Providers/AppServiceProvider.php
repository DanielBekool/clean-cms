<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Filesystem\Filesystem;
use SolutionForest\FilamentTranslateField\Facades\FilamentTranslateField;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Add this binding for MigrationCreator
        $this->app->singleton(MigrationCreator::class, function ($app) {
            // Manually resolve the Filesystem dependency and pass null for the custom stub path
            return new MigrationCreator($app['files'], null);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {   
        if (config('app.multilanguage_enabled') && config('app.language_available')) {
            $localeKeys = array_keys(config('app.language_available'));
            FilamentTranslateField::defaultLocales($localeKeys);
        }
    }
}
