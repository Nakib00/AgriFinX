<?php

namespace App\Livewire\AgriProject;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProjectIndex extends Component
{
    public function render()
    {
        // fetch all project
        $cropprojects = DB::select("SELECT cp.*, it.investing_amount
        FROM cropprojects cp
        LEFT JOIN investing_tracks it ON cp.id = it.project_id
    ");
        return view('livewire.agri-project.project-index', compact('cropprojects'));
    }
}
