<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsidies extends Model
{
    use HasFactory;
    protected $fillable = [
        'farmer_id', 'agri_officer_id',  'reason_of_taking_subsidies', 'amount', 'farm_size', 'approvel_status'
    ];

    // Define relationships if needed
    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
    public function agri_officer()
    {
        return $this->belongsTo(agricultural_officer::class, 'agri_officer_id');
    }
}
