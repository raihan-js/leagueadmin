<?php

namespace App\Http\Controllers\Team;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_teams = Team::latest()->get();

        return view('pages.teams.index', [
            'all_teams' => $all_teams,
            'type' => '',
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
        $this->validate($request, [
            'name' => 'required',
            'sport' => 'required',
            'captain' => 'required',
            'division' => 'required',
        ]);

        // Data Store
        Team::create([
            'name' => $request->name,
            'sport' => $request->sport,
            'captain' => $request->captain,
            'division' => $request->division,
        ]);

        return back()->with('success', 'Team created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $all_teams = Team::latest()->get();
        $per = Team::findOrFail($id);

        return view('pages.teams.index', [
            'edit' => $per,
            'all_teams' => $all_teams,
            'type' => 'edit',
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
        $update_data = Team::findOrFail($id);
        $update_data->update([
            'name' => $request->name,
            'sport' => $request->sport,
            'captain' => $request->captain,
            'division' => $request->division,
        ]);

        return redirect()->route('teams.index')->with('success', 'Team updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = Team::findOrFail($id);
        $delete->delete();

        return back()->with('success', 'Team deleted successfully');
    }
}
