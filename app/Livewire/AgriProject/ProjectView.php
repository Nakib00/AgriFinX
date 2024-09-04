<?php

namespace App\Livewire\AgriProject;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ProjectView extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        // Find the project by its ID
        $cropproject = DB::select("SELECT cp.*, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name,
            f.email AS farmer_email,
            f.phone AS farmer_phone,
            f.address AS farmer_address,
            c.name AS crop_name
            FROM cropprojects AS cp
            INNER JOIN farmers AS f ON cp.farmer_id = f.id
            INNER JOIN crops AS c ON cp.crop_id = c.id
            WHERE cp.id = ?", [$this->id]);

        return view('livewire.agri-project.project-view', compact('cropproject'));
    }
}
