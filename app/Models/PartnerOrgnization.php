<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnerOrgnization extends Model
{
    protected $fillable = [
        'partner_id',
        'company/ngo_name',
        'contact_person_name',
        'designation',
        'phone_number',
        'email',
    ];
}
