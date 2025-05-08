<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Http\Request;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->route('lang');

        // Validate against supported locales (optional but recommended)
        if (array_key_exists($locale, Config::get('cms.language_available', ['en' => 'English', 'id' => 'Indonesian']))) {
            App::setLocale($locale);
        } else {
            App::setLocale(Config::get('cms.default_language', 'en'));
        }

        return $next($request);
    }
}