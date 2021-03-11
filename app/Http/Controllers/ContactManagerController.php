<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactManager;

class ContactManagerController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("contactmanager.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $customMessages = [
            "address.max" => "Address of contact should contain not more than 255 characters.",
            "address.min" => "Address should not be less than 2 characters.",
            "address.required" => "Please enter an address for the contact.",
            "email.required" => "Please enter an email for the contact.",
            "phone.required" => "Please enter phone number for the contact.",
            "phone.max" => "Phone number of contact should contain not more than 20 characters.",
            "contactable.required" => "Please choose whether or not to set contact as contactable",
        ];

        $validator = $request->validate([
            "address" => ["required", "min:2", "max:255"],
            "email" => ["required", "email", "unique:contact_managers"],
            "phone" => ["required", "max:20"],
        ], $customMessages);

        //store the contact in database
        $contact = new ContactManager;
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->contactable = $request->contactable;
        if($contact->save()){
            return redirect("/others")->with("success", "Contact successfully added!");               
        }

        return back()->with("error", "Could not add contact");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        //set the specified to yes
        $contact = ContactManager::find($id);
        $contact->contactable = "yes";
        if($contact->save()){
            return back()->with("success", "Contact has been set to contactable");
        }

        return back()->with("error", "Could not set contact as contactable");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact = ContactManager::find($id);
        if($contact != null){
            return view("contactmanager.edit")->with("contact", $contact);
        }

        return back()->with("error", "Could not edit contact");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $requestData = $request->all();

        $customMessages = [
            "address.max" => "Address of contact should contain not more than 255 characters.",
            "address.min" => "Address should not be less than 2 characters.",
            "address.required" => "Please enter an address for the contact.",
            "email.required" => "Please enter an email for the contact.",
            "phone.required" => "Please enter phone number for the contact.",
            "phone.max" => "Phone number of contact should contain not more than 20 characters.",
            "contactable.required" => "Please choose whether or not to set contact as contactable",
        ];

        $validator = $request->validate([
            "address" => ["required", "min:2", "max:255"],
            "email" => ["required", "email"],
            "phone" => ["required", "max:20"],
        ], $customMessages);

        //update the contact in database
        $contact = ContactManager::find($id);
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->contactable = $request->contactable;
        if($contact->save()){
            return redirect("/others")->with("success", "Contact successfully updated!");               
        }

        return back()->with("error", "Could not update contact");

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
