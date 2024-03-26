<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\{farmer, cropproject, crop};

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
        return view('website.users.farmer.deashboad');
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

        return redirect()->route('farmer.dashboard')->with('success', 'farmer account created successfully.');
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
        return view('website.users.farmer.croppeoject');
    }

    // add crop project
    public function addproject()
    {
        $crop = Crop::all();
        return view('website.users.farmer.addcropproject', ['crop' => $crop]);
    }

    // Store crop project
    public function storeproject(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'project_name' => 'required|string',
            'description' => 'required|string',
            'crop_id' => 'required|exists:crops,id',
            'launch_date' => 'required|date',
            'end_date' => 'required|date|after:launch_date',
            'farm_size' => 'required|string',
            'corp_quality' => 'required|string',
            'pesticide_cost' => 'required|numeric',
            'labour_cost' => 'required|numeric',
            'funding_status' => 'required|in:Funded,Not Funded',
        ]);

        // Map the funding status to 1 for Funded and 0 for Not Funded
        $fundingStatus = $validatedData['funding_status'] === 'Funded' ? 1 : 0;

        // Create a new crop project instance
        $cropproject = new Cropproject();
        $cropproject->farmer_id = auth()->user()->id;
        $cropproject->project_name = $validatedData['project_name'];
        $cropproject->description = $validatedData['description'];
        $cropproject->crop_id = $validatedData['crop_id'];
        $cropproject->launch_date = $validatedData['launch_date'];
        $cropproject->end_date = $validatedData['end_date'];
        $cropproject->farm_size = $validatedData['farm_size'];
        $cropproject->corp_quality = $validatedData['corp_quality'];
        $cropproject->pesticide_cost = $validatedData['pesticide_cost'];
        $cropproject->labour_cost = $validatedData['labour_cost'];
        $cropproject->funding_status = $fundingStatus; 

        // Save the crop project
        $cropproject->save();

        // Redirect the user back or to any specific route after successful submission
        return redirect()->back()->with('success', 'Crop project created successfully.');
    }
}
