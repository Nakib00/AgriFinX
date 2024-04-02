<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{ingo_financial_grup, flnancial_group};

class insuranceController extends Controller
{
    //incurance view profile
    public function iview($id)
    {
        // Find the organization record by its ID
        $about = ingo_financial_grup::findOrFail($id);

        // Fetch additional information from the flnancial_groups table
        $organization = flnancial_group::findOrFail($about->Organization_id);

        return view('website.insurance.view', ['about' => $about, 'organization' => $organization]);
    } //end

    public function showinsurance()
    {

        // login loan provider id
        $insuranceloan_id = Auth::guard('flnancial_group')->id();

        // Fetch microloan applications
        $insurance = insurance::where('Organization_id', $insuranceloan_id)->with('farmer')->get();

        return view('website.users.agri_org.insurance_org.insuranceapply.insuranceapply',compact("insurance"));
    }
    public function viewinsurance($id)
    {

         $insurance = insurance::findOrFail($id);

         return view('website.users.agri_org.insurance_org.insuranceapply.viewinsurance',compact("insurance"));
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

        
        public function approveinsurance()
        {
    
            //  login loan provider id
            $insuranceprovider_id = Auth::guard('flnancial_group')->id();
    
            // all approved loans
            $approvedInsurance = insurance::where('Organization_id', $insuranceprovider_id)
                ->where('approvel_status',1)
                ->get();
    
            return view('website.users.agri_org.insurance_org.insuranceapply.approveinsurance',compact("approvedInsurance"));
        }
    }






