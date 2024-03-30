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
        Schema::create('investingorg_tracks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained('cropprojects');
            $table->foreignId('investingorg_id')->constrained('flnancial_groups');
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
        Schema::dropIfExists('investingorg_tracks');
    }
};
