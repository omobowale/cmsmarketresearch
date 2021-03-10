<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Service;

class ActionsForService extends Component
{

    public $service;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-service', ["service" => $this->service, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteService(){
        $service = Service::find($this->service->id);
        $service->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Service has been deleted!");
        return redirect("/services"); //->with();                
    }

}
