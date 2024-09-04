<?php

namespace App\Livewire\Microloan;

use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Mview extends Component
{
    public $organization;
    public $about;
    public $organizationId;

    public function mount($id)
    {
        $this->organizationId = $id;

        // Fetch data based on the ID
        $this->organization = DB::select("SELECT * FROM flnancial_groups WHERE id = ?", [$this->organizationId]);
        $this->about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = ?", [$this->organizationId]);
    }

    public function render()
    {
        return view('livewire.microloan.mview', [
            'organization' => $this->organization,
            'about' => $this->about,
        ]);
    }
}
