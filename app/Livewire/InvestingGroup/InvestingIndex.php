<?php

namespace App\Livewire\InvestingGroup;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InvestingIndex extends Component
{
    public function render()
    {
        // Fetch all loan investing type users from the database
        $investingorg = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'investing_organization'");
        return view('livewire.investing-group.investing-index', compact('investingorg'));
    }
}
