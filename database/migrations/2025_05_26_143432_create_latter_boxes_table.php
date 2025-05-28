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
        Schema::create('latter_boxes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('subject')->nullable();
            $table->string('receipt_type')->nullable();
            $table->date('date')->nullable();
            $table->string('latter_box_type')->nullable();
            $table->string('latter_type')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('latter/reference_no')->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();


            $table->foreign('department_id')->references('id')->on('user_departments')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latter_boxes');
    }
};
