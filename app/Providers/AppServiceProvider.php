<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Migrations\MigrationCreator;
use Illuminate\Filesystem\Filesystem;
use SolutionForest\FilamentTranslateField\Facades\FilamentTranslateField;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;
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
        if (config('cms.multilanguage_enabled') && config('cms.language_available')) {
            $localeKeys = array_keys(config('cms.language_available'));
            FilamentTranslateField::defaultLocales($localeKeys);
            LanguageSwitch::configureUsing(function (LanguageSwitch $switch) use ($localeKeys) {
                $switch
                    ->locales($localeKeys);
            });
        }
    }
}
