<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class insuranceController extends Controller
{
    //incurance view profile
    public function iview(){
        return view('website.insurance.view');
    }//end
}
