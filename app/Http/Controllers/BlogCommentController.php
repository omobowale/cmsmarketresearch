<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogComment;

class BlogCommentController extends Controller
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get the comment
        $comment = BlogComment::find($id);
        if($comment != null){
            if($comment->status == "pending"){
                $comment->status = "approved";
                $comment->save();
                return back()->with("success", "Comment has been approved");
            }
            else {
                $comment->status = "pending";
                $comment->save();
                return back()->with("success", "Comment has been unapproved");
            }

        }

        return redirect()->with("error", "Could not approve/unapprove comment");
        
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
        $comment = BlogComment::find($id);
        if($comment != null){
            $comment->delete();
            return back()->with("success", "Comment has been deleted");            
        }
        else{
            return back()->with("error", "Comment could not be deleted");
        }
    }
}
