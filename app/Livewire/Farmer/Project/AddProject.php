<?php

namespace App\Livewire\Farmer\Project;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use App\Models\cropproject;
use Illuminate\Support\Facades\Auth;

class AddProject extends Component
{
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

    // Method to load crops from the database
    public function mount()
    {
        $this->crop = DB::table('crops')->get();
        // dd($this->crop);
    }

    // Validation rules
    protected $rules = [
        'project_name' => 'required|string|max:255',
        'description' => 'required|string',
        'crop_id' => 'required|exists:crops,id',
        'launch_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:launch_date',
        'farm_size' => 'required|numeric',
        'corp_quality' => 'required|numeric',
        'pesticide_cost' => 'required|numeric',
        'labour_cost' => 'required|numeric',
    ];

    // Method to handle form submission
    public function submit()
    {
        // Validate the form data
        $this->validate();

        // Get the logged-in farmer ID
        $userid = Auth::guard('farmer')->id();

        // Create a new crop project
        Cropproject::create([
            'farmer_id' => $userid,
            'project_name' => $this->project_name,
            'description' => $this->description,
            'crop_id' => $this->crop_id,
            'launch_date' => $this->launch_date,
            'end_date' => $this->end_date,
            'farm_size' => $this->farm_size,
            'corp_quality' => $this->corp_quality,
            'pesticide_cost' => $this->pesticide_cost,
            'labour_cost' => $this->labour_cost,
            'funding_status' => '0',
        ]);

        // Reset form fields
        $this->reset([
            'project_name',
            'description',
            'crop_id',
            'launch_date',
            'end_date',
            'farm_size',
            'corp_quality',
            'pesticide_cost',
            'labour_cost',
        ]);

        // Redirect with success message
        session()->flash('success', 'Crop project created successfully.');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.farmer.project.add-project');
    }
}
