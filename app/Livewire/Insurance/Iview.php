<?php

namespace App\Livewire\Insurance;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Iview extends Component
{

    public $organization;
    public $about;
    public $organizationId;

    // Capture the ID when the component is initialized
    public function mount($id)
    {
        $this->organizationId = $id;

        // Fetch data based on the ID
        $this->organization = DB::select("SELECT * FROM flnancial_groups WHERE id = ?", [$this->organizationId]);
        $this->about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = ?", [$this->organizationId]);
    }
    public function render()
    {
        return view('livewire.insurance.iview', [
            'organization' => $this->organization,
            'about' => $this->about,
        ]);
    }
}
