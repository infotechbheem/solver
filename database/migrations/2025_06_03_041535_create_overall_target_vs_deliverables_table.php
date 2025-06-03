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
        Schema::create('overall_target_vs_deliverables', function (Blueprint $table) {
            $table->id();
            $table->string('key_indicator')->nullable();
            $table->string('target')->nullable();
            $table->string('achieved')->nullable();
            $table->string('completion')->nullable();
            $table->string('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overall_target_vs_deliverables');
    }
};
