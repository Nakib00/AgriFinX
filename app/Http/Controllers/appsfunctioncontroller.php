<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\flnancial_group;

class appsfunctioncontroller extends Controller
{
    //Show loans providers
    public function mindex()
    {
        // Fetch all loan provider type users from the database
        $loanProviders = flnancial_group::where('Orgnization_type', 'loan_provider')->get();
        return view('website.microloan.mindex', compact('loanProviders'));
    }
    // show insurance provider
    public function iindex()
    {
        // Fetch all loan insurance type users from the database
        $insuranceProviders = flnancial_group::where('Orgnization_type', 'insurance_organization')->get();
        return view('website.insurance.iindex', compact('insuranceProviders'));
    }
    // show investing organizations
    public function ivesindex()
    {
        // Fetch all loan investing type users from the database
        $investingorg = flnancial_group::where('Orgnization_type', 'investing_organization')->get();
        return view('website.investinggroup.investindex', compact('investingorg'));
    }
    // shwo agri project
    public function agropindex()
    {

        return view('website.agroproject.agropindex');
    }
}
