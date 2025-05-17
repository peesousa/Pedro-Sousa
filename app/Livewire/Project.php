<?php

namespace App\Livewire;

use App\Enums\ProjectStatus;
use App\Models\Project as ModelsProject;
use Livewire\Component;

class Project extends Component
{
    public $projectItems = [];

    public function mount(){
        $this->loadProjects();
    }

    public function loadProjects(){
        $this->projectItems = ModelsProject::where('status', ProjectStatus::Published)
            ->orderBy('sort_order', 'asc')
            ->orderBy('project_date', 'desc')
            ->get();
    }

    public function render()
    {
        return view('livewire.project');
    }
}
