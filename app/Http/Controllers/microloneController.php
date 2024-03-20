<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class microloneController extends Controller
{
    //microlone view profile
    public function mview(){

        return view('website.microloan.view');
    }//end
}
