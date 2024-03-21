<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\flnancial_group;

class appsfunctioncontroller extends Controller
{
    //
    public function mindex()
    {
        // Fetch all loan provider type users from the database
        $loanProviders = flnancial_group::where('Orgnization_type', 'loan_provider')->get();
        return view('website.microloan.mindex', compact('loanProviders'));
    }

    public function iindex()
    {

        return view('website.insurance.iindex');
    }

    public function agropindex()
    {

        return view('website.agroproject.agropindex');
    }
}
