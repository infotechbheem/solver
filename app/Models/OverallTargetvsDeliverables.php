<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OverallTargetvsDeliverables extends Model
{
    protected $table = "overall_target_vs_deliverables";
    protected $fillable = [
        'key_indicator',
        'target',
        'achieved',
        'completion',
        'remarks',
    ];
}
