<?php

namespace App\Http\Controllers\Schedule;

use App\Models\Team;
use App\Models\League;
use Illuminate\Http\Request;
use App\Models\MasterSchedule;
use App\Http\Controllers\Controller;

class MasterScheduleController extends Controller
{




    // Import csv method
    public function import(Request $request)
    {
        // Fields Validation
        $this->validate($request, [
            'import_file' => 'required|mimes:csv,txt',
            'league_id' => 'required|exists:leagues,id', // validation for league_id
        ]);

        $file = $request->file('import_file');
        $leagueId = $request->input('league_id'); // Get the selected league ID

        // Open the CSV file
        $handle = fopen($file,
            'r'
        );

        // Loop through each row in the CSV file
        while (($data = fgetcsv($handle, 1000, ',')) !== false) {

            // Check if home team already exists in the database
            $homeTeam = Team::where('name', $data[0])->first();
            if (!$homeTeam) {
                // Create new home team object if it does not exist
                $homeTeam = Team::create(['name' => $data[0]]);
            }

            // Check if away team already exists in the database
            $awayTeam = Team::where('name', $data[1])->first();
            if (!$awayTeam) {
                // Create new away team object if it does not exist
                $awayTeam = Team::create(['name' => $data[1]]);
            }

            // Store each row as a new MasterSchedule object with the league ID
            MasterSchedule::create([
                'league_id' => $leagueId,
                'home_team_id' => $homeTeam->id,
                'away_team_id' => $awayTeam->id,
                'date' => $data[2],
                'time' => $data[3],
                'location' => $data[4],
                'sub_location' => $data[5],
            ]);
        }

        fclose($handle);

        return back()->with('success', 'Master Schedule imported successfully');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterSchedules = MasterSchedule::with('homeTeam', 'awayTeam')->get();
        $teams = Team::all();
        $master = MasterSchedule::latest()->get();
        $leagues = League::all(); // Add this line to load the leagues
        return view('pages.schedules.master.index', [
            'master' => $master,
            'type' => '',
            'teams' => $teams,
            'masterSchedule' => $masterSchedules,
            'leagues' => $leagues, // Pass the leagues to the view
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
            'home_team_id'      => 'required',
            'away_team_id'      => 'required',
            'date'      => 'required',
            'time'      => 'required',
            'location'      => 'required',
            'sub_location'      => 'required',
        ]);

        // Data Store
        MasterSchedule::create([
            'league_id'         => $request->league_id,
            'home_team_id'     => $request->home_team_id,
            'away_team_id'     => $request->away_team_id,
            'date'      => $request->date,
            'time'         => $request->time,
            'location'         => $request->location,
            'sub_location'         => $request->sub_location,
        ]);

        return back()->with('success', 'Master Schedule created successfully');
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
    $masterSchedule = MasterSchedule::with('homeTeam', 'awayTeam')->findOrFail($id);
    $teams = Team::all();
    $all_masters = MasterSchedule::latest()->get();
    $per = MasterSchedule::findOrFail($id);
    $leagues = League::all(); // Add this line to load the leagues
    return view('pages.schedules.master.index', [
        'edit' => $per,
        'master' => $all_masters,
        'type' => 'edit',
        'teams' => $teams,
        'masterSchedule' => $masterSchedule,
        'leagues' => $leagues, // Pass the leagues to the view
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
        $update_data = MasterSchedule::findOrFail($id);
        $update_data->update([
            'title'     => $request->title,
            'home_team_id'          => $request->home_team_id,
            'away_team_id'         => $request->away_team_id,
            'date'      => $request->date,
            'time'         => $request->time,
            'location'         => $request->location,
            'sub_location'         => $request->sub_location,
        ]);
        return redirect()->route('masterschedules.index')->with('success', 'Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = MasterSchedule::findOrFail($id);
        $delete->delete();
        return back()->with('success', 'Deleted successfully');
    }
}
