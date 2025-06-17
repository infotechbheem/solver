<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $table = 'user_details';
    protected $fillable = ['name', 'phone_number', 'email', 'address', 'designation_id', 'department_id', 'status','designation','user_id'];

    public function userType()
    {
        return $this->belongsTo(UserType::class, 'designation_id');
    }
    public function department()
    {
        return $this->belongsTo(UserDepartment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
