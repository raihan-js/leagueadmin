<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use App\Models\Admin;
use App\Models\League;
use Illuminate\Http\Request;
use App\Models\MasterSchedule;
use App\Models\WeeklySchedule;
use App\Http\Controllers\Controller;

class AdminPageController extends Controller
{
    function showAdminDashboard(){

        // Total data count and push to dashboard
        $totalleagues = League::count();
        $totalschedules = MasterSchedule::count();
        $totalteams = Team::count();
        $totalusers = Admin::count();

        // Latest week
        $latestWeek = WeeklySchedule::with('masterSchedules')
        ->latest('created_at')
        ->first();

        return view('pages.dashboard', [
            'total_leagues' => $totalleagues,
            'total_schedules'   => $totalschedules,
            'total_teams'       => $totalteams,
            'total_users'       => $totalusers,
            'latestWeeklySchedule'        => $latestWeek,
        ]);
    }

    function showAdminAccount(){
        return view('account.settings');
    }

    function showAdminNotifications(){
        return view('account.notifications');
    }

    function showAdminConnections(){
        return view('account.connections');
    }
    
}
