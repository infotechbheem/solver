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
        Schema::create('deliverables', function (Blueprint $table) {
            $table->id();
            $table->string('program')->nullable();
            $table->string('project_name')->nullable();
            $table->string('donar_name')->nullable();
            $table->string('project_title')->nullable();
            $table->string('project_duration_from')->nullable();
            $table->string('project_duration_to')->nullable();
            $table->string('project_location')->nullable();
            $table->string('no_of_month')->nullable();
            $table->string('month')->nullable();
            $table->string('particular')->nullable();
            $table->string('target')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliverables');
    }
};
