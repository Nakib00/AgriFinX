<?php

namespace App\Livewire\Farmer;

use Livewire\Component;
use App\Models\{farmer, cropproject, micro_loan, insurance};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class Login extends Component
{

    public function showLoginForm()
    {
        return view('farmer.login');
    }
}
