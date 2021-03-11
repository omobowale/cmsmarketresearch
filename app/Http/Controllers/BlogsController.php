<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogTag;
use App\Models\Tag_Blog;
use App\Models\BlogCategory;
use App\Helper\Helper;
use DB;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $blogs = Blog::all();
        return view('blogs.index')->with(["blogs" => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("blogs.create");
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
            "title.max" => "Title of the blog should contain not more than 255 characters.",
            "title.min" => "Title should not be less than 2 characters.",
            "title.required" => "Please enter a title for the blog.",
            "short_introduction.required" => "Please enter a short introduction for the blog.",
            "short_introduction.min" => "Short introduction should not be less than 20 characters.",
            "content.required" => "Please enter a content for the blog.",
            "content.min" => "Content should not be less than 20 characters.",
            "image.required" => "Please select an image for the blog.",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
            "met_title.required" => "Please enter a meta title for the blog.",
            "met_description.required" => "Please enter a meta description for the blog."
        ];

        $validator = $request->validate([
            "title" => ["required", "min:2", "max:255"],
            "short_introduction" => ["required", "min:20"],
            "content" => ["required", "min: 20"],
            "image" => ["required", "image", "mimes:jpg,jpeg,png", "max:2048"],
            "slug" => ["nullable"],
            "tags" => ["nullable"],
            "meta_title" => ["required"],
            "meta_description" => ["required"]
        ], $customMessages);

       

        if($request->tags != ""){
            //begin a transaction
            DB::transaction(function () use ($request) {

                //add the tag and blog to database
               if($this->addTagAndBlogToDatabase($request)){
                    return redirect("/blogs")->with("success", "New blog successfully added!");               
               };
                
            });
        }

        //add the blog to database
        else {
            if($this->addBlogToDatabase($request) != null){
                return redirect("/blogs")->with("success", "New blog successfully added!");               
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
        $blog = Blog::find($id);
        if($blog !== null){
            return view("blogs.show")->with("blog", $blog);
        }
        return redirect("/blogs")->with("error", "Cannot load requested page");
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
        $blog = Blog::find($id);
        return view("blogs.edit")->with("blog", $blog);
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
            "title.max" => "Title of the blog should contain not more than 255 characters.",
            "title.min" => "Title should not be less than 2 characters.",
            "title.required" => "Please enter a title for the blog.",
            "short_introduction.required" => "Please enter a short introduction for the blog.",
            "short_introduction.min" => "Short introduction should not be less than 20 characters.",
            "content.required" => "Please enter a content for the blog.",
            "content.min" => "Content should not be less than 20 characters.",
            "image.image" => "Selected file should be an image",
            "image.mimes" => "Acceptable file types are jpg, jpeg and png",
            "image.max" => "Image size should not be more than 2MB",
            "met_title.required" => "Please enter a meta title for the blog.",
            "met_description.required" => "Please enter a meta description for the blog."
        ];

        $validator = $request->validate([
            "title" => ["required", "min:2", "max:255"],
            "short_introduction" => ["required", "min:20"],
            "content" => ["required", "min: 20"],
            "image" => ["nullable", "image", "mimes:jpg,jpeg,png", "max:2048"],
            "slug" => ["nullable"],
            "tags" => ["nullable"],
            "meta_title" => ["required"],
            "meta_description" => ["required"]
        ], $customMessages);

        $blog = Blog::find($id);
        $updated = false;

        if($request->tags != ""){
            //begin a transaction
            $updated = DB::transaction(function () use ($request, $blog, $updated) {
                //add the tag and update blog in database
                return $this->addTagAndUpdateBlogInDatabase($blog, $request);
            });

        }

        //update only blog in database
        else {
            $updated = $this->updateBlogInDatabase($blog, $request) != null;
        }

        if($updated){
            return redirect("/blogs")->with("success", "Blog updated successfully!");               
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

    public function addBlogToDatabase($request){
         //check for slug
         if($request->slug == ""){
            $slug = Helper::getSlug($request->name);
        }
        else{
            $slug = Helper::getSlug($request->slug);
        }
    
        //add the blog to database
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                //save to database
                $blog = new blog;
                $blog->title = $request->title;
                $blog->short_introduction = $request->short_introduction;
                $blog->content = $request->content;
                $blog->image_path = $image_name;
                $blog->slug = $slug;
                $blog->meta_title = $request->meta_title;
                $blog->meta_description = $request->meta_description;
                $blog->save();

                return $blog;
            }
        }

        return null;
    }

    public function updateBlogInDatabase($blog, $request){

         //check for slug
         if($request->slug == ""){
            $slug = Helper::getSlug($request->name);
        }
        else{
            $slug = Helper::getSlug($request->slug);
        }
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = str_replace(" ", "", $image->getClientOriginalName());
            if($image->move(public_path().'/images/', $image_name)){
                $blog->title = $request->title;
                $blog->short_introduction = $request->short_introduction;
                $blog->content = $request->content;
                $blog->image_path = $image_name;
                $blog->slug = $slug;
                $blog->meta_title = $request->meta_title;
                $blog->meta_description = $request->meta_description;
                $blog->save();
                return $blog;
            }
        }

        else{
                $blog->title = $request->title;
                $blog->short_introduction = $request->short_introduction;
                $blog->content = $request->content;
                $blog->slug = $slug;
                $blog->meta_title = $request->meta_title;
                $blog->meta_description = $request->meta_description;
                $blog->save();
                return $blog;
        }

        return null;
    }

    public function addTagAndBlogToDatabase($request){

        $newBlog = $this->addBlogToDatabase($request);
        
        $count = 0;

        if($newBlog != null){
            $count = $this->addTagToDatabase($newBlog, $request);
        }

        if($count > 0){
            //something has been added
            return true;
        }
    
        return false;

    }


    public function addTagAndUpdateBlogInDatabase($blog, $request){

        $updatedBlog = $this->updateBlogInDatabase($blog, $request);
        
        $count = 0;
        if($updatedBlog != null){
            $count = $this->addTagToDatabase($updatedBlog, $request);
        }
        
        if($count > 0){
            //something has been updated
            return true;
        }

        return false;

    }


    public function addTagToDatabase($blog, $request){
        //split string to array
        $tagArray = explode(",", str_replace(", ", ",", $request->tags));
        $count = 0;

        //remove all existing tag_blogs
        Tag_Blog::where('blog_id', $blog->id)->delete();

        //insert each item if not exist
        foreach($tagArray as $tag){
            if(!BlogTag::where('blog_tag', strtolower($tag))->exists()){
                $blogtag = new BlogTag;
                $blogtag->blog_tag = strtolower($tag);
                $blogtag->save();

                $tagId = $blogtag->id;
                
                //create a new tag_blog
                $tagAndBlog = new Tag_Blog;
                $tagAndBlog->blog_id = $blog->id;
                $tagAndBlog->blog_tag_id = $tagId;
                $tagAndBlog->save();

                //increment count
                $count++;
                
            }
            else{
                //create a new tag_blog
                $tagAndBlog = new Tag_Blog;
                $tagAndBlog->blog_id = $blog->id;
                $tagAndBlog->blog_tag_id = BlogTag::where('blog_tag', strtolower($tag))->first()->id;
                $tagAndBlog->save();

                //increment count
                $count++;

            }
        }        

        return $count;
    }

}
