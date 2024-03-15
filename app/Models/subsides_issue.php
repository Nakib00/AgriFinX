<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subsides_issue extends Model
{
    use HasFactory;
    protected $fillable = [
        'subsides_id', 'agri_officer_id', 'issue_date'
    ];

    // Define relationships if needed
    public function subsides()
    {
        return $this->belongsTo(subsidies::class);
    }

    public function agri_officer()
    {
        return $this->belongsTo(agricultural_officer::class);
    }
}
