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
        Schema::create('cropprojects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farmer_id')->constrained('farmers');
            $table->string('project_name');
            $table->longText('description');
            $table->foreignId('crop_id')->constrained('crops');;
            $table->date('launch_date');
            $table->date('end_date');
            $table->string('farm_size');
            $table->string('corp_quality');
            $table->string('pesticide_cost');
            $table->string('labour_cost');
            $table->boolean('funding_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cropprojects');
    }
};
