<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $leads = Lead::orderByDesc('created_at')->paginate(10);
        return view('admin.leads.index', compact('leads'));
    }


    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        return view('admin.leads.show', compact('lead'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        $lead->status = $request->status;
        $lead->save();
        return redirect()->route('admin.leads.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
