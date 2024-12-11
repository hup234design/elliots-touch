<?php

namespace App\Livewire\Blocks;

use App\Models\Content\TeamMember;

class TeamMembersBlock extends BaseBlockComponent
{
    public $teamMembers = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->teamMembers = TeamMember::all();
    }
}
