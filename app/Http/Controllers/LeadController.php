<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Mail\LeadMail;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        try {
            $lead = Lead::create($request->all());
            Mail::to(env('MAIL_WEBFORM', 'office@uarenew.com'))->send(new LeadMail($lead));
            return back()->with('success', 'Success!');
        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }
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
