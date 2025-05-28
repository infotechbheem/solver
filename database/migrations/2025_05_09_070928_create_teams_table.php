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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_id')->unique();
            $table->string('full_name')->nullable();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('employment_type')->nullable();
            $table->string('position_type')->nullable();
            $table->string('qualification')->nullable();
            $table->string('college/university')->nullable();
            $table->string('experience')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('emergency_contact_number')->nullable();
            $table->string('date_of_joining')->nullable();
            $table->string('designation')->nullable();
            $table->string('department')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('basic_amount')->nullable();
            $table->string('ctc_amount')->nullable();
            $table->string('epf')->nullable();
            $table->string('esic')->nullable();
            $table->string('photo')->nullable();
            $table->string('cv/resume')->nullable();
            $table->string('aadhar_card')->nullable();
            $table->string('pan_card')->nullable();
            $table->string('marksheet')->nullable();
            $table->string('address')->nullable();
            $table->string('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
