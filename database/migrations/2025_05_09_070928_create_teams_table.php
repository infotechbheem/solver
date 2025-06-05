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
            $table->string('college_university')->nullable();
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
            $table->longText('photo')->nullable();
            $table->longText('cv_resume')->nullable(); // ✅ fixed column name (no slash)
            $table->longText('aadhar_card')->nullable();
            $table->longText('pan_card')->nullable();
            $table->longText('marksheet')->nullable();
            $table->longText('address')->nullable();
            $table->longText('message')->nullable();
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
