<?php

namespace App\Livewire\Blocks;

use App\Models\Content\Project;

class ProjectsBlock extends BaseBlockComponent
{
    public $projects = [];

    public function mount($data)
    {
        $this->data = $data;
        $this->projects = Project::visible()
            ->orderBy('sort_order', 'asc')
            ->get();
    }
}
