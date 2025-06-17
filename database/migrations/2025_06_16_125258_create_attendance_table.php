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
        Schema::create('attendance', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_number')->nullable();
            $table->string('title_of_project')->nullable();
            $table->string('duration_of_project')->nullable();
            $table->string('emp_name')->nullable();
            $table->string('designation')->nullable();
            $table->string('emp_id')->nullable();
            $table->string('hours_spent')->nullable();
            $table->string('days')->nullable();
            $table->string('month')->nullable();
            $table->string('task_performed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendance');
    }
};
