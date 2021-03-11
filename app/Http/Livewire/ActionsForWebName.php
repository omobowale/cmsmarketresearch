<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\WebsiteName;

class ActionsForWebName extends Component
{

    public $webname;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-web-name', ["logo" => $this->webname, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteWebName(){
        $webname = WebsiteName::find($this->webname->id);
        
        //now delete the logo
        $webname->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Website name has been deleted!");
        return redirect("/others"); //->with();                
    }

}
