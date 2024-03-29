<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crop_marcket_price extends Model
{
    use HasFactory;
    protected $fillable = [
        'crop_id', 'Current_Price', 'price_date'
    ];

    // Define relationships if needed

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
