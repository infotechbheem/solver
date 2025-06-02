<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deliverables extends Model
{
    protected $table = "deliverables";
    protected $fillable = [
        'program',
        'project_name',
        'donar_name',
        'project_title',
        'project_duration_from',
        'project_duration_to',
        'project_location',
        'no_of_month',
        'month',
        'particular',
        'target',
        'description',
    ];
}
