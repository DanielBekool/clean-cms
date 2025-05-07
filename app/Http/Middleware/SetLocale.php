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
        if (in_array($locale, Config::get('app.language_available', ['en', 'id']))) {
            App::setLocale($locale);
        } else {
            App::setLocale(Config::get('app.default_language', 'en'));
        }

        return $next($request);
    }
}