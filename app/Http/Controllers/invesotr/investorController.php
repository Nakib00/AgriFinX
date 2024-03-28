<?php

namespace App\Http\Controllers\invesotr;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\investor;
use App\Models\{cropproject};
use App\Models\{ingo_financial_grup, flnancial_group, investing_track, investing_track_Organization};

class investorController extends Controller
{
    //login page and register page show
    public function index()
    {
        return view('website.users.investor.main');
    } //end

    //dashboard
    public function dashboard()
    {
        // login investro id
        $investor_id = Auth::guard('investor')->id();

        // Total crop project investment amount
        $totalCropInvestment = investing_track::where('investor_id', $investor_id)->sum('investing_amount');

        // Total investing organization amount
        $totalOrgInvestment = investing_track_Organization::where('investor_id', $investor_id)->sum('investing_amount');
        

        return view('website.users.investor.deashboad', compact('totalCropInvestment', 'totalOrgInvestment'));
    } //end

    // login
    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('investor')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('investor.dashboard')->with('success', 'Investor login successfully');
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
        $existingOfficer = investor::where('email', $request->email)->first();

        if ($existingOfficer) {
            // Email already exists, return with an error message
            return redirect()->back()->withInput()->with('error', 'Email already exists. Please use a different email address.');
        }

        // Email does not exist, proceed with registration
        investor::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('investor.dashboard')->with('success', 'investor account created successfully.');
    } //end

    //logout
    public function logout()
    {
        Auth::guard('investor')->logout();

        return redirect()->route('login_investor')->with('success', 'investor logout successfully.');
    } //end

    // edit profile
    public function editprofile()
    {
        $user = auth()->guard('investor')->user();
        return view('website.users.investor.editprofile', compact('user'));
    } //end

    //update profile
    public function updateprofile(Request $request)
    {
        $user = auth()->guard('investor')->user();
        $id = $user->id;



        // Find the team by ID
        $agriofficer = investor::findOrFail($id);

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


    // show crop project information
    public function cropproject()
    {
        // show all crop projects
        $cropproject = Cropproject::all();

        // get investor id
        $investor_id = auth()->guard('investor')->user()->id;

        // Fetch the investments made by the logged-in investor
        $investments = investing_track::where('investor_id', $investor_id)->with('project')->get();

        return view('website.users.investor.cropproject.showcropproject', ['cropproject' => $cropproject], ['investments' => $investments]);
    }

    // view project information
    public function projectview($id)
    {
        // Retrieve the crop project based on the provided ID
        $cropproject = Cropproject::findOrFail($id);

        return view('website.users.investor.cropproject.viewporject', ['cropproject' => $cropproject]);
    }

    // Display investing organizations
    public function investingorg()
    {
        // show all projects
        $investingorg = flnancial_group::where('Orgnization_type', 'investing_organization')->get();

        // get investor id
        $investor_id = auth()->guard('investor')->user()->id;

        // Fetch the investments made by the logged-in investor
        $investments = investing_track_Organization::where('investor_id', $investor_id)->with('organization')->get();

        return view('website.users.investor.investingorg.investingorg', ['investingorg' => $investingorg], ['investments' => $investments]);
    }

    // view inveting organizations
    public function investingorgshow($id)
    {
        // Find the organization record by its ID
        $about = ingo_financial_grup::findOrFail($id);

        // Fetch additional information from the flnancial_groups table
        $organization = flnancial_group::findOrFail($about->Organization_id);

        return view('website.users.investor.investingorg.viewinvestingorg', ['about' => $about, 'organization' => $organization]);
    }


    // Invest in crop projects
    public function investcrop(Request $request, $id)
    {

        // get investor id
        $investor_id = auth()->guard('investor')->user()->id;

        // get current crop project id
        $project_id = $id;

        // Get the current date
        $investing_date = now();

        // Create a new instance of InvestingTrack model and store the data
        investing_track::create([
            'investor_id' => $investor_id,
            'project_id' => $project_id,
            'investing_amount' => $request->investing_amount,
            'percentage_rate' => $request->percentage_rate,
            'investing_date' => $investing_date,
        ]);

        // Optionally, you can redirect the user to a specific page after the investment is made
        return redirect()->back()->with('success', 'Investment successful.');
    }

    // Invest in investing organizations
    public function investingorginvest(Request $request, $id)
    {
        // get investor id
        $investor_id = auth()->guard('investor')->user()->id;

        // get current investing org id
        $investingorg_id = $id;

        // Get the current date
        $investing_date = now();

        // Create a new instance of InvestingTrack model and store the data
        investing_track_Organization::create([
            'investor_id' => $investor_id,
            'Organization_id' => $investingorg_id,
            'investing_amount' => $request->investing_amount,
            'percentage_rate' => $request->percentage_rate,
            'investing_date' => $investing_date,
        ]);

        // Optionally, you can redirect the user to a specific page after the investment is made
        return redirect()->back()->with('success', 'Investment successful.');
    }
}
