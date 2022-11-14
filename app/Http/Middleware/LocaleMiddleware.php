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

        $segmentsURI = request()->segment(1);

        $locale = !empty($segmentsURI) && in_array($segmentsURI, array_keys(Language::languages()->toArray()))
            ? $segmentsURI
            : Language::MAIN_LANGUAGE;
        App::setLocale($locale);
        return $locale;
    }

    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();

        $locale ? app()->setLocale($locale) : app()->setLocale(Language::MAIN_LANGUAGE);

        return $next($request);
    }
}
