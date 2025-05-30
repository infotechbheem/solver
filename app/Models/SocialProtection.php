<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialProtection extends Model
{
    protected $table = "social_protections";
    protected $fillable = [
        'program_id',
        'differently_abled',
        'applied_document',
        'applied_scheme',
    ];
}