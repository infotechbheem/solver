<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatterBox extends Model
{
    protected $fillable = ['name', 'subject', 'receipt_type', 'date', 'latter_box_type', 'latter_type', 'department_id', 'latter/reference_no', 'description'];

    public function department()
    {
        return $this->belongsTo(UserDepartment::class, 'department_id');
    }
}
