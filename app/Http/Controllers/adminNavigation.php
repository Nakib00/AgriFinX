<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class adminNavigation extends Controller
{
    // index open admin page
    public function index()
    {
        // total project number
        $totalCropProjects = DB::table('cropprojects')->count();
        // total loan applications
        $totalLoans = DB::table('micro_loans')->count();


        // Total invesment by agriginx
        // Sum of investing amount from investing_tracks table
        $investingAmountTracks = DB::table('investing_tracks')->sum('investing_amount');

        // Sum of investing amount from investingorg_tracks table
        $investingAmountOrgTracks = DB::table('investingorg_tracks')->sum('investing_amount');

        // Total investment amount across all tables
        $totalInvestmentAmount = $investingAmountTracks + $investingAmountOrgTracks;

        return view('admin.dashboard', compact('totalCropProjects', 'totalLoans', 'totalInvestmentAmount'));
    }
    //Crop page
    public function crop()
    {
        // Fetch all crops from the database
        $crops = DB::select("SELECT * FROM crops");

        // Pass the crops data to the view
        return view('admin.crop.crop', ['crops' => $crops]);
    }

    // Crop Marcker price
    public function marckerprice()
    {
        // Fetch all crop market prices with their associated crop information
        $cropMarketPrices = DB::select("SELECT crop_marcket_prices.*, crops.name AS crop_name
            FROM crop_marcket_prices
            JOIN crops ON crop_marcket_prices.crop_id = crops.id
        ");


        $crop = DB::select("SELECT * FROM crops");


        return view('admin.crop.cropmarcketprice', ['cropMarketPrices' => $cropMarketPrices], ['crop' => $crop]);
    }

    // farmer show
    public function showfarmer()
    {
        // fatch all farmer
        $farmer = DB::select('SELECT * FROM farmers');

        return view('admin.farmer.farmershow', compact('farmer'));
    }

    // invistor show
    public function showinvistor()
    {
        $investor = DB::select('SELECT * FROM investors');
        return view('admin.invistor.invistorshow', compact('investor'));
    }

    // loanprovider show
    public function showloanprovider()
    {
        // Fetch all loan provider type users from the database
        $loanProviders = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'loan_provider'");


        return view('admin.fin_org.loanprovidershow', compact('loanProviders'));
    }

    // investingorg show
    public function showinvestingorg()
    {
        // Fetch all loan investing type users from the database
        $investingorg = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'investing_organization'");


        return view('admin.fin_org.investingorgshow', compact('investingorg'));
    }

    // insurance show
    public function showinsurance()
    {
        // Fetch all loan insurance type users from the database
        $insurance = DB::select("SELECT * FROM flnancial_groups WHERE Orgnization_type = 'insurance_organization'");


        return view('admin.fin_org.insuranceshow', compact('insurance'));
    }
}
