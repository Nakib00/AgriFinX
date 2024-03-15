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
        Schema::create('investing_track__organizations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Organization_id')->constrained('flnancial_groups');
            $table->foreignId('investor_id')->constrained('investors');
            $table->string('investing_amount');
            $table->date('investing_date');
            $table->string('percentage_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('investing_track__organizations');
    }
};
