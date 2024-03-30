<?php

namespace App\Http\Controllers\agri_org;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\{flnancial_group, ingo_financial_grup};

class orgcontroller extends Controller
{
    //login page and register page show
    public function index()
    {
        return view('website.users.agri_org.main');
    } //end

    //Register
    public function register(Request $request)
    {
        // Validation rules
        $validator = Validator::make($request->all(), [
            'f_name' => 'required',
            'l_name' => 'required',
            'email' => 'required|email|unique:flnancial_groups,email',
            'password' => 'required|min:8',
            'Orgnization_type' => 'required|in:loan_provider,investing_organization,insurance_organization',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            $errorMessage = implode('<br>', $errors);
            return redirect()->back()->withInput()->with('error', $errorMessage);
        }

        // Check if the email already exists
        $existingOfficer = flnancial_group::where('email', $request->email)->first();

        if ($existingOfficer) {
            // Email already exists, return with an error message
            return redirect()->back()->withInput()->with('error', 'Email already exists. Please use a different email address.');
        }

        // Email does not exist, proceed with registration
        flnancial_group::create([
            'f_name' => $request->f_name,
            'l_name' => $request->l_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'Orgnization_type' => $request->Orgnization_type,
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_org')->with('success', 'Financial org account created successfully.');
    } //end

    public function login(Request $request)
    {
        $check = $request->all();
        $org_type = $request->Orgnization_type;

        if (Auth::guard('flnancial_group')->attempt(['email' => $check['email'], 'password' => $check['password'], 'orgnization_type' => $check['Orgnization_type']])) {
            // open dashboard by user type
            if ($org_type == 'loan_provider') {
                return view('website.users.agri_org.loan_provider.deashboad')->with('success', 'Loan provider login successfully');
            } elseif ($org_type == 'investing_organization') {
                return view('website.users.agri_org.investing_org.deashboad')->with('success', 'Investing organization login successfully');
            } elseif ($org_type == 'insurance_organization') {
                return view('website.users.agri_org.insurance_org.deashboad')->with('success', 'Instrance organization login successfully');
            } else {
                return back()->with('error', 'Invalid user type');
            }
        } else {
            return back()->with('error', 'Invalid password, email and user type');
        }
    } //end

    //logout
    public function logout()
    {
        Auth::guard('flnancial_group')->logout();

        return redirect()->route('login_org')->with('success', 'Financial org logout successfully.');
    } //end



    // Edit Loan provider Information
    // edit profile
    public function editprofileloanprovider()
    {
        $user = auth()->guard('flnancial_group')->user();
        return view('website.users.agri_org.loan_provider.about.editprofile', compact('user'));
    } //end

    //update profile
    public function updateprofileloanprovider(Request $request)
    {
        $user = auth()->guard('flnancial_group')->user();
        $id = $user->id;

        // Validate input
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:agricultural_officers,email,',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Find the team by ID
        $agriorg = flnancial_group::findOrFail($id);

        // Update user data
        $agriorg->f_name = $request->input('f_name');
        $agriorg->l_name = $request->input('l_name');
        $agriorg->email = $request->input('email');
        $agriorg->phone = $request->input('phone');
        $agriorg->address = $request->input('address');

        // Save the changes to the user object
        $agriorg->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } //end


    // about button
    public function aboutloanprovider($id)
    {
        // Fetch the ingo_financial_grup record associated with the specified user id
        $user = flnancial_group::findOrFail($id);
        $about = $user->ingoFinancialGrup()->first();
        return view('website.users.agri_org.loan_provider.about.about', ['about' => $about]);
    } //end


    // About section

    // Display the form to add new information
    public function addAboutloanprovider()
    {
        return view('website.users.agri_org.loan_provider.about.addabout');
    }

    // Store the new information
    public function storeAboutloanprovider(Request $request)
    {
        // Validate input
        $request->validate([
            'about' => 'required|string',
            'loan_types' => 'required|string',
            'team' => 'required|string',
            'conditions' => 'nullable|string',
        ]);

        // Get the ID of the currently authenticated user
        $organization_id = Auth::guard('flnancial_group')->id();

        // Create a new organization record with the provided data and the user's ID
        ingo_financial_grup::create([
            'about' => $request->input('about'),
            'type_of_service' => $request->input('loan_types'),
            'team' => $request->input('team'),
            'conditions' => $request->input('conditions'),
            'Organization_id' => $organization_id,
        ]);

        // Redirect back or to a specific route after storing the data
        return redirect()->back()->with('success', 'About details added successfully.');
    }

    // Edit about
    public function editAboutloanprovider()
    {
        // Get the ID of the currently authenticated user
        $userId = Auth::guard('flnancial_group')->id();

        // Find the organization record associated with the authenticated user
        $organization = ingo_financial_grup::where('Organization_id', $userId)->firstOrFail();
        return view('website.users.agri_org.loan_provider.about.updateabout', ['organization' => $organization]);
    }

    // about Edit about
    public function updateAboutloanprovider(Request $request, string $id)
    {
        // Find the organization record by its ID
        $organization = ingo_financial_grup::findOrFail($id);

        // Validate input
        $request->validate([
            'about' => 'required|string',
            'loan_types' => 'required|string',
            'team' => 'required|string',
            'conditions' => 'required|string',
        ]);

        // Update the organization data
        $organization->update([
            'about' => $request->input('about'),
            'type_of_service' => $request->input('loan_types'),
            'team' => $request->input('team'),
            'conditions' => $request->input('conditions'),
        ]);

        // Redirect back or to a specific route after updating the data
        return redirect()->back()->with('success', 'Data updated successfully.');
    }



    // Edit Investing Information
    // edit profile
    public function editprofileinvesting()
    {
        $user = auth()->guard('flnancial_group')->user();
        return view('website.users.agri_org.investing_org.about.editprofile', compact('user'));
    } //end

    //update profile
    public function updateprofileinvesting(Request $request)
    {
        $user = auth()->guard('flnancial_group')->user();
        $id = $user->id;

        // Validate input
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:agricultural_officers,email,',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Find the team by ID
        $agriorg = flnancial_group::findOrFail($id);

        // Update user data
        $agriorg->f_name = $request->input('f_name');
        $agriorg->l_name = $request->input('l_name');
        $agriorg->email = $request->input('email');
        $agriorg->phone = $request->input('phone');
        $agriorg->address = $request->input('address');

        // Save the changes to the user object
        $agriorg->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } //end


    // about button
    public function aboutinvesting($id)
    {
        // Fetch the ingo_financial_grup record associated with the specified user id
        $user = flnancial_group::findOrFail($id);
        $about = $user->ingoFinancialGrup()->first();
        return view('website.users.agri_org.investing_org.about.about', ['about' => $about]);
    } //end


    // About section

    // Display the form to add new information
    public function addAboutinvesting()
    {
        return view('website.users.agri_org.investing_org.about.addabout');
    }

    // Store the new information
    public function storeAboutinvesting(Request $request)
    {
        // Validate input
        $request->validate([
            'about' => 'required|string',
            'loan_types' => 'required|string',
            'team' => 'required|string',
            'conditions' => 'nullable|string',
        ]);

        // Get the ID of the currently authenticated user
        $organization_id = Auth::guard('flnancial_group')->id();

        // Create a new organization record with the provided data and the user's ID
        ingo_financial_grup::create([
            'about' => $request->input('about'),
            'type_of_service' => $request->input('loan_types'),
            'team' => $request->input('team'),
            'conditions' => $request->input('conditions'),
            'Organization_id' => $organization_id,
        ]);

        // Redirect back or to a specific route after storing the data
        return redirect()->back()->with('success', 'About details added successfully.');
    }

    // Edit about
    public function editaboutinvesting()
    {
        // Get the ID of the currently authenticated user
        $userId = Auth::guard('flnancial_group')->id();

        // Find the organization record associated with the authenticated user
        $organization = ingo_financial_grup::where('Organization_id', $userId)->firstOrFail();
        return view('website.users.agri_org.investing_org.about.updateabout', ['organization' => $organization]);
    }

    // about Edit about
    public function updateAboutinvesting(Request $request, string $id)
    {
        // Find the organization record by its ID
        $organization = ingo_financial_grup::findOrFail($id);

        // Validate input
        $request->validate([
            'about' => 'required|string',
            'loan_types' => 'required|string',
            'team' => 'required|string',
            'conditions' => 'required|string',
        ]);

        // Update the organization data
        $organization->update([
            'about' => $request->input('about'),
            'type_of_service' => $request->input('loan_types'),
            'team' => $request->input('team'),
            'conditions' => $request->input('conditions'),
        ]);

        // Redirect back or to a specific route after updating the data
        return redirect()->back()->with('success', 'Data updated successfully.');
    }


    // Edit Insurance Information
    // edit profile
    public function editprofileinsurance()
    {
        $user = auth()->guard('flnancial_group')->user();
        return view('website.users.agri_org.insurance_org.about.editprofile', compact('user'));
    } //end

    //update profile
    public function updateprofileinsurance(Request $request)
    {
        $user = auth()->guard('flnancial_group')->user();
        $id = $user->id;

        // Validate input
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:agricultural_officers,email,',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
        ]);

        // Find the team by ID
        $agriorg = flnancial_group::findOrFail($id);

        // Update user data
        $agriorg->f_name = $request->input('f_name');
        $agriorg->l_name = $request->input('l_name');
        $agriorg->email = $request->input('email');
        $agriorg->phone = $request->input('phone');
        $agriorg->address = $request->input('address');

        // Save the changes to the user object
        $agriorg->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    } //end


    // about button
    public function aboutinsurance($id)
    {
        // Fetch the ingo_financial_grup record associated with the specified user id
        $user = flnancial_group::findOrFail($id);
        $about = $user->ingoFinancialGrup()->first();
        return view('website.users.agri_org.insurance_org.about.about', ['about' => $about]);
    } //end


    // About section

    // Display the form to add new information
    public function addAboutinsurance()
    {
        return view('website.users.agri_org.insurance_org.about.addabout');
    }

    // Store the new information
    public function storeAboutinsurance(Request $request)
    {
        // Validate input
        $request->validate([
            'about' => 'required|string',
            'loan_types' => 'required|string',
            'team' => 'required|string',
            'conditions' => 'nullable|string',
        ]);

        // Get the ID of the currently authenticated user
        $organization_id = Auth::guard('flnancial_group')->id();

        // Create a new organization record with the provided data and the user's ID
        ingo_financial_grup::create([
            'about' => $request->input('about'),
            'type_of_service' => $request->input('loan_types'),
            'team' => $request->input('team'),
            'conditions' => $request->input('conditions'),
            'Organization_id' => $organization_id,
        ]);

        // Redirect back or to a specific route after storing the data
        return redirect()->back()->with('success', 'About details added successfully.');
    }

    // Edit about
    public function editAboutinsurance()
    {
        // Get the ID of the currently authenticated user
        $userId = Auth::guard('flnancial_group')->id();

        // Find the organization record associated with the authenticated user
        $organization = ingo_financial_grup::where('Organization_id', $userId)->firstOrFail();
        return view('website.users.agri_org.insurance_org.about.updateabout', ['organization' => $organization]);
    }

    // about Edit about
    public function updateAboutinsurance(Request $request, string $id)
    {
        // Find the organization record by its ID
        $organization = ingo_financial_grup::findOrFail($id);

        // Validate input
        $request->validate([
            'about' => 'required|string',
            'loan_types' => 'required|string',
            'team' => 'required|string',
            'conditions' => 'required|string',
        ]);

        // Update the organization data
        $organization->update([
            'about' => $request->input('about'),
            'type_of_service' => $request->input('loan_types'),
            'team' => $request->input('team'),
            'conditions' => $request->input('conditions'),
        ]);

        // Redirect back or to a specific route after updating the data
        return redirect()->back()->with('success', 'Data updated successfully.');
    }
}
