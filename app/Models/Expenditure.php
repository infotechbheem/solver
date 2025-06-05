<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Expenditure extends Model
{
    protected $table = "expenditure";
    protected $fillable = [
        'expense_date',
        'expense_sector',
        'project_name',
        'name',
        'type_of_expense',
        'administrative_expense',
        'human_resource',
        'hr_expense_date',
        'equip_expense_date',
        'equip_cost',
        'equip_supplier_name',
        'travel_exp_date',
        'travel_exp_departure',
        'travel_exp_arrirval',
        'travel_exp_mode_of_travel',
        'date_of_material_exp',
        'item',
        'quantity',
        'rate_per_unit',
        'total_cost',
        'remarks',
        'date_of_accommodation_exp',
        'checkin',
        'checkout',
        'no_of_days',
        'date_of_miscellaneous_exp',
        'other',
        'miscellaneous_exp_remarks',
        'miscellaneous_exp_description',
        'amount',
        'section',
        'tds_deduction_percentage',
        'tds_deduction_amount',
        'pan',
        'tds_deduction_date',
        'mode_of_payment',
        'invoice',
        'proof_of_payment',
        'sub_total_amount',
        'advance',
        'net_payment',
        'advance_deposit',
        'type_of_payment',
        'description',
    ];
}
