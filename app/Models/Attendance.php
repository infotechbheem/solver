<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = "attendance";
    protected $fillable = [
        'date',
        'project_name',
        'project_number',
        'title_of_project',
        'duration_of_project',
        'emp_name',
        'designation',
        'emp_id',
        'hours_spent',
        'days',
        'month',
        'task_performed',
    ];
}
