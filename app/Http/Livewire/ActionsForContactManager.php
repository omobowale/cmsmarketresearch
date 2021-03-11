<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ContactManager;

class ActionsForContactManager extends Component
{

    public $contact;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-contact-manager', ["contact" => $this->contact, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteContact(){
        $contact = ContactManager::find($this->contact->id);
        
        //now delete the contact
        $contact->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Contact details have been deleted!");
        return redirect("/others"); //->with();                
    }

}
