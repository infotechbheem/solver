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
        Schema::create('income', function (Blueprint $table) {
            $table->id();
            $table->string('type_of_income')->nullable();
            $table->string('type_of_donation')->nullable();
            $table->string('donar_name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact_number')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('pan')->nullable();
            $table->string('sanction_amount')->nullable();
            $table->string('amount_received')->nullable();
            $table->string('human_resource')->nullable();
            $table->string('camp_exp')->nullable();
            $table->string('training_exp')->nullable();
            $table->string('equipment')->nullable();
            $table->string('travel_exp')->nullable();
            $table->string('material_exp')->nullable();
            $table->string('administrative_exp')->nullable();
            $table->string('accomodation_exp')->nullable();
            $table->string('monitoring_exp')->nullable();
            $table->string('miscellaneous_exp')->nullable();
            $table->string('no_of_installment')->nullable();
            $table->string('payment_mode')->nullable();
            $table->longText('proof_of_evidence')->nullable();
            $table->string('payment_date')->nullable();
            $table->string('type_of_project')->nullable();
            $table->string('project_name')->nullable();
            $table->string('project_duration_from')->nullable();
            $table->string('project_duration_to')->nullable();
            $table->string('state')->nullable();
            $table->string('district')->nullable();
            $table->longText('project_description')->nullable();
            $table->longText('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income');
    }
};
