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
        Schema::create('partner_orgnizations', function (Blueprint $table) {
            $table->id();
            $table->string('partner_id')->unique();
            $table->string('company/ngo_name');
            $table->string('contact_person_name');
            $table->string('designation');
            $table->string('phone_number');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partner_orgnizations');
    }
};
