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
        Schema::create('insurance_claim_reasons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('insurance_id')->constrained('insurances');
            $table->foreignId('Organization_id')->constrained('flnancial_groups');
            $table->string('disaster_type');
            $table->boolean('status');
            $table->date('issue_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurance_claim_reasons');
    }
};
