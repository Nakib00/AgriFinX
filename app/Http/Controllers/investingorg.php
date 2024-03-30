<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\{ingo_financial_grup, flnancial_group, investing_track_Organization};

class investingorg extends Controller
{
    //Investing org view profile
    public function ivesview($id)
    {
        // Find the organization record by its ID
        $about = ingo_financial_grup::findOrFail($id);

        // Fetch additional information from the flnancial_groups table
        $organization = flnancial_group::findOrFail($about->Organization_id);

        return view('website.investinggroup.view', ['about' => $about, 'organization' => $organization]);
    } //end


    // shwo investor info
    public function showinvestor()
    {

        // login loan investing org id
        $investingorg_id = Auth::guard('flnancial_group')->id();

        // Retrieve investment data for the logged-in financial group
        $investments = investing_track_Organization::where('Organization_id', $investingorg_id)->get();

        return view('website.users.agri_org.investing_org.invest.invest', compact('investments'));;
    }
}
