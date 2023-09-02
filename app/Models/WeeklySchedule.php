<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklySchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function masterSchedules()
    {
        return $this->belongsToMany(MasterSchedule::class, 'master_schedule_weekly_schedule')
        ->withTimestamps();
    }
}
