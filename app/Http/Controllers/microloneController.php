<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{ingo_financial_grup, flnancial_group, micro_loan};
use Illuminate\Support\Facades\DB;

class microloneController extends Controller
{
    //microlone view profile
    public function mview($id)
    {

        // Find the organization record by its ID
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        // Fetch additional information from the flnancial_groups table
        $about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // dd($organization);

        return view('website.microloan.view', compact('organization','about'));
    } //end


    // loan provider user controller
    // show apply loan
    public function showloan()
    {
        // login loan provider id
        $loanprovider_id = Auth::guard('flnancial_group')->id();

        // Fetch microloan applications
        $microloans = DB::select("SELECT ml.id, ml.reason_of_taking_loan, ml.amount, ml.interest_rate, ml.installment_period, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name
            FROM micro_loans ml
            INNER JOIN farmers f ON ml.farmer_id = f.id
            WHERE ml.Organization_id = $loanprovider_id
        ",);

        return view('website.users.agri_org.loan_provider.loanapply.loanapply', compact('microloans'));
    }

    // show loan
    public function viewloan($id)
    {
        $microloan = DB::selectOne("SELECT ml.*,f.*, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name
            FROM micro_loans ml
            INNER JOIN farmers f ON ml.farmer_id = f.id
            WHERE ml.id = $id
        ");

        $microloanid = $id;

        return view('website.users.agri_org.loan_provider.loanapply.viewloan', compact('microloan','microloanid'));
    }

    // loan status change
    public function loanstatus(Request $request, $id)
    {
        // dd($id);
        $request->validate([
            'approval_status' => 'required|in:0,1',
            'debt_repayment_date' => 'required|date',
        ]);
        // Find the microloan record by ID
        $microloan = micro_loan::findOrFail($id);

        $microloan->approval_status = $request->input('approval_status');
        $microloan->loan_issue_date = now();
        $microloan->debt_repayment_date = $request->input('debt_repayment_date');

        $microloan->save();

        return redirect()->back()->with('success', 'Loan status updated successfully');
    }

    // shwo all aproved loan
    public function approveloan()
    {

        //  login loan provider id
        $loanprovider_id = Auth::guard('flnancial_group')->id();

        // all approved loans
        $approvedLoans = DB::select("SELECT ml.id, ml.reason_of_taking_loan, ml.amount, ml.interest_rate, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name
            FROM micro_loans ml
            INNER JOIN farmers f ON ml.farmer_id = f.id
            WHERE ml.Organization_id = $loanprovider_id
            AND ml.approval_status = 1
        ");

        return view('website.users.agri_org.loan_provider.loanapply.approveloan', compact('approvedLoans'));
    }
}
