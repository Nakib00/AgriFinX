<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{investing_track_Organization, Cropproject, investingorg_track};

class investingorg extends Controller
{
    //Investing org view profile
    public function ivesview($id)
    {
        // Find the organization record by its ID
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        // Fetch additional information from the flnancial_groups table
        $about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // dd($organization);
        return view('website.investinggroup.view', ['about' => $about, 'organization' => $organization]);
    } //end


    // shwo investor info
    public function showinvestor()
    {
        // login loan investing org id
        $investingorg_id = Auth::guard('flnancial_group')->id();

        // Retrieve investment data for the logged-in financial group
        $investments = DB::select("SELECT ito.*, CONCAT(i.f_name, ' ', i.l_name) AS
            FROM investing_track__organizations itoinvestor_name
            INNER JOIN investors i ON ito.investor_id = i.id
            WHERE ito.Organization_id = $investingorg_id
        ");

        return view('website.users.agri_org.investing_org.invest.invest', compact('investments'));;
    }

    // show crop projects
    public function showproject()
    {
        // get investororg id
        $investingorg_id = Auth::guard('flnancial_group')->id();

        // Fetch the investments made by the logged-in investor
        $investments = DB::select("SELECT cp.project_name AS project_name,
            it.investing_amount AS investing_amount,
            it.investing_date AS investing_date,
            it.percentage_rate AS percentage_rate
            FROM investingorg_tracks it
            INNER JOIN cropprojects cp ON it.project_id = cp.id
            WHERE it.investingorg_id = $investingorg_id
        ");

        // show all crop projects
        $cropproject = DB::select("SELECT * FROM cropprojects");

        return view('website.users.agri_org.investing_org.cropproject.showcropproject', compact('cropproject','investments'));
    }

    // view crop projects
    public function projectview($id)
    {
        // Retrieve the crop project based on the provided ID
        $cropproject = DB::selectOne("SELECT cp.*, CONCAT(f.f_name, ' ', f. l_name) AS farmer_name,
        f.email AS farmer_email,
        f.phone AS farmer_phone,
        f.address AS farmer_address,
        c.name AS crop_name
            FROM cropprojects AS cp
            INNER JOIN farmers AS f ON cp.farmer_id = f.id
            INNER JOIN crops AS c ON cp.crop_id = c.id
            WHERE cp.id = $id
        ");

        return view('website.users.agri_org.investing_org.cropproject.viewporject', compact('cropproject'));
    }

    // Invest in crop projects
    public function investcrop(Request $request, $id)
    {

        // get investororg id
        $investingorg_id = Auth::guard('flnancial_group')->id();

        // get current crop project id
        $project_id = $id;

        // Get the current date
        $investing_date = now();

        // Create a new instance of InvestingTrack model and store the data
        investingorg_track::create([
            'investingorg_id' => $investingorg_id,
            'project_id' => $project_id,
            'investing_amount' => $request->investing_amount,
            'percentage_rate' => $request->percentage_rate,
            'investing_date' => $investing_date,
        ]);

        // Optionally, you can redirect the user to a specific page after the investment is made
        return redirect()->back()->with('success', 'Investment successful.');
    }
}
