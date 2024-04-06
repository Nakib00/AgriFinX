<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\flnancial_group;
use App\Models\{farmer, cropproject, crop};

class appsfunctioncontroller extends Controller
{
    //Show loans providers
    public function mindex()
    {
        // Fetch all loan provider type users from the database
        $loanProviders = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'loan_provider'");
        return view('website.microloan.mindex', compact('loanProviders'));
    }
    // show insurance provider
    public function iindex()
    {
        // Fetch all loan insurance type users from the database
        $insuranceProviders = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'insurance_organization'");
        return view('website.insurance.iindex', compact('insuranceProviders'));
    }
    // show investing organizations
    public function ivesindex()
    {
        // Fetch all loan investing type users from the database
        $investingorg = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'investing_organization'");
        return view('website.investinggroup.investindex', compact('investingorg'));
    }
    // shwo agri project
    public function agropindex()
    {
        // fetch all project
        $cropprojects = DB::select("SELECT cp.*, it.investing_amount
            FROM cropprojects cp
            LEFT JOIN investing_tracks it ON cp.id = it.project_id
        ");

        return view('website.agroproject.agropindex', compact('cropprojects'));
    }

    // show details of project
    public function showagriproject($id)
    {
        // Find the project by its ID
        $cropproject = DB::select("SELECT cp.project_name, cp.description, cp.launch_date, cp.end_date, cp.farm_size, cp.       corp_quality, cp.pesticide_cost, cp.labour_cost, (cp.labour_cost + cp.pesticide_cost) AS total_expense, CASE WHEN cp.funding_status = 1 THEN 'Funded' ELSE 'Not Funded' END AS funding_status, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name,f.email AS farmer_email,f.phone AS farmer_phone, f.address AS farmer_address, c.name AS crop_name, cp.created_at, cp.updated_at FROM cropprojects AS cp INNER JOIN farmers AS f ON cp.farmer_id = f.id INNER JOIN crops AS c ON cp.crop_id = c.id WHERE cp.id = $id
        ");

        // dd($cropproject);
        return view('website.agroproject.showagriporject', compact('cropproject'));
    }
}
