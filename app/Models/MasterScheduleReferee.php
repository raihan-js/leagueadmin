<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterScheduleReferee extends Model
{
    use HasFactory;

    protected $table = 'master_schedule_referee';

    protected $fillable = [
        'master_schedule_id',
        'referee_id',
        'is_primary',
    ];

    public function masterSchedule()
    {
        return $this->belongsTo(MasterSchedule::class, 'master_schedule_id');
    }

    public function referee()
    {
        return $this->belongsTo(Admin::class, 'referee_id');
    }
}
