<?php

namespace App\Http\Controllers\farmer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use App\Models\{farmer, cropproject, micro_loan, insurance};
use Illuminate\Support\Facades\DB;

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
        // Find the ID of the logged-in farmer
        $userId = auth()->guard('farmer')->user()->id;

        // Retrieve all crop projects created by the logged-in farmer
        $cropprojects = DB::select("SELECT * FROM cropprojects
            WHERE farmer_id = $userId
        ",);

        return view('website.users.farmer.croppeoject', ['cropprojects' => $cropprojects]);
    }

    // add crop project
    public function addproject()
    {
        $crop = DB::select("SELECT * FROM crops");
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
        $cropproject->funding_status = '0';

        // Save the crop project
        $cropproject->save();

        // Redirect the user back or to any specific route after successful submission
        return redirect()->back()->with('success', 'Crop project created successfully.');
    }

    // Show crop projectq
    public function showproject($id)
    {
        // Retrieve the crop project based on the provided ID
        $cropproject = DB::selectOne("SELECT cp.*, c.*
            FROM cropprojects cp
            INNER JOIN crops c ON cp.crop_id = c.id
            WHERE cp.id = $id
        ");

        // Convert dates to month and day format using Carbon
        $cropproject->cropStartMonthDay = Carbon::parse($cropproject->cultavation_start)->format('m-d');
        $cropproject->cropEndMonthDay = Carbon::parse($cropproject->cultavation_end)->format('m-d');
        $cropproject->launchMonthDay = Carbon::parse($cropproject->launch_date)->format('m-d');
        $cropproject->endMonthDay = Carbon::parse($cropproject->end_date)->format('m-d');

        // Pass the crop project data to the view
        // dd($cropproject);
        return view('website.users.farmer.showcropproject', compact('cropproject'));
    }

    // Open edit crop project page
    public function editproject($id)
    {
        // Retrieve the crop project based on the provided ID
        $cropproject = Cropproject::findOrFail($id);

        $crop = DB::select("SELECT * FROM crops");;

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

        // Save the updated crop project
        $cropproject->save();

        // Redirect the user back or to any specific route after successful update
        return redirect()->back()->with('success', 'Crop project updated successfully.');
    }

    // update sell information
    public function updatesell($id, Request $request)
    {
        // Find the crop project by ID
        $cropproject = Cropproject::findOrFail($id);

        $cropproject->sells = $request['sell'];
        $cropproject->save();

        // Redirect the user back or to any specific route after successful update
        return redirect()->back()->with('success', 'Crop project sell updated successfully.');
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
        // Find the organization record by its ID
        $about = DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // Fetch additional information from the flnancial_groups table
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

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

        return view('website.users.farmer.insurance.insuranceprovider', compact('Insuranceroviders','insuApplications'));
    }

    // shwo insurance provider profile
    public function viewinsuranceprovider($id)
    {
        // Find the organization record by its ID
        $about =  DB::select("SELECT * FROM ingo_financial_grups WHERE Organization_id = $id");

        // Fetch additional information from the flnancial_groups table
        $organization = DB::select("SELECT * FROM flnancial_groups WHERE id = $id");

        return view('website.users.farmer.insurance.viewinsuranceprovider', ['about' => $about, 'organization' => $organization]);
    }



    // apply insurance
    public function applyinsurance(Request $request, $id)
    {
        //dd($request->all());
        // insuranceprovider id
        $insuranceprovider = $id;
        // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;

        $insurance = new insurance();
        $insurance->Organization_id =  $insuranceprovider;
        $insurance->farmer_id =  $userid;
        $insurance->claim_amount = $request["claim_amount"];
        $insurance->crop_amount = $request["crop_amount"];
        $insurance->insurance_premium = $request->input('claim_amount') * 0.02;
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
         //dd($request->all());
        // insuranceprovider id
        $insuranceprovider = $id;
    //     // find out login farmer id
        $userid = auth()->guard('farmer')->user()->id;
        $latestCropProject = CropProject::where('farmer_id', $userid)->latest()->first();

        $cropid = $latestCropProject->id;


         $insurance = new insurance();
         $insurance->Organization_id =  $insuranceprovider;
         $insurance->farmer_id =  $userid;
         $insurance->crop_projectId =  $cropid;
        $insurance->disaster_type = $request["disaster_type"];
        $insurance->minimum_sellamountt = $request["minimum_sellamountt"];
        //$insurance->crop_amount = $request["crop_amount"];
        $insurance->approvel_status = 0;
         $insurance->save();

        return back()->with('success', 'Report crop loss application submitted successfully!');
     }
}
