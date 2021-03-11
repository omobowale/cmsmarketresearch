<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Blog;

class ActionsForBlog extends Component
{

    public $blog;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-blog', ["blog" => $this->blog, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteBlog(){
        $blog = Blog::find($this->blog->id);
        
        //first delete associated comments
        $blog->blogcomments()->delete();

        //now delete the blog
        $blog->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Blog (and it's comments) has been deleted!");
        return redirect("/blogs"); //->with();                
    }

}
