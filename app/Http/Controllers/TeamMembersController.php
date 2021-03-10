<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMembersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teammembers = TeamMember::all();
        return view('team_members.index')->with("teammembers", $teammembers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('team_members.create');
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
            "name.max" => "Name of the service should contain not more than 255 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the service.",
            "name.required" => "Please enter a name for the service.",
            "gender.required" => "Please select a gender",
            "role.required" => "Please enter a role",
            "image.required" => "Please select an image for the service.",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:255"],
            "gender" => ["required"],
            "role" => ["required"],
            "image" => ["required", "image", "mimes:jpg,jpeg,png", "max:2048"],
        ], $customMessages);

        //add the team member to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $teammember = new TeamMember;
                $teammember->name = $request->name;
                $teammember->gender = $request->gender;
                $teammember->role = $request->role;
                $teammember->image_path = $image_name;
                $teammember->save();
                return redirect("/team-members")->with("success", "New member successfully added!");               
            }
        }

        return back();

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
        $teammember = TeamMember::find($id);
        if($teammember != null){
            return view('team_members.show')->with("teammember", $teammember);
        }

        return back();

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
        $teammember = TeamMember::find($id);
        if($teammember != null){
            return view('team_members.edit')->with("teammember", $teammember);
        }

        return back();
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
            "name.max" => "Name of the service should contain not more than 255 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the service.",
            "name.required" => "Please enter a name for the service.",
            "gender.required" => "Please select a gender",
            "role.required" => "Please enter a role",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:255"],
            "gender" => ["required"],
            "role" => ["required"],
            "image" => ["nullable", "image", "mimes:jpg,jpeg,png", "max:2048"],
        ], $customMessages);

        $teammember = TeamMember::find($id);

        //add the team member to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $teammember->name = $request->name;
                $teammember->gender = $request->gender;
                $teammember->role = $request->role;
                $teammember->image_path = $image_name;
                $teammember->save();
                return redirect("/team-members")->with("success", "New member successfully added!");               
            }
        }
        else{
                $teammember->name = $request->name;
                $teammember->gender = $request->gender;
                $teammember->role = $request->role;
                $teammember->save();
        }

        return back();

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
