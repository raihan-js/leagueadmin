<?php

namespace App\Http\Controllers\Schedule;

use App\Models\Team;
use App\Models\League;
use Illuminate\Http\Request;
use App\Models\MasterSchedule;
use App\Models\WeeklySchedule;
use App\Http\Controllers\Controller;

class WeeklyScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weeklySchedules = WeeklySchedule::latest()->get();
        // $masterSchedules = MasterSchedule::with('homeTeam', 'awayTeam')->get();
        $teams = Team::all();
        $master = MasterSchedule::latest()->get();
        $leagues = League::all();

        $masterSchedules = MasterSchedule::all();

        return view('pages.schedules.weekly.index', [
            'master' => $master,
            'type' => '',
            'teams' => $teams,
            'masterSchedules' => $masterSchedules,
            'leagues' => $leagues, 
            'weeklyschedules'   => $weeklySchedules,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'master_schedules' => 'required|array',
            'master_schedules.*' => 'exists:master_schedules,id',
        ]);

        $weeklySchedule = WeeklySchedule::create([
            'title' => $request->input('title'),
        ]);

        $masterScheduleIds = $request->input('master_schedules');
        $weeklySchedule->masterSchedules()->attach($masterScheduleIds);
        $masterSchedules = MasterSchedule::all();
        $weeklySchedules = WeeklySchedule::all();


        return view('pages.schedules.weekly.index', [
            'masterSchedules'   => $masterSchedules,
            'weeklyschedules'   => $weeklySchedules,
            'type'            => '',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $weeklySchedule = WeeklySchedule::findOrFail($id);

        return view('pages.schedules.weekly.show', [
            'weeklySchedule' => $weeklySchedule,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $weeklySchedule = WeeklySchedule::findOrFail($id);
        $masterSchedules = MasterSchedule::all();
        $weeklySchedules = WeeklySchedule::all();
    
        return view('pages.schedules.weekly.index', [
            'weeklySchedule' => $weeklySchedule,
            'masterSchedules' => $masterSchedules,
            'type'          => 'edit',
            'weeklyschedules'   => $weeklySchedules,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'master_schedules' => 'required|array',
            'master_schedules.*' => 'exists:master_schedules,id',
        ]);
    
        $weeklySchedule = WeeklySchedule::findOrFail($id);
    
        $weeklySchedule->title = $validatedData['title'];
        $weeklySchedule->save();
    
        $weeklySchedule->masterSchedules()->sync($validatedData['master_schedules']);
    
        return redirect()->route('weeklyschedules.index')->with('success', 'Weekly Schedule updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Find the weekly schedule by its ID
        $weeklySchedule = WeeklySchedule::findOrFail($id);

        // Delete the weekly schedule
        $weeklySchedule->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('weeklyschedules.index')->with('success', 'Weekly schedule deleted successfully');
    }
}
