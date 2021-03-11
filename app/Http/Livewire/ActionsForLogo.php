<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Logo;

class ActionsForLogo extends Component
{

    public $logo;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-logo', ["logo" => $this->logo, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteLogo(){
        $logo = Logo::find($this->logo->id);
        
        //now delete the logo
        $logo->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Logo has been deleted!");
        return redirect("/others"); //->with();                
    }

}
