<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::all();
        return view('services.index')->with("services", $services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $requestData = $request->all();

        $customMessages = [
            "name.max" => "Name of the service should contain not more than 255 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the service.",
            "short_description.required" => "Please enter a short description for the service.",
            "short_description.min" => "Short description should not be less than 20 characters.",
            "full_description.required" => "Please enter a full description for the service.",
            "full_description.min" => "Full description should not be less than 20 characters.",
            "image.required" => "Please select an image for the service.",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
            "met_title.required" => "Please enter a meta title for the service.",
            "met_description.required" => "Please enter a meta description for the service."
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:255"],
            "short_description" => ["required", "min:20"],
            "full_description" => ["required", "min: 20"],
            "image" => ["required", "image", "mimes:jpg,jpeg,png", "max:2048"],
            "slug" => ["nullable"],
            "meta_title" => ["required"],
            "meta_description" => ["required"]
        ], $customMessages);

        //check for slug
        if($request->slug == ""){
            $slug = Helper::getSlug($request->name);
        }
        else{
            $slug = Helper::getSlug($request->slug);
        }

        //add the service to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $service = new Service;
                $service->name = $request->name;
                $service->short_description = $request->short_description;
                $service->full_description = $request->full_description;
                $service->image_path = $image_name;
                $service->slug = $slug;
                $service->meta_title = $request->meta_title;
                $service->meta_description = $request->meta_description;
                $service->save();
                return redirect("/services")->with("success", "New service successfully added!");               
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
        $service = Service::find($id);
        return view('services.show')->with('service', $service);
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
        $service = Service::find($id);

        return view('services.edit')->with("service", $service);
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
        //get service by id
        $service = Service::find($id);
        
        $requestData = $request->all();

        $customMessages = [
            "name.max" => "Name of the service should contain not more than 255 characters.",
            "name.min" => "Name should not be less than 2 characters.",
            "name.required" => "Please enter a name for the service.",
            "short_description.required" => "Please enter a short description for the service.",
            "short_description.min" => "Short description should not be less than 20 characters.",
            "full_description.required" => "Please enter a full description for the service.",
            "full_description.min" => "Full description should not be less than 20 characters.",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
            "met_title.required" => "Please enter a meta title for the service.",
            "met_description.required" => "Please enter a meta description for the service."
        ];

        $validator = $request->validate([
            "name" => ["required", "min:2", "max:255"],
            "short_description" => ["required", "min:20"],
            "full_description" => ["required", "min: 20"],
            "image" => "nullable|image|mimes:jpg,jpeg,png|max:2048",
            "slug" => ["nullable"],
            "meta_title" => ["required"],
            "meta_description" => ["required"]
        ], $customMessages);

        //check for slug
        if($request->slug == ""){
            $slug = Helper::getSlug($request->name);
        }
        else{
            $slug = Helper::getSlug($request->slug);
        }

        //add the service to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $service->name = $request->name;
                $service->short_description = $request->short_description;
                $service->full_description = $request->full_description;
                $service->image_path = $image_name;
                $service->slug = $slug;
                $service->meta_title = $request->meta_title;
                $service->meta_description = $request->meta_description;
                $service->save();                
            }
        }
        else {
            $service->name = $request->name;
            $service->short_description = $request->short_description;
            $service->full_description = $request->full_description;
            $service->slug = $slug;
            $service->meta_title = $request->meta_title;
            $service->meta_description = $request->meta_description;
            $service->save();
        }
    
        return redirect("/services")->with("success", "Service has been updated!");
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
