<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class appsfunctioncontroller extends Controller
{
    //
    public function mindex(){

        return view('website.microloan.mindex');
    }

    public function iindex(){

        return view('website.insurance.iindex');
    }

    public function agropindex(){

        return view('website.agroproject.agropindex');
    }

    public function sindex(){

        return view('website.subsides.sindex');
    }
}
