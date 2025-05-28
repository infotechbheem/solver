<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CSRPartner extends Model
{
    protected $table = "csr_partners";
    protected $fillable = [
        'csr_id',
        'company_name',
        'contact_person_name',
        'phone_number',
        'designation',
        'email',
    ];
}
