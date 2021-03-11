<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteName;

class WebNameController extends Controller
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
        //
        return view("webnames.create");
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
            "name.max" => "Name of the website should contain not more than 20 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the website.",
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:20"],
        ], $customMessages);

        //add the website name to database
        $webname = new WebsiteName;
        $webname->name = $request->name;
        $webname->current = "no";
        $webname->save();
        return redirect("/others")->with("success", "New website name successfully added!");               
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //set all current to no
        WebsiteName::where("id", ">", "0")->update(["current" => "no"]);

        //set the specified to yes
        $webname = WebsiteName::find($id);
        $webname->current = "yes";
        if($webname->save()){
            return back()->with("success", "Website name has been set to current");
        }

        return back()->with("error", "Could not set website name as current");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $webname = WebsiteName::find($id);
        if($webname != null){
            return view("webnames.edit")->with("webname", $webname);
        }

        return back()->with("error", "Could not edit website name");
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
            "name.max" => "Name of the website should contain not more than 20 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the website.",
            "current.required" => "Please choose whether or not to set logo as current",
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:20"],
            "current" => ["required"],
        ], $customMessages);

        //update the website name in database
        $webname = WebsiteName::find($id);
        $webname->name = $request->name;
        $webname->current = $request->current;
        $webname->save();
        return redirect("/others")->with("success", "Website name successfully updated!");               
        
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
