<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\BlogCategory;

class ActionsForBlogCategory extends Component
{

    public $blogcategory;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-blog-category', ["blogcategory" => $this->blogcategory, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteBlogCategory(){
        $nblogcategory = BlogCategory::find($this->blogcategory->id);

        //first delete all associated blogs
        $nblogcategory->blogs()->delete();

        //now delete the blog category itself
        $nblogcategory->delete();
        
        //take out the modal
        $this->modalFormVisible = false;

        //set session variable
        session()->flash("success", "Blog category has been deleted!");

        //redirect to blog categories page
        return redirect("/blogs/categories"); //->with();                
    }

}
