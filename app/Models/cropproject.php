<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cropproject extends Model
{
    use HasFactory;
    protected $fillable = [
        'farmer_id',
        'project_name',
        'description',
        'crop_id',
        'launch_date',
        'end_date',
        'farm_size',
        'corp_quality',
        'pesticide_cost',
        'labour_cost',
        'funding_status',
    ];

    // Define relationships if needed
    public function farmer()
    {
        return $this->belongsTo(Farmer::class);
    }

    public function crop()
    {
        return $this->belongsTo(Crop::class);
    }
}
