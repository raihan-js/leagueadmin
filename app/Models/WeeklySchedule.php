<?php

namespace App\Models;

use App\Models\MasterSchedule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
