<?php

namespace App\Livewire\InvestingGroup;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class InvestingView extends Component
{
    public $id;

    public function mount($id)
    {
        $this->id = $id;
    }

    public function render()
    {
        // Find the organization record by its ID
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = ?", [$this->id]);

        // Fetch additional information from the ingo_financial_grups table
        $about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = ?", [$this->id]);

        return view('livewire.investing-group.investing-view', [
            'about' => $about,
            'organization' => $organization
        ]);
    }
}
