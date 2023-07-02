<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSchedule extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function homeTeam()
{
    return $this->belongsTo(Team::class, 'home_team_id');
}

public function awayTeam()
{
    return $this->belongsTo(Team::class, 'away_team_id');
}

// Relation to League Model
    public function league()
    {
        return $this->belongsTo(League::class);
    }
}
