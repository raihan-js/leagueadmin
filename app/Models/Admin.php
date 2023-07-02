<?php

namespace App\Models;

use App\Models\Role;
use App\Models\League;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends User
{
    use HasFactory, Notifiable;
    protected $guarded = [];

    public function role(){
       return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    public function leagues()
{
    return $this->belongsToMany(League::class)->withPivot('role')->withTimestamps();
}
}
