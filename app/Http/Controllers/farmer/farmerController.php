<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\{farmer,micro_loan, insurance};
use Illuminate\Support\Facades\DB;

class farmerController extends Controller
{
    //dashboard
    public function dashboard()
    {
        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;

        // Find investment details for the extracted crop project
        $investedProjects = DB::select("SELECT cp.*, it.investing_amount, it.investing_date, it.percentage_rate
            FROM cropprojects cp
            INNER JOIN investing_tracks it ON cp.id = it.project_id
            WHERE cp.farmer_id = $userId
        ");
        // dd($investedProjects);

        return view('website.users.farmer.deashboad', ['investedProjects' => $investedProjects]);
    } //end

    // login
    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('farmer')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('farmer.dashboard')->with('success', 'Farmer login successfully');
        } else {
            return back()->with('error', 'Invalid password and email');
        }
    } //end

    //Register
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:agricultural_officers,email',
            'password' => 'required|min:8',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode('<br>', $errors);
            return redirect()->back()->withInput()->with('error', $errorMessage);
        }

        // Check if the email already exists
        $existingOfficer = farmer::where('email', $request->email)->first();

        if ($existingOfficer) {
            // Email already exists, return with an error message
            return redirect()->back()->withInput()->with('error', 'Email already exists. Please use a different email address.');
        }

        // Email does not exist, proceed with registration
        farmer::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_farmer')->with('success', 'farmer account created successfully.');
    } //end

    //logout
    public function logout()
    {
        Auth::guard('farmer')->logout();

        return redirect()->route('login_farmer')->with('success', 'Farmer logout successfully.');
    } //end

    // edit profile
    public function editprofile()
    {
        $user = auth()->guard('farmer')->user();
        return view('website.users.farmer.editprofile', compact('user'));
    } //end

    //update profile
    public function updateprofile(Request $request)
    {
        $user = auth()->guard('farmer')->user();
        $id = $user->id;


        // Find the team by ID
        $farmer = farmer::findOrFail($id);

        // Update user data
        $farmer->f_name = $request->input('f_name');
        $farmer->l_name = $request->input('l_name');
        $farmer->email = $request->input('email');
        $farmer->phone = $request->input('phone');
        $farmer->address = $request->input('address');
        $farmer->dateofbirth = $request->input('dateofbirth');

        // Save the changes to the user object
        $farmer->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } //end



    // Crop project section

    // show crop project
    public function cropproject()
    {
        return view('website.users.farmer.project.croppeoject');
    }

    // add crop project
    public function addproject()
    {
        return view('website.users.farmer.project.addcropproject');
    }

    // Show crop projectq
    public function showproject($id)
    {
        $cropproject_id = $id;
        return view('website.users.farmer.project.showcropproject', compact('cropproject_id'));
    }

    // Open edit crop project page
    public function editproject($id)
    {
        $cropproject_id = $id;
        // Pass the crop project data to the view
        return view('website.users.farmer.project.editcropproject',compact('cropproject_id'));
    }

    // Microloan
    public function showloanprovider()
    {
        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        // Fetch all loan provider type users from the database
        $loanProviders = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'loan_provider'");

        // Retrieve all loan applications
        $loanApplications = DB::select("SELECT ml.*, CONCAT(fg.f_name, ' ', fg.l_name) AS financial_group_name
            FROM micro_loans ml
            INNER JOIN flnancial_groups fg ON ml.Organization_id = fg.id
            WHERE ml.farmer_id = $userid
        ");

        return view('website.users.farmer.loan.loanprovider', compact('loanProviders', 'loanApplications'));
    }
    // shwo loan provider profile
    public function viewloanprovider($id)
    {
        $provider_id = $id;
        return view('website.users.farmer.loan.viewloanprovider', compact('provider_id'));
    }

    // apply loan
    public function applyloan(Request $request, $id)
    {
        // loneprovider id
        $loanprovider = $id;
        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        $loan = new micro_loan();
        $loan->reason_of_taking_loan = $request['reason'];
        $loan->amount = $request['amount'];
        $loan->installment_period = $request['installment'];
        $loan->interest_rate = $request->input('amount') * 0.08;
        $loan->Organization_id = $loanprovider;
        $loan->farmer_id = $userid;
        $loan->approval_status = 0; // default o for not approved
        $loan->save();

        return back()->with('success', 'Loan application submitted successfully!');
    }



    //insurance
    public function showinsuranceprovider()
    {
        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;
        // Retrieve all loan applications


        // Fetch all loan provider type users from the database
        $Insuranceroviders = DB::select("SELECT *
            FROM flnancial_groups
            WHERE Orgnization_type = 'insurance_organization'
        ");
        // Retrieve all loan applications
        $insuApplications = DB::select("SELECT ins.*, CONCAT(fg.f_name, ' ', fg.l_name) AS financial_group_name
        FROM insurances ins
        INNER JOIN flnancial_groups fg ON ins.Organization_id = fg.id
        WHERE ins.farmer_id = $userid
        ");

        return view('website.users.farmer.insurance.insuranceprovider', compact('Insuranceroviders', 'insuApplications'));
    }

    // shwo insurance provider profile
    public function viewinsuranceprovider($id)
    {
        // Find the organization record by its ID
        $about =  DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // Fetch additional information from the flnancial_groups table
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;
        // fatch all crop project of the login farmer
        $cropprojects = DB::select("SELECT * FROM cropprojects
        WHERE farmer_id = $userId
        ",);

        return view('website.users.farmer.insurance.viewinsuranceprovider', compact('about', 'organization', 'cropprojects'));
    }


    // apply insurance
    public function applyinsurance(Request $request, $id)
    {
        // insuranceprovider id
        $insuranceprovider = $id;
        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        // Find selected crop id
        $cropproject_id = $request["crop_project"];

        // Fatch crop project
        $cropproject = DB::selectOne("SELECT *
            FROM cropprojects
            WHERE id = $cropproject_id
        ");

        // total project cost
        $total_project_cost = ($cropproject->labour_cost + $cropproject->pesticide_cost);

        // dd($insuranceprovider);
        // save in database
        $insurance = new insurance();
        $insurance->Organization_id = $insuranceprovider;
        $insurance->farmer_id = $userid;
        $insurance->crop_projectId = $cropproject_id;
        $insurance->claim_amount = $total_project_cost;
        $insurance->crop_amount = $cropproject->corp_quality;
        $insurance->insurance_premium = $total_project_cost * 0.05;
        $insurance->approvel_status = 0;
        $insurance->save();

        return back()->with('success', 'Insurance application submitted successfully!');
    }


    public function claiminsurance($id)
    {
        $insuranceprovider = $id;

        return view('website.users.farmer.insurance.reportCropLoss', compact('insuranceprovider'));
    }

    public function reportcroploss(Request $request, $id)
    {
        // Find the insurance record by ID
        $insurance = insurance::findOrFail($id);

        // Update the insurance record with the new data
        $insurance->reason = $request->input('reason');
        $insurance->disaster_type = $request->input('disaster_type');
        $insurance->loss_amount = $request->input('loss_amount');
        $insurance->minimum_sellamountt = $request->input('minimum_sellamountt');

        // Save the changes to the database
        $insurance->save();

        // dd($request->all());

        return back()->with('success', 'Report crop loss application submitted successfully!');
    }
}
