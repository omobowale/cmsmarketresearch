<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller
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
        return view("logos.create");
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
            "name.max" => "Name of the logo should contain not more than 20 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the logo.",
            "image.required" => "Please select an image for the logo.",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:20"],
            "image" => ["required", "image", "mimes:jpg,jpeg,png", "max:2048"],
        ], $customMessages);

        //add the logo to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $logo = new Logo;
                $logo->name = $request->name;
                $logo->current = "no";
                $logo->image_path = $image_name;
                $logo->save();
                return redirect("/others")->with("success", "New logo successfully added!");               
            }
            else {
                return back()->with("error", "Could not add logo");
            }
        }

        return back();

    }

    /**
     * Set the specified resource as current.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //set all current to no
        Logo::where("id", ">", "0")->update(["current" => "no"]);

        //set the specified to yes
        $logo = Logo::find($id);
        $logo->current = "yes";
        if($logo->save()){
            return back()->with("success", "Logo has been set to current");
        }

        return back()->with("error", "Could not set logo as current");
        
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
        $logo = Logo::find($id);
        if($logo != null){
            return view("logos.edit")->with("logo", $logo);
        }

        return back()->with("error", "Could not edit logo");
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
        //
        $requestData = $request->all();

        $customMessages = [
            "name.max" => "Name of the logo should contain not more than 20 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the logo.",
            "current.required" => "Please choose whether or not to set logo as current",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:20"],
            "current" => ["required"],
            "image" => ["nullable", "image", "mimes:jpg,jpeg,png", "max:2048"],
        ], $customMessages);

        //add the logo to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $logo = Logo::find($id);
                $logo->name = $request->name;
                $logo->current = $request->current;
                $logo->image_path = $image_name;
                $logo->save();
                return redirect("/others")->with("success", "Logo successfully updated!");               
            }
        }

        else {
            $logo = Logo::find($id);
            $logo->name = $request->name;
            $logo->current = $request->current;
            $logo->save();
            return redirect("/others")->with("success", "Logo successfully updated!");               
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
