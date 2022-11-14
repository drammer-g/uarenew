<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LanguageController extends Controller
{
    /**
     * @param string $locale
     * @return RedirectResponse
     */
    public function changeLanguage(string $locale)
    {

        if (!in_array($locale, array_keys(Language::languages()->toArray()))) {
            return redirect(404);
        }

        $referer    = redirect()->back()->getTargetUrl();
        $parse_url  = parse_url($referer, PHP_URL_PATH);
        $segments   = explode('/', $parse_url);

        if (in_array($segments[1], array_keys(Language::languages()->toArray()))) {
            unset($segments[1]);
        }

        array_splice($segments, 1, 0, $locale);
        $url = request()->root().implode("/", $segments);

        if(parse_url($referer, PHP_URL_QUERY)){
            $url = $url.'?'. parse_url($referer, PHP_URL_QUERY);
        }

        App::setLocale($locale);

        return redirect($url);

    }
}
