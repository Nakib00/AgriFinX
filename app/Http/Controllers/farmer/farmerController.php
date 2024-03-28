<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\{farmer, cropproject, crop, investing_track, flnancial_group, ingo_financial_grup, micro_loan};

class farmerController extends Controller
{
    //login page and register page show
    public function index()
    {
        return view('website.users.farmer.main');
    } //end

    //dashboard
    public function dashboard()
    {
        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;

        // Find all crop projects associated with the logged-in farmer
        $cropProjects = Cropproject::where('farmer_id', $userId)->get();

        // Extract IDs of crop projects associated with the logged-in farmer
        $cropProjectIds = $cropProjects->pluck('id')->toArray();

        // Find investment details for the extracted crop project IDs
        $investedProjects = investing_track::whereIn('project_id', $cropProjectIds)->get();

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
        $agriofficer = farmer::findOrFail($id);

        // Update user data
        $agriofficer->f_name = $request->input('f_name');
        $agriofficer->l_name = $request->input('l_name');
        $agriofficer->email = $request->input('email');
        $agriofficer->phone = $request->input('phone');
        $agriofficer->address = $request->input('address');
        $agriofficer->dateofbirth = $request->input('dateofbirth');

        // Save the changes to the user object
        $agriofficer->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } //end



    // Crop project section

    // show crop project
    public function cropproject()
    {
        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;

        // Retrieve all crop projects created by the logged-in farmer
        $cropprojects = Cropproject::where('farmer_id', $userId)->get();

        return view('website.users.farmer.croppeoject', ['cropprojects' => $cropprojects]);
    }

    // add crop project
    public function addproject()
    {
        $crop = Crop::all();
        return view('website.users.farmer.addcropproject', ['crop' => $crop]);
    }
    // stroe project
    public function storeproject(Request $request)
    {
        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        // Create a new crop project instance
        $cropproject = new Cropproject();
        $cropproject->farmer_id =  $userid;
        $cropproject->project_name = $request['project_name'];
        $cropproject->description = $request['description'];
        $cropproject->crop_id = $request['corp_id'];
        $cropproject->launch_date = $request['launch_date'];
        $cropproject->end_date = $request['end_date'];
        $cropproject->farm_size = $request['farm_size'];
        $cropproject->corp_quality = $request['corp_quality'];
        $cropproject->pesticide_cost = $request['pesticide_cost'];
        $cropproject->labour_cost = $request['labour_cost'];
        $cropproject->funding_status = $request['funding_status'];

        // Save the crop project
        $cropproject->save();

        // Redirect the user back or to any specific route after successful submission
        return redirect()->back()->with('success', 'Crop project created successfully.');
    }

    // Show crop projectq
    public function showproject($id)
    {
        // Retrieve the crop project based on the provided ID
        $cropproject = Cropproject::findOrFail($id);

        // Pass the crop project data to the view
        return view('website.users.farmer.showcropproject', ['cropproject' => $cropproject]);
    }

    // Open edit crop project page
    public function editproject($id)
    {
        // Retrieve the crop project based on the provided ID
        $cropproject = Cropproject::findOrFail($id);

        $crop = Crop::all();

        // Pass the crop project data to the view
        return view('website.users.farmer.editcropproject', ['cropproject' => $cropproject], ['crop' => $crop]);
    }

    // Update crop project page
    public function updateproject($id, Request $request)
    {
        // Find the crop project by ID
        $cropproject = Cropproject::findOrFail($id);

        // Update the crop project instance
        $cropproject->project_name = $request['project_name'];
        $cropproject->description = $request['description'];
        $cropproject->crop_id = $request['crop_id'];
        $cropproject->launch_date = $request['launch_date'];
        $cropproject->end_date = $request['end_date'];
        $cropproject->farm_size = $request['farm_size'];
        $cropproject->corp_quality = $request['corp_quality'];
        $cropproject->pesticide_cost = $request['pesticide_cost'];
        $cropproject->labour_cost = $request['labour_cost'];
        $cropproject->funding_status = $request['funding_status'];

        // Save the updated crop project
        $cropproject->save();

        // Redirect the user back or to any specific route after successful update
        return redirect()->back()->with('success', 'Crop project updated successfully.');
    }

    // Delete the crop project
    public function deleteproject($id)
    {
        // Find the crop project by its ID
        $cropproject = Cropproject::find($id);

        // Check if the crop project exists
        if (!$cropproject) {
            // If the crop project does not exist, return a redirect with an error message
            return redirect()->back()->with('error', 'Crop project not found.');
        }

        // Delete the crop project
        $cropproject->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Crop project deleted successfully.');
    }


    // Microloan
    public function showloanprovider()
    {
        // Fetch all loan provider type users from the database
        $loanProviders = flnancial_group::where('Orgnization_type', 'loan_provider')->get();

        return view('website.users.farmer.loan.loanprovider', compact('loanProviders'));
    }
    // shwo loan provider profile
    public function viewloanprovider($id)
    {
        // Find the organization record by its ID
        $about = ingo_financial_grup::findOrFail($id);

        // Fetch additional information from the flnancial_groups table
        $organization = flnancial_group::findOrFail($about->Organization_id);

        return view('website.users.farmer.loan.viewloanprovider', ['about' => $about, 'organization' => $organization]);
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
}
