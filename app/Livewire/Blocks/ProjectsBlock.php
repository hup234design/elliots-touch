<?php

namespace App\Livewire\Blocks;

use App\Models\Content\Project;
use Livewire\Component;

class ProjectsBlock extends BaseBlockComponent
{
    public $projects;
    #[Url(history: true)]
    public $slug = null;
    public $selectedProject = null;
//
    public function loadProjects()
    {
        $this->projects = Project::all();
        if ($this->slug) {
            $this->selectProject($this->slug);
        }
    }

    public function selectProject($slug)
    {
        $this->slug = $slug;
        $this->selectedProject = Project::where('id', $slug)->first();
    }

    public function closeProject()
    {
        $this->slug = null;
        $this->selectedProject = null;
    }

    public function mount($data)
    {
        $this->data = $data;
        $this->loadProjects();
    }

    public function render()
    {
        return view('livewire.blocks.projects-block');
    }
}
