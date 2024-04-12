<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\{insurance};

class insuranceController extends Controller
{
    //incurance view profile
    public function viewinsuranceprovider($id)
    {
        // Find the organization record by its ID
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        // Fetch additional information from the flnancial_groups table
        $about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;
        // fatch all crop project of the login farmer
        $cropprojects = DB::select("SELECT * FROM cropprojects
        WHERE farmer_id = $userId
        ",);

        return view('website.users.farmer.insurance.viewinsuranceprovider', compact('cropprojects'));
    } //end

    // show insurance
    public function showinsurance()
    {
        // login insurance provider id
        $insuranceloan_id = Auth::guard('flnancial_group')->id();

        // Fetch insurance applications
        $insurance = DB::select("SELECT i.*, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name
            FROM insurances i
            INNER JOIN farmers f ON i.farmer_id = f.id
            WHERE i.Organization_id = $insuranceloan_id
        ");

        return view('website.users.agri_org.insurance_org.insuranceapply.insuranceapply', compact("insurance"));
    }

// View insurancec application data
    public function viewinsurance($id)
    {
        $insurance = DB::selectOne("SELECT i.*, cp.*, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name, f.*
            FROM insurances i
            INNER JOIN cropprojects cp ON i.crop_projectId = cp.id
            INNER JOIN farmers f ON i.farmer_id = f.id
            WHERE i.id = $id
        ");
        // dd($insurance);
        return view('website.users.agri_org.insurance_org.insuranceapply.viewinsurance', compact("insurance"));
    }

    //insurance loan status change
    public function insurancestatus(Request $request, $id)
    {
        $request->validate([
            'approvel_status' => 'required|in:0,1',

        ]);
        $insurance = insurance::findOrFail($id);

        $insurance->approvel_status = $request->input('approvel_status');
        //$ins->loan_issue_date = now();
        $insurance->save();

        return redirect()->back()->with('success', 'Insurance status updated successfully');
    }

    // approver
    public function approveinsurance()
    {
        //  login insurance provider id
        $insuranceprovider_id = Auth::guard('flnancial_group')->id();

        // all approved insurance
        $approvedInsurance = insurance::where('Organization_id', $insuranceprovider_id)
            ->where('approvel_status', 1)
            ->get();

        return view('website.users.agri_org.insurance_org.insuranceapply.approveinsurance', compact("approvedInsurance"));
    }
}
