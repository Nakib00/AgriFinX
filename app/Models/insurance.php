<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insurance extends Model
{
    use HasFactory;
    protected $fillable = [
        'Organization_id', 'farmer_id', 'insurance_premium', 'claim_amount', 'crop_amount', 'approvel_status', 'issue_date',
    ];

    // Define relationships if needed
    public function financialGroup()
    {
        return $this->belongsTo(flnancial_group::class, 'Organization_id');
    }

    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }
}
