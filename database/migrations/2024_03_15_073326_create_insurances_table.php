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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Organization_id')->constrained('flnancial_groups');
            $table->foreignId('farmer_id')->constrained('farmers');
            $table->string('insurance_premium');
            $table->string('claim_amount');
            $table->string('crop_amount');
            $table->boolean('approvel_status');
            $table->date('issue_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insurances');
    }
};
