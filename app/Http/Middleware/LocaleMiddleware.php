<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    public static function getLocale()
    {
        return Language::getLocale();
    }

    public function handle($request, Closure $next)
    {
        $locale = Language::getLocale();

        $locale ? app()->setLocale($locale) : app()->setLocale(Language::MAIN_LANGUAGE);

        return $next($request);
    }
}
