<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\crop_marcket_price;

class crop extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'cultavation_start', 'cultavation_end','Current_Price','price_date'
    ];
}
