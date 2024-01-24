<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewContact;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $data = $request->all();
       $validator = Validator::make($data, [
           'name' => 'required',
           'email' => 'required|email',
           'address' => 'required',
           'message' => 'required',
       ]);

     if ($validator->fails()) {
         return response()->json([
            'success' => false,
            'errors' => $validator->errors()
         ]);
        }

       $newLead = new Lead();
       $newLead->fill($data);
       $newLead->save();

       Mail::to('hello@example.com')->send(new NewContact($newLead));

       return response()->json([
           'success' => true,
       ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
