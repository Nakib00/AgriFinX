<?php

namespace App\Livewire\Microloan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Mindex extends Component
{
    public function render()
    {
        $loanProviders = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'loan_provider'");
        return view('livewire.microloan.mindex', compact('loanProviders'));
    }
}
