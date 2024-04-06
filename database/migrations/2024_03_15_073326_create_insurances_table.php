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
            $table->foreignId('crop_projectId')->constrained('cropprojects');
            $table->string('insurance_premium')->nullable();
            $table->string('minimum_sellamount');
            $table->string('disaster_type')->nullable();
            $table->string('reason')->nullable();
            $table->string('claim_amount')->nullable();
            $table->string('loss_amount')->nullable();
            $table->boolean('approvel_status');
            $table->date('issue_date')->nullable();
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
