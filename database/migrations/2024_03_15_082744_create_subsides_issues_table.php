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
        Schema::create('subsides_issues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subsides_id')->constrained('subsidies');
            $table->foreignId('agri_officer_id')->constrained('agricultural_officers');
            $table->date('issue_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subsides_issues');
    }
};
