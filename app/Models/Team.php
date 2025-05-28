<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'team_id',
        'full_name',
        'fathers_name',
        'mothers_name',
        'email',
        'phone_number',
        'dob',
        'gender',
        'employment_type',
        'position_type',
        'qualification',
        'college/university',
        'experience',
        'marital_status',
        'emergency_contact_number',
        'date_of_joining',
        'designation',
        'department',
        'payment_type',
        'basic_amount',
        'ctc_amount',
        'epf',
        'esic',
        'photo',
        'cv/resume',
        'aadhar_card',
        'pan_card',
        'marksheet',
        'address',
        'message',
    ];
}
