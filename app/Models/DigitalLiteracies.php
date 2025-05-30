<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DigitalLiteracies extends Model
{
    protected $table = "digital_literacies";
    protected $fillable = [
        'program_id',
        'differently_abled',
        'area',
        'type_of_sessions',
    ];
}