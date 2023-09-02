<?php

namespace App\Http\Controllers\League;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\League;
use App\Models\MasterSchedule;
use App\Models\Team;
use Illuminate\Http\Request;

class LeagueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leagues = League::with('admins', 'masterSchedules')->latest()->paginate(6);

        // Only fetch the admins with ump/ref role
        $admins = Admin::select('admins.*')
            ->join('roles', 'admins.role_id', '=', 'roles.id')
            ->where('roles.name', 'ump/ref')
            ->get();

        $all_leagues = League::latest()->get();

        return view('pages.leagues.index', [
            'all_leagues' => $all_leagues,
            'type' => '',
            'admins' => $admins,
            'leagues' => $leagues,
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
        // Fields Validation
        $validatedData = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'start_date' => 'required',
            'weeks' => 'required',
            'primary_admin' => 'required|exists:admins,id',
            'secondary_admin' => 'required|exists:admins,id',
        ]);

        // Data Store
        $league = League::create([
            'title' => $request->title,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'weeks' => $request->weeks,
        ]);

        // Attach the primary admin
        $league->admins()->attach($validatedData['primary_admin'], ['role' => 'primary']);

        // Attach the secondary admin
        $league->admins()->attach($validatedData['secondary_admin'], ['role' => 'secondary']);

        return back()->with('success', 'League created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $masterSchedules = MasterSchedule::with('homeTeam', 'awayTeam')->get();
        $teams = Team::all();
        $master = MasterSchedule::latest()->get();
        $league = League::with('admins', 'masterSchedules')->findOrFail($id);

        return view('pages.leagues.show', [
            'league' => $league,
            'master' => $master,
            'type' => '',
            'teams' => $teams,
            'masterSchedule' => $masterSchedules,
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
        $leagues = League::with('admins')->latest()->paginate(6);
        $admins = Admin::latest()->get();
        $all_leagues = League::latest()->get();
        $per = League::findOrFail($id);

        return view('pages.leagues.index', [
            'type' => 'edit',
            'edit' => $per,
            'all_leagues' => $all_leagues,
            'leagues' => $leagues,
            'admins' => $admins,
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
        $update_data = League::findOrFail($id);
        $update_data->update([
            'title' => $request->title,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'weeks' => $request->weeks,
        ]);

        $primary_admin = $request->input('primary_admin');
        $secondary_admin = $request->input('secondary_admin');

        $update_data->admins()->detach();

        $update_data->admins()->attach([
            $primary_admin => ['role' => 'primary'],
            $secondary_admin => ['role' => 'secondary'],
        ]);

        return redirect()->route('leagues.index')->with('success', 'League updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = League::findOrFail($id);
        $delete->delete();

        return back()->with('success', 'League deleted successfully');
    }
}
