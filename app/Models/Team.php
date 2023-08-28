<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function homeGames()
    {
        return $this->hasMany(MasterSchedule::class, 'home_team_id');
    }

    public function awayGames()
    {
        return $this->hasMany(MasterSchedule::class, 'away_team_id');
    }
}
