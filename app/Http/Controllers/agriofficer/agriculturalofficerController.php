<?php

namespace App\Http\Controllers\agriofficer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

use App\Models\agricultural_officer;


class agriculturalofficerController extends Controller
{
    //login page and register page show
    public function index()
    {
        return view('website.users.agri_officer.main');
    }
    //dashboard
    public function dashboard()
    {

        return view('website.users.agri_officer.deashboad');
    }
    // login
    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('agricultural_officer')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('agri_officer.dashboard')->with('success', 'Agri officer login successfully');
        } else {
            return back()->with('error', 'Invalid password and email');
        }
    }

    //Register
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:agricultural_officers,email',
            'password' => 'required|min:8|confirmed',
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
    }

    //logout
    public function logout()
    {
        Auth::guard('agricultural_officer')->logout();

        return redirect()->route('login_agri_officer')->with('success', 'Agri officer logout successfully.');
    }
}
