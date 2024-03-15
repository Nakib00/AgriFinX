<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investing_track extends Model
{
    use HasFactory;
    protected $fillable = [
        'investor_id', 'project_id', 'investing_amount','investing_date','percentage_rate'
    ];

    // Define relationships if needed
    public function investor()
    {
        return $this->belongsTo(investor::class);
    }
    public function project()
    {
        return $this->belongsTo(cropproject::class);
    }
}
