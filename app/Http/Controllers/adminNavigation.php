<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\{Crop, crop_marcket_price, farmer, investor};

class adminNavigation extends Controller
{
    //Crop page
    public function crop()
    {

        // Fetch all crops from the database
        $crops = Crop::all();

        // Pass the crops data to the view
        return view('admin.crop.crop', ['crops' => $crops]);
    }

    // Crop Marcker price
    public function marckerprice()
    {
        // Fetch all crop market prices with their associated crop information
        $cropMarketPrices = crop_marcket_price::with('crop')->get();
        $crop = Crop::all();

        return view('admin.crop.cropmarcketprice', ['cropMarketPrices' => $cropMarketPrices], ['crop' => $crop]);
    }

    // farmer show
    public function showfarmer()
    {

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
        return view('admin.fin_org.loanprovidershow');
    }

    // investingorg show
    public function showinvestingorg()
    {
        return view('admin.fin_org.investingorgshow');
    }

    // insurance show
    public function showinsurance()
    {
        return view('admin.fin_org.insuranceshow');
    }
}
