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
        Schema::create('subsidies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained('farmers')->null();
            $table->foreignId('agri_officer_id')->constrained('agricultural_officers')->null();
            $table->longText('reason_of_taking_subsidies');
            $table->string('farm_size');
            $table->string('amount');
            $table->boolean('approvel_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsidies');
    }
};
