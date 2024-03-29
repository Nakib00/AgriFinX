<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class insurance_claim_reason extends Model
{
    use HasFactory;
    protected $fillable = [
        'Organization_id', 'insurance_id', 'disaster_type', 'status', 'issue_date'
    ];

    // Define relationships if needed
    public function financialGroup()
    {
        return $this->belongsTo(flnancial_group::class, 'Organization_id');
    }

    public function insurance()
    {
        return $this->belongsTo(insurance::class);
    }
}
