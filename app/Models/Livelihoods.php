<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livelihoods extends Model
{
    protected $table = "livelihoods";
    protected $fillable = [
        'program_id',
        'differently_abled',
        'support',
        'support_description',
    ];
}