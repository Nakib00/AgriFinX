<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investing_track_Organization extends Model
{
    use HasFactory;
    protected $fillable = [
        'investor_id', 'Organization_id', 'investing_amount', 'investing_date', 'percentage_rate'
    ];

    // Define relationships if needed
    public function investor()
    {
        return $this->belongsTo(investor::class);
    }
    
    public function organization()
    {
        return $this->belongsTo(flnancial_group::class, 'Organization_id');
    }
}
