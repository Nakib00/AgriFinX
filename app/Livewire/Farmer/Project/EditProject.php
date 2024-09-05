<?php

namespace App\Livewire\Farmer\Project;

use Livewire\Component;
use App\Models\Cropproject;
use App\Models\Crop; // Assuming there is a Crop model
use Illuminate\Support\Facades\DB;

class EditProject extends Component
{
    public $cropproject;
    public $cropproject_id;
    public $project_name;
    public $description;
    public $crop_id;
    public $launch_date;
    public $end_date;
    public $farm_size;
    public $corp_quality;
    public $pesticide_cost;
    public $labour_cost;
    public $crop;

    public function mount($id)
    {
        // Fetch the crop project by ID
        $this->cropproject = Cropproject::findOrFail($id);

        // Assign values to component properties
        $this->project_name = $this->cropproject->project_name;
        $this->description = $this->cropproject->description;
        $this->crop_id = $this->cropproject->crop_id;
        $this->launch_date = $this->cropproject->launch_date;
        $this->end_date = $this->cropproject->end_date;
        $this->farm_size = $this->cropproject->farm_size;
        $this->corp_quality = $this->cropproject->corp_quality;
        $this->pesticide_cost = $this->cropproject->pesticide_cost;
        $this->labour_cost = $this->cropproject->labour_cost;

        // Get all crops for the dropdown list
        $this->crop = Crop::all();

        $this->cropproject_id = $id;
    }

    // Method to update the crop project
    public function updateProject()
    {
        // Validation rules
        $this->validate([
            'project_name' => 'required|string|max:255',
            'description' => 'required|string',
            'crop_id' => 'required|integer',
            'launch_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:launch_date',
            'farm_size' => 'required|numeric',
            'corp_quality' => 'required|numeric',
            'pesticide_cost' => 'required|numeric',
            'labour_cost' => 'required|numeric',
        ]);

        // Find the crop project by ID and update
        $cropproject = Cropproject::findOrFail($this->cropproject_id);
        $cropproject->update([
            'project_name' => $this->project_name,
            'description' => $this->description,
            'crop_id' => $this->crop_id,
            'launch_date' => $this->launch_date,
            'end_date' => $this->end_date,
            'farm_size' => $this->farm_size,
            'corp_quality' => $this->corp_quality,
            'pesticide_cost' => $this->pesticide_cost,
            'labour_cost' => $this->labour_cost,
        ]);

        // Flash success message and redirect
        session()->flash('message', 'Crop project updated successfully.');

        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.farmer.project.edit-project');
    }
}
