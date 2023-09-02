<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function admins()
    {
        return $this->belongsToMany(Admin::class)->withPivot('role')->withTimestamps();
    }

// Relation to MasterSchedules Model
    public function masterSchedules()
    {
        return $this->hasMany(MasterSchedule::class);
    }
}
