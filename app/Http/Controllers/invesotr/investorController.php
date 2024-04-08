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
use App\Models\{investing_track, investing_track_Organization};
use Illuminate\Support\Facades\DB;

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
        $totalCropInvestment = DB::select("SELECT SUM(investing_amount) AS total_amount
            FROM investing_tracks
            WHERE investor_id = $investor_id"
        );

        // Total investing organization amount
        $totalOrgInvestment = DB::select("SELECT SUM(investing_amount) AS total_amount
            FROM investing_track__organizations
            WHERE investor_id = $investor_id;
        ");
;
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
        $cropproject = DB::select("SELECT *
            FROM cropprojects
        ");

        // get investor id
        $investor_id = auth()->guard('investor')->user()->id;

        // Fetch the investments made by the logged-in investor
        $investments = DB::select("SELECT cp.project_name, it.      investing_amount, it.investing_date, it.percentage_rate
            FROM investing_tracks it
            INNER JOIN cropprojects cp ON it.project_id = cp.id
            WHERE it.investor_id = $investor_id
        ");

        return view('website.users.investor.cropproject.showcropproject', compact('cropproject','investments'));
    }

    // view project information
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
        return view('website.users.investor.cropproject.viewporject', ['cropproject' => $cropproject]);
    }

    // Display investing organizations
    public function investingorg()
    {
        // show all investing org
        $investingorg = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'investing_organization'");

        // get investor id
        $investor_id = auth()->guard('investor')->user()->id;

        // Fetch the investments made by the logged-in investor
        $investments = DB::select("SELECT ito.*, CONCAT(fg.f_name, ' ', fg.l_name) AS organization_name
            FROM investing_track__organizations ito
            INNER JOIN flnancial_groups fg ON ito.Organization_id = fg.id
            WHERE ito.investor_id = $investor_id;
        ");

        return view('website.users.investor.investingorg.investingorg', compact('investingorg','investments'));
    }

    // view inveting organizations
    public function investingorgshow($id)
    {
        // Find the organization record by its ID
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        // Fetch additional information from the flnancial_groups table
        $about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

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

        // Change funding status
        $cropproject = Cropproject::findOrFail($project_id);
        $cropproject->funding_status = '1';
        $cropproject->save();

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
