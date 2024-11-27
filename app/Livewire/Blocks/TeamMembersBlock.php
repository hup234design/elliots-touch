<?php

namespace App\Livewire\Blocks;

use App\Models\Content\TeamMember;
use Livewire\Component;

class TeamMembersBlock extends Component
{
    public $teamMembers = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->teamMembers = TeamMember::all();
    }

    public function render()
    {
        return view('livewire.blocks.team-members-block');
    }
}
