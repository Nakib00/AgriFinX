<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('micro_loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Organization_id')->constrained('flnancial_groups');
            $table->foreignId('farmer_id')->constrained('farmers');
            $table->longText('reason_of_taking_loan');
            $table->string('amount');
            $table->string('interest_rate');
            $table->string('installment_period');
            $table->boolean('approval_status');
            $table->date('loan_issue_date')->nullable();
            $table->date('debt_repayment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('micro_loans');
    }
};
