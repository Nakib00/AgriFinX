<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{ingo_financial_grup, flnancial_group, micro_loan};

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


    // loan provider user controller
    // show apply loan
    public function showloan()
    {

        // login loan provider id
        $loanprovider_id = Auth::guard('flnancial_group')->id();

        // Fetch microloan applications
        $microloans = micro_loan::where('Organization_id', $loanprovider_id)->with('farmer')->get();

        return view('website.users.agri_org.loan_provider.loanapply.loanapply', ['microloans' => $microloans]);
    }

    // show loan
    public function viewloan($id)
    {

        $microloan = micro_loan::findOrFail($id);

        return view('website.users.agri_org.loan_provider.loanapply.viewloan', ['microloan' => $microloan]);
    }

    // loan status change
    public function loanstatus(Request $request, $id)
    {
        $request->validate([
            'approval_status' => 'required|in:0,1',
            'debt_repayment_date' => 'required|date',
        ]);
        // Find the microloan record by ID
        $microloan = Micro_loan::findOrFail($id);

        $microloan->approval_status = $request->input('approval_status');
        $microloan->loan_issue_date = now();
        $microloan->debt_repayment_date = $request->input('debt_repayment_date');

        $microloan->save();

        return redirect()->back()->with('success', 'Loan status updated successfully');
    }

    // shwo all aproved loan
    public function approveloan(){

        return view('website.users.agri_org.loan_provider.loanapply.approveloan');
    }
}
