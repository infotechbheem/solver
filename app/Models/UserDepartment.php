<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    protected $fillable = [
        'user_department'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
