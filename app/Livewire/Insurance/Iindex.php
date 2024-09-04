<?php

namespace App\Livewire\Insurance;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Iindex extends Component
{
    public function render()
    {
        // Fetch all loan insurance type users from the database
        $insuranceProviders = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'insurance_organization'");
        return view('livewire.insurance.iindex', compact('insuranceProviders'));
    }
}
