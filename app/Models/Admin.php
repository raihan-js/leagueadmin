<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Admin extends User
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function leagues()
    {
        return $this->belongsToMany(League::class)->withPivot('role')->withTimestamps();
    }

    public function masterSchedules()
    {
        return $this->belongsToMany(MasterSchedule::class, 'master_schedule_referee', 'referee_id', 'master_schedule_id')
            ->withPivot('is_primary')
            ->withTimestamps();
    }
}
