<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgressTracker extends Model
{
    protected $table = "daily_weekly_progress_tracker";
    protected $fillable = [
        'date',
        'location',
        'activity',
        'shg_covered',
        'member_enrolled',
        'schemes_facilitated',
        'legal_docs_processed',
    ];
}
