<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{agricultural_officer, subsidies};


class subsidy extends Controller
{
    //open subsidy page
    public function indexsubsidy()
    {

        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        // Fetch all loan provider type users from the database
        $agriofficer = agricultural_officer::all();

        // acceped subsidiary list
        $subsideApplications = subsidies::where('farmer_id', $userid)->get();

        return view('website.users.farmer.subsidy.indexsubsidy', compact('agriofficer','subsideApplications'));
    }

    // open subsidiary apply page
    public function apply($id)
    {
        $agriofficerid = $id;

        return view('website.users.farmer.subsidy.applysubsidy', compact('agriofficerid'));
    }

    // store subsidiary apply cation
    public function subsidyapply(Request $request, $id)
    {
        // agri officer id
        $agriofficer = $id;

        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        $subsidy = new subsidies();
        $subsidy->reason_of_taking_subsidies = $request['reason'];
        $subsidy->amount = $request['amount'];
        $subsidy->farm_size = $request['farm_size'];
        $subsidy->farmer_id = $userid;
        $subsidy->agri_officer_id = $agriofficer;
        $subsidy->save();

        return back()->with('success', 'Subsidy application submitted successfully!');
    }

    // subsidies status change
    public function subsidestatus($id, $status)
    {

        $subside = subsidies::findOrFail($id);
        $subside->approvel_status = $status;
        $subside->save();

        return redirect()->back()->with('success', 'Subside status changed successfully.');
    }
}
