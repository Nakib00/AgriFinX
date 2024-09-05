<?php

namespace App\Livewire\Farmer\Project;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ShowProject extends Component
{
    public $cropproject;
    public $cropproject_id;
    public $sell;

    public function mount($id)
    {
        // Fetch crop project data based on ID
        $this->cropproject = DB::selectOne("SELECT cp.*, c.*
            FROM cropprojects cp
            INNER JOIN crops c ON cp.crop_id = c.id
            WHERE cp.id = ?", [$id]);

        // Convert dates to month and day format using Carbon
        $this->cropproject->cropStartMonthDay = Carbon::parse($this->cropproject->cultavation_start)->format('m-d');
        $this->cropproject->cropEndMonthDay = Carbon::parse($this->cropproject->cultavation_end)->format('m-d');
        $this->cropproject->launchMonthDay = Carbon::parse($this->cropproject->launch_date)->format('m-d');
        $this->cropproject->endMonthDay = Carbon::parse($this->cropproject->end_date)->format('m-d');

        $this->cropproject_id = $id;
    }
    // Method to update the sell price
    public function updateSellPrice()
    {
        DB::update('UPDATE cropprojects SET sells = ? WHERE id = ?', [$this->sell, $this->cropproject_id]);

        // Reload the data after update
        $this->cropproject->sells = $this->sell;

        // Optionally show a success message
        session()->flash('message', 'Sell price updated successfully.');
    }

    public function render()
    {
        return view('livewire.farmer.project.show-project');
    }
}
