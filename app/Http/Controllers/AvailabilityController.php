<?php

namespace App\Http\Controllers;

use App\Models\League;
use App\Models\MasterSchedule;
use App\Models\Team;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AvailabilityController extends Controller
{
    public function ump(Request $request)
    {
        $startDate = $request->query('start');
        $endDate = $request->query('end');
        $clear = $request->query('clear');

        $masterSchedules = MasterSchedule::with('homeTeam', 'awayTeam');

        if (isset($startDate)) {
            $startDate = Carbon::createFromFormat('m/d/Y', $startDate);
            $endDate = Carbon::createFromFormat('m/d/Y', $endDate);

            $masterSchedules->whereDate('date', '>=', $startDate)
                            ->whereDate('date', '<=', $endDate);
        }

        $masterSchedules = $masterSchedules->get();
        $teams = Team::all();
        $master = MasterSchedule::latest()->get();
        $leagues = League::all();

        if (isset($startDate) || isset($clear)) {
            return view('pages.availability.ump.table', [
                'startDate' => $startDate,
                'endDate' => $endDate,
                'master' => $masterSchedules,
                'type' => '',
                'teams' => $teams,
                'masterSchedule' => $masterSchedules,
                'leagues' => $leagues,
            ]);
        }

        return view('pages.availability.ump.index', [
            'startDate' => $startDate,
            'endDate' => $endDate,
            'master' => $masterSchedules,
            'type' => '',
            'teams' => $teams,
            'masterSchedule' => $masterSchedules,
            'leagues' => $leagues,
        ]);
    }

    public function venue()
    {
        return view('pages.availability.venue.index');
    }
}
