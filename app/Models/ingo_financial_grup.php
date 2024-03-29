<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ingo_financial_grup extends Model
{
    use HasFactory;
    protected $fillable = [
        'Organization_id', 'about', 'type_of_service', 'team', 'conditions'
    ];

    public function organization()
    {
        return $this->belongsTo(flnancial_group::class, 'flnancial_group_id');
    }
}
