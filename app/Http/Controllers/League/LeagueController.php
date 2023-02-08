<?php

namespace App\Http\Controllers\League;

use App\Http\Controllers\Controller;
use App\Models\League;
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
        $all_leagues = League::latest()->get();
        return view('pages.leagues.index', [
            'all_leagues' => $all_leagues,
            'type'            => '',
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
            'title'      => 'required',
            'type'      => 'required',
            'start_date'      => 'required',
            'weeks'      => 'required',
        ]);

        // Data Store
        League::create([
            'title'          => $request->title,
            'type'         => $request->type,
            'start_date'      => $request->start_date,
            'weeks'         => $request->weeks,
        ]);

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
        $all_leagues = League::latest()->get();
        $per = League::findOrFail($id);
        return view('pages.leagues.index', [
            'edit'            => $per,
            'all_leagues' => $all_leagues,
            'type'            => 'edit',
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
            'title'          => $request->title,
            'type'         => $request->type,
            'start_date'      => $request->start_date,
            'weeks'         => $request->weeks,
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
