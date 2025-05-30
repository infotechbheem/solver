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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('program_type')->nullable();
            $table->string('date')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->string('donar_organisation')->nullable();
            $table->string('project')->nullable();
            $table->string('support_partner')->nullable();
            $table->string('gender')->nullable();
            $table->string('team_member_name')->nullable();
            $table->string('beneficiary_name')->nullable();
            $table->string('age')->nullable();
            $table->string('caste')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('religion')->nullable();
            $table->string('occupation')->nullable();
            $table->string('family_income')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('program');
    }
};
