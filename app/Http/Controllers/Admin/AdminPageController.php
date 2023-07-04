<?php

namespace App\Http\Controllers\Admin;

use App\Models\League;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\MasterSchedule;
use App\Models\Team;

class AdminPageController extends Controller
{
    function showAdminDashboard(){

        // Total data count and push to dashboard
        $totalleagues = League::count();
        $totalschedules = MasterSchedule::count();
        $totalteams = Team::count();
        $totalusers = Admin::count();

        return view('pages.dashboard', [
            'total_leagues' => $totalleagues,
            'total_schedules'   => $totalschedules,
            'total_teams'       => $totalteams,
            'total_users'       => $totalusers,
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
