<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceSetting extends Model
{
    protected $table = "invoice_setting";
    protected $fillable = [
        'registration_number',
        '80G_number',
        'pan',
        'address',
        'logo',
        'authority_signature',
        'donation_description',
    ];
}
