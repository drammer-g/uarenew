<?php

namespace App\Http\Controllers;

use App\Http\Requests\WebFormRequest;
use App\Models\Language;
use App\Models\Page;
use App\Models\WebForm;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Inertia\Inertia;
use Inertia\Response;

class WebFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return Inertia::render('WebForm/Index', [
            'locales' => Language::languages(),
            'pages' => Page::all(),
            'webforms' => WebForm::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return Inertia::render('WebForm/Create', [
            'locales' => Language::languages(),
            'pages' => Page::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param WebFormRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(WebFormRequest $request)
    {
        $webform = WebForm::create([
            'locale' => $request->get('locale'),
            'content' => json_encode($request->get('content')),
            'crm_source' => $request->get('crm_source'),
            'recaptcha_site_key' => $request->get('recaptcha_site_key'),
        ]);
        return redirect(route('webforms.index'))->with('success', 'WebForm created.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($locale = 'en')
    {
        $webform = WebForm::where('locale', '=', $locale)->first();
        return \response($webform);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return Inertia::render('WebForm/Edit', [
            'locales' => Language::languages(),
            'pages' => Page::all(),
            'webform' => WebForm::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WebFormRequest $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(WebFormRequest $request, WebForm $webform)
    {

        $webform->update([
            'locale' => $request->get('locale'),
            'content' => json_encode($request->get('content')),
            'crm_source' => $request->get('crm_source'),
            'recaptcha_site_key' => $request->get('recaptcha_site_key'),
        ]);
        return redirect(route('webforms.edit', ['webform' => $webform->id]))->with('success', 'WebForm updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
