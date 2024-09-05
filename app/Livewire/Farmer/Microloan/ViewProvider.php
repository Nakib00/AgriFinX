<?php

namespace App\Livewire\Farmer\Microloan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class ViewProvider extends Component
{
    public $about;
    public $organization;
    public $provider_id;


    public function mount($id)
    {
        // Find the organization record by its ID
        $this->about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // Fetch additional information from the financial_groups table
        $this->organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        $this->provider_id = $id;
    }
    public function render()
    {
        return view('livewire.farmer.microloan.view-provider');
    }
}
