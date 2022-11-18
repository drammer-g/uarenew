<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageForm;
use App\Models\Language;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('Create', [
            'locales' => Language::languages(),
            'pages' => Page::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PageForm $request
     * @return RedirectResponse
     */
    public function store(PageForm $request): RedirectResponse
    {
        $page = Page::create($request->all());
        return Redirect::route('pages.edit', [
            'page' => $page->id
        ])->with('success', 'Page created');
    }

    /**
     * Display the specified resource.
     *
     * @param string $slug
     * @return Response
     */
    public function show(string $lang, string $slug)
    {
        $page = Page::where([
            'slug' => $slug,
            'locale' => app()->getLocale()
        ])->orderBy('created_at', 'desc')->firstOrFail();
        return Inertia::render('Show', [
            'page' => $page
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Page $page
     * @return Response
     */
    public function edit(Page $page): Response
    {
        return Inertia::render('Edit', [
            'page' => $page,
            'locales' => Language::languages(),
            'pages' => Page::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PageForm $request
     * @param Page $page
     * @return RedirectResponse
     */
    public function update(PageForm $request, Page $page)
    {

        $page->update($request->all());
        return Redirect::route('dashboard', [
            'page' => $page,
            'locales' => Language::languages(),
            'pages' => Page::all()
        ])->with('success', 'Page updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Page $page
     * @return RedirectResponse
     */
    public function destroy(Page $page): RedirectResponse
    {
        $page->delete();
        return Redirect::route('dashboard', [
            'page' => $page,
            'locales' => Language::languages(),
            'pages' => Page::all()
        ])->with('success', 'Page delete.');
    }
}
