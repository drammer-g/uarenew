<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class HomePageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(string $locale = 'en'): Response
    {
        $text = HomePage::where([
            'locale' => $locale
        ])->first();
        if (is_null($text)) {
            $text = new HomePage;
        }
        return Inertia::render('Home', [
            'text' => $text
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $texts = $request->get('texts');
        foreach ($texts as $key => $value) {
            HomePage::updateOrCreate(
                [
                    'locale' => $value['locale']
                ],
                [
                    'locale' => $value['locale'],
                    'text' => $value['text']
                ]
            );
        }
        return Redirect::route('dashboard')->with('success', 'Home page update');
    }
}
