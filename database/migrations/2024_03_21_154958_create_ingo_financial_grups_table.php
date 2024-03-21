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
        Schema::create('ingo_financial_grups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('Organization_id')->constrained('flnancial_groups');
            $table->longText('about');
            $table->longText('type_of_service');
            $table->longText('team');
            $table->longText('conditions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingo_financial_grups');
    }
};
