<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogcategories = BlogCategory::all();
        return view("blogcategories.index")->with("blogcategories", $blogcategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("blogcategories.create");
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
            "blog_category.max" => "Category name should contain not more than 255 characters.",
            "blog_category.min" => "Category name should not be less than 2 characters.",
            "blog_category.required" => "Please enter a name for the category.",
        ];

        $validator = $request->validate([
            "blog_category" => ["required", "min:2", "max:255"],
        ], $customMessages);

        //add the blog category to database
        $blogcategory = new BlogCategory;
        $blogcategory->blog_category = $request->blog_category;
        if($blogcategory->save()){
            return redirect("/blogs/categories")->with("success", "New category successfully added!");               
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
        // $blogcategory = BlogCategory::find($id);
        // return $blogcategory->blogs;
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
        $blogcategory = BlogCategory::find($id);
        return view("blogcategories.edit")->with("blogcategory", $blogcategory);
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
            "blog_category.max" => "Category name should contain not more than 255 characters.",
            "blog_category.min" => "Category name should not be less than 2 characters.",
            "blog_category.required" => "Please enter a name for the category.",
        ];

        $validator = $request->validate([
            "blog_category" => ["required", "min:2", "max:255"],
        ], $customMessages);

        //add the blog category to database
        $blogcategory = BlogCategory::find($id);
        $blogcategory->blog_category = $request->blog_category;

        if($blogcategory->save()){
            return redirect("/blogs/categories")->with("success", "Category successfully updated!");               
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
