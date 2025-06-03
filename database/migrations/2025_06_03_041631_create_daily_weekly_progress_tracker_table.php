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
        Schema::create('daily_weekly_progress_tracker', function (Blueprint $table) {
            $table->id();
            $table->string('date')->nullable();
            $table->string('location')->nullable();
            $table->string('activity')->nullable();
            $table->string('shg_covered')->nullable();
            $table->string('member_enrolled')->nullable();
            $table->string('schemes_facilitated')->nullable();
            $table->string('legal_docs_processed')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_weekly_progress_tracker');
    }
};
