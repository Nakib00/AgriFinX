<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ingo_financial_grup, flnancial_group};

class investingorg extends Controller
{
    //Investing org view profile
    public function ivesview($id)
    {

        // Find the organization record by its ID
        $about = ingo_financial_grup::findOrFail($id+1);

        // Fetch additional information from the flnancial_groups table
        $organization = flnancial_group::findOrFail($about->Organization_id);

        return view('website.investinggroup.view', ['about' => $about, 'organization' => $organization]);
    } //end
}
