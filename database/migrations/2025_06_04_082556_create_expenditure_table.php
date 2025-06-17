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
        Schema::create('expenditure', function (Blueprint $table) {
            $table->id();
            $table->string('expense_date')->nullable();
            $table->string('expense_sector')->nullable();
            $table->string('project_name')->nullable();
            $table->string('name')->nullable();
            $table->string('type_of_expense')->nullable();
            $table->string('administrative_expense')->nullable();
            $table->string('human_resource')->nullable();
            $table->string('hr_expense_date')->nullable();
            $table->string('equip_expense_date')->nullable();
            $table->string('equip_cost')->nullable();
            $table->string('equip_supplier_name')->nullable();
            $table->string('travel_exp_date')->nullable();
            $table->string('travel_exp_departure')->nullable();
            $table->string('travel_exp_arrirval')->nullable();
            $table->string('travel_exp_mode_of_travel')->nullable();
            $table->string('date_of_material_exp')->nullable();
            $table->string('item')->nullable();
            $table->string('quantity')->nullable();
            $table->string('rate_per_unit')->nullable();
            $table->string('total_cost')->nullable();
            $table->longText('remarks')->nullable();
            $table->string('date_of_accommodation_exp')->nullable();
            $table->string('checkin')->nullable();
            $table->string('checkout')->nullable();
            $table->string('no_of_days')->nullable();
            $table->string('date_of_miscellaneous_exp')->nullable();
            $table->string('other')->nullable();
            $table->longText('miscellaneous_exp_remarks')->nullable();
            $table->longText('miscellaneous_exp_description')->nullable();
            $table->string('amount')->nullable();
            $table->string('section')->nullable();
            $table->string('tds_deduction_percentage')->nullable();
            $table->string('tds_deduction_amount')->nullable();
            $table->string('pan')->nullable();
            $table->string('tds_deduction_date')->nullable();
            $table->string('mode_of_payment')->nullable();
            $table->string('invoice')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->string('sub_total_amount')->nullable();
            $table->string('advance')->nullable();
            $table->string('net_payment')->nullable();
            $table->string('advance_deposit')->nullable();
            $table->string('type_of_payment')->nullable();

            $table->string('hr_amount')->nullable();
            $table->string('hr_section')->nullable();
            $table->string('hr_tds_deduction_percentage')->nullable();
            $table->string('hr_tds_deduction_amount')->nullable();
            $table->string('hr_pan')->nullable();
            $table->string('hr_tds_deduction_date')->nullable();
            $table->string('hr_total_amount')->nullable();

            $table->string('equip_amount')->nullable();
            $table->string('equip_section')->nullable();
            $table->string('equip_tds_deduction_percentage')->nullable();
            $table->string('equip_tds_deduction_amount')->nullable();
            $table->string('equip_pan')->nullable();
            $table->string('equip_tds_deduction_date')->nullable();
            $table->string('equip_total_amount')->nullable();

            $table->string('travel_exp_amount')->nullable();
            $table->string('travel_exp_section')->nullable();
            $table->string('travel_exp_tds_deduction_percentage')->nullable();
            $table->string('travel_exp_tds_deduction_amount')->nullable();
            $table->string('travel_exp_pan')->nullable();
            $table->string('travel_exp_tds_deduction_date')->nullable();
            $table->string('travel_exp_total_amount')->nullable();

            $table->string('material_amount')->nullable();
            $table->string('material_section')->nullable();
            $table->string('material_tds_deduction_percentage')->nullable();
            $table->string('material_tds_deduction_amount')->nullable();
            $table->string('material_pan')->nullable();
            $table->string('material_tds_deduction_date')->nullable();
            $table->string('material_total_amount')->nullable();

            $table->string('accomodation_amount')->nullable();
            $table->string('accomodation_section')->nullable();
            $table->string('accomodation_tds_deduction_percentage')->nullable();
            $table->string('accomodation_tds_deduction_amount')->nullable();
            $table->string('accomodation_pan')->nullable();
            $table->string('accomodation_tds_deduction_date')->nullable();
            $table->string('accomodation_total_amount')->nullable();

            $table->string('miscellaneous_amount')->nullable();
            $table->string('miscellaneous_section')->nullable();
            $table->string('miscellaneous_tds_deduction_percentage')->nullable();
            $table->string('miscellaneous_tds_deduction_amount')->nullable();
            $table->string('miscellaneous_pan')->nullable();
            $table->string('miscellaneous_tds_deduction_date')->nullable();
            $table->string('miscellaneous_total_amount')->nullable();

            $table->longText('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenditure');
    }
};
