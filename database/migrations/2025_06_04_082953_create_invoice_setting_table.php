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
        Schema::create('invoice_setting', function (Blueprint $table) {
            $table->id();
            $table->string('registration_number')->nullable();
            $table->string('80G_number')->nullable();
            $table->string('pan')->nullable();
            $table->longText('address')->nullable();
            $table->longText('logo')->nullable();
            $table->longText('authority_signature')->nullable();
            $table->longText('donation_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_setting');
    }
};
