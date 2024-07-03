<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLeadRequest;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    public function store(StoreLeadRequest $request)
    {
        $data = $request->validated();
        $lead = new Lead();
        $lead->name = $data['name'];
        $lead->lastname = $data['lastname'];
        $lead->phone_number = $data['phone_number'];
        $lead->email = $data['email'];
        $lead->message = $data['message'];
        $lead->save();
        Mail::to('hello@example.com')->send(new NewContact($lead));
        return response()->json([
            'result'=> $lead
        ]);
    }
}
