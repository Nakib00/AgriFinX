<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class flnancial_group extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name', 'l_name', 'email', 'phone', 'address', 'Orgnization_type'
    ];
}
