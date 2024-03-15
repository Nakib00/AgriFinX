<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investor extends Model
{
    use HasFactory;
    protected $fillable = [
        'f_name', 'l_name', 'email', 'nid', 'phone', 'address', 'dateofbirth'
    ];
}
