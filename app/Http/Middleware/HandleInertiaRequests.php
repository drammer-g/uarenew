<?php

namespace App\Http\Middleware;

use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param \Illuminate\Http\Request $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param \Illuminate\Http\Request $request
     * @return mixed[]
     */
    public function share(Request $request)
    {
        $routes = (new Ziggy)->toArray();

        $locale = Language::getLocale();

        return array_merge(parent::share($request), [
            'locale' => $locale,
            'auth' => [
                'user' => $request->user(),
            ],
            'ziggy' => function () use ($routes, $request) {
                return array_merge($routes, [
                    'location' => $request->url(),
                ]);
            },
            'flash' => [
                'success' => fn() => $request->session()->get('success'),
                'message' => fn() => $request->session()->get('message')
            ],
        ]);
    }
}
