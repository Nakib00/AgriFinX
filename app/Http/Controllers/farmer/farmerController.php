<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\farmer;

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
         $user = auth()->guard('investors')->user();
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

    // try
    public function button()
    {
        return view('website.users.farmer.button');
    }
}
