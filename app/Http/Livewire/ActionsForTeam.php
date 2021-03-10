<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\TeamMember;

class ActionsForTeam extends Component
{

    public $teammember;
    public $modalFormVisible = false;
    public $viewing;
    public $styleClass;

    public function showModalForm(){
        $this->modalFormVisible = true;
    }

    public function render()
    {
        return view('livewire.actions-for-team', ["teammember" => $this->teammember, "viewing" => $this->viewing, "styleClass" => $this->styleClass]);
    }

    public function deleteMember(){
        $member = TeamMember::find($this->teammember->id);
        $member->delete();
        $this->modalFormVisible = false;
        session()->flash("success", "Team member has been deleted!");
        return redirect("/team-members");
        
    }

}
