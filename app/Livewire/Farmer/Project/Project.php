<?php

namespace App\Livewire\Farmer\Project;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\cropproject;


class Project extends Component
{
    public $cropprojects;

    // Delete project function
    public function deleteProject($id)
    {
        // Find the crop project by its ID
        $cropproject = Cropproject::find($id);

        // Check if the crop project exists
        if (!$cropproject) {
            // Redirect with an error message
            session()->flash('error', 'Crop project not found.');
            return;
        }

        // Delete the crop project
        $cropproject->delete();

        // Set a success message and refresh the project list
        session()->flash('success', 'Crop project deleted successfully.');
        $this->fetchProjects();
    }

    public function fetchProjects()
    {
        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;

        // Retrieve all crop projects created by the logged-in farmer
        $this->cropprojects = DB::table('cropprojects')
            ->where('farmer_id', $userId)
            ->get();
    }

    public function mount()
    {
        // Initialize crop projects when the component is mounted
        $this->fetchProjects();
    }

    public function render()
    {
        return view('livewire.farmer.project.project');
    }
}
