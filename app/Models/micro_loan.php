<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class micro_loan extends Model
{
    use HasFactory;
    protected $fillable = [
        'Organization_id', 'farmer_id', 'reason_of_taking_loan', 'amount', 'interest_rate', 'installment_period', 'approval_status', 'loan_issue_date', 'debt_repayment_date'
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
