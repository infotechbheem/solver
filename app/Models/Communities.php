<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Communities extends Model
{
    protected $table = "communities";
    protected $fillable = [
        'program_id',
        'differently_abled',
        'area',
        'project',
        'ngo_shg_cooperative_fpo_other',
        'org_representative_name',
        'org_type',
        'working_period',
        'no_of_members',
        'org_focused_working_area',
        'support',
        'community_support',
        'support_description',
    ];
}