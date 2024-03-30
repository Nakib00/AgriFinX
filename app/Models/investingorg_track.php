<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investingorg_track extends Model
{
    use HasFactory;
    protected $fillable = [
        'investingorg_id', 'project_id', 'investing_amount', 'investing_date', 'percentage_rate'
    ];

    // Define relationships if needed
    public function investororg()
    {
        return $this->belongsTo(flnancial_group::class);
    }
    public function project()
    {
        return $this->belongsTo(Cropproject::class, 'project_id');
    }
}
