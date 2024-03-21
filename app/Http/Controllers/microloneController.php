<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ingo_financial_grup, flnancial_group};

class microloneController extends Controller
{
    //microlone view profile
    public function mview($id)
    {

        // Find the organization record by its ID
        $about = ingo_financial_grup::findOrFail($id);

        // Fetch additional information from the flnancial_groups table
        $organization = flnancial_group::findOrFail($about->Organization_id);

        return view('website.microloan.view', ['about' => $about, 'organization' => $organization]);
    } //end
}
