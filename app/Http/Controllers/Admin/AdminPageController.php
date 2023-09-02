<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\League;
use App\Models\MasterSchedule;
use App\Models\Team;
use App\Models\WeeklySchedule;

class AdminPageController extends Controller
{
    public function showAdminDashboard()
    {
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
            'total_schedules' => $totalschedules,
            'total_teams' => $totalteams,
            'total_users' => $totalusers,
            'latestWeeklySchedule' => $latestWeek,
        ]);
    }

    public function showAdminAccount()
    {
        return view('account.settings');
    }

    public function showAdminNotifications()
    {
        return view('account.notifications');
    }

    public function showAdminConnections()
    {
        return view('account.connections');
    }
}
