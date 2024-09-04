<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Index extends Component
{
    public function render()
    {
        // Cropproject
        $cropprojects = $cropprojects = DB::select("
    SELECT cp.*, it.investing_amount
    FROM cropprojects cp
    LEFT JOIN investing_tracks it ON cp.id = it.project_id LIMIT 3");

        // Total cropprojects
        $totalcroppeoject = DB::select("SELECT COUNT(*) AS totalcroppeoject FROM cropprojects")[0]->totalcroppeoject;

        // Total investor count
        $totalinvestor = DB::select("SELECT COUNT(*) AS total_investors FROM investors")[0]->total_investors;

        return view('livewire.index', compact('cropprojects', 'totalcroppeoject', 'totalinvestor'));
    }
}
