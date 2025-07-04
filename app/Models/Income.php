<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $table = "income";
    protected $fillable = [
        'type_of_income',
        'csr_type',
        'partner_orgainisation_type',
        'type_of_donation',
        'donar_name',
        'email',
        'contact_number',
        'aadhar',
        'pan',
        'sanction_amount',
        'amount_received',
        'human_resource',
        'camp_exp',
        'training_exp',
        'equipment',
        'travel_exp',
        'material_exp',
        'administrative_exp',
        'accomodation_exp',
        'monitoring_exp',
        'miscellaneous_exp',
        'target_name',
        'target_amount',
        'no_of_installment',
        'payment_mode',
        'proof_of_evidence',
        'payment_date',
        'type_of_project',
        'project_name',
        'project_duration_from',
        'project_duration_to',
        'state',
        'district',
        'project_description',
        'message',
    ];

    public function csr()
    {
        return $this->belongsTo(CSRPartner::class, 'csr_type');
    }

    public function PartnerOrgnization()
    {
        return $this->belongsTo(PartnerOrgnization::class, 'partner_orgainisation_type');
    }
}
