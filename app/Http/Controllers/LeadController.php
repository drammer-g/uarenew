<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param LeadRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LeadRequest $request)
    {
        $lead = Lead::create($request->all());
        return back()->with('success', 'Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Lead $lead
     * @return Response
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Lead $lead
     * @return Response
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Lead $lead
     * @return Response
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Lead $lead
     * @return Response
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
