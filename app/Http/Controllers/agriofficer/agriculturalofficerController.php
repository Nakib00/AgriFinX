<?php

namespace App\Http\Controllers\agriofficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\{agricultural_officer, subsidies};


class agriculturalofficerController extends Controller
{
    //login page and register page show
    public function index()
    {
        return view('website.users.agri_officer.main');
    } //end

    //dashboard
    public function dashboard()
    {

        // login agri officer id
        $agriofficer_id = Auth::guard('agricultural_officer')->id();
        
        // Fetch subsidy applications
        $subsides = DB::select("SELECT s.*, CONCAT(f.f_name, ' ', f.l_name) AS farmer_name
            FROM subsidies s
            INNER JOIN farmers f ON s.farmer_id = f.id
            WHERE s.agri_officer_id = $agriofficer_id"
        );

        return view('website.users.agri_officer.deashboad', compact('subsides'));
    } //end

    // login
    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('agricultural_officer')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('agri_officer.dashboard')->with('success', 'Agri officer login successfully');
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
        $existingOfficer = agricultural_officer::where('email', $request->email)->first();

        if ($existingOfficer) {
            // Email already exists, return with an error message
            return redirect()->back()->withInput()->with('error', 'Email already exists. Please use a different email address.');
        }

        // Email does not exist, proceed with registration
        agricultural_officer::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('agri_officer.dashboard')->with('success', 'Agri officer account created successfully.');
    } //end

    //logout
    public function logout()
    {
        Auth::guard('agricultural_officer')->logout();

        return redirect()->route('login_agri_officer')->with('success', 'Agri officer logout successfully.');
    } //end

    // edit profile
    public function editprofile()
    {
        $user = auth()->guard('agricultural_officer')->user();
        return view('website.users.agri_officer.editprofile', compact('user'));
    } //end

    //update profile
    public function updateprofile(Request $request)
    {
        $user = auth()->guard('agricultural_officer')->user();
        $id = $user->id;

        // Find the team by ID
        $agriofficer = agricultural_officer::findOrFail($id);

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

}
