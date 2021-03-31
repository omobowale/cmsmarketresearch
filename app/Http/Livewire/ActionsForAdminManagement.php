<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Users;

class ActionsForAdminManagement extends Component
{

    public $user;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-admin-management', ["user" => $this->user, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteUser(){
        $user = User::find($this->user->id);
        
        //now delete the user
        $user->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Admin has been deleted!");
        return redirect("/admin-management"); //->with();                
    }

}
