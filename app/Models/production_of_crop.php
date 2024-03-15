<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class production_of_crop extends Model
{
    use HasFactory;
    protected $fillable = [
        'crop_id', 'project_id', 'production_amount'
    ];

    // Define relationships if needed
    public function crop()
    {
        return $this->belongsTo(crop::class);
    }
    public function project()
    {
        return $this->belongsTo(cropproject::class);
    }
}
