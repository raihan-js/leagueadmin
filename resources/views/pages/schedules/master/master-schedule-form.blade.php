<form method="POST" action="{{ route('masterschedules.update', $edit->id) }}" class="update-input">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="mb-3 col-md-12">
            <label class="form-label" for="">Title</label>
            <input type="text" name="title" class="form-control" id="" placeholder="Schedule title..." required value="{{$edit->title}}">
        </div>

        <div class="mb-3 col-md-6">
        <label class="form-label" for="">Home Team</label>
        <select name="home_team_id" id="home_team_id" class="form-control" required>
          <option value="">Select Home Team</option>
          @foreach ($teams as $team)
              <option value="{{ $team->id }}" {{ $team->id == $masterSchedule->home_team_id ? 'selected' : '' }}>{{ $team->name }}</option>
          @endforeach
        </select>
        </div>

        <div class="mb-3 col-md-6">
            <label for="defaultSelect" class="form-label">Away Team</label>
            <select name="away_team_id" id="away_team_id" class="form-control" required>
              <option value="">Select Away Team</option>
              @foreach ($teams as $team)
                  <option value="{{ $team->id }}" {{ $team->id == $masterSchedule->away_team_id ? 'selected' : '' }}>{{ $team->name }}</option>
              @endforeach
            </select>
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label" for="">Date</label>
            <input type="date" name="date" class="form-control" id="" placeholder="Captain name..." required value="{{$edit->date}}">
        </div>

        <div class="mb-3 col-md-6">
            <label class="form-label" for="">Time</label>
            <input type="time" name="time" class="form-control" id="" placeholder="A, B, C" required value="{{$edit->time}}">
        </div>

        <div class="mb-3 col-md-6">
          <label class="form-label" for="">Location</label>
          <input type="text" name="location" class="form-control" id="" placeholder="A, B, C" required value="{{$edit->location}}">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label" for="">Sub Location</label>
        <input type="text" name="sub_location" class="form-control" id="" placeholder="A, B, C" required value="{{$edit->sub_location}}">
      </div>

      <div class="mb-3 col-md-6">
        <label class="form-label" for="">Primary Ump/Ref</label>
        <select name="primary_admins[]" id="primary_admins" class="form-select" multiple>
          <option value="">Select Referee</option>
          @foreach($admins as $admin)
              @if ($admin->email !== 'admin@leagueadmin.net')
                  <option value="{{ $admin->id }}" {{ in_array($admin->id, $primaryReferees) ? 'selected' : '' }}>
                      {{ $admin->name }}
                  </option>
              @endif
          @endforeach
      
        </select>
      </div>
    
      <div class="mb-3 col-md-6">
        <label class="form-label" for="">Secondary Ump/Ref</label>
        <select name="secondary_admins[]" id="secondary_admins" class="form-select" multiple>
          <option value="">Select Referee</option>
          @foreach($admins as $admin)
              @if ($admin->email !== 'admin@leagueadmin.net')
                  <option value="{{ $admin->id }}" {{ in_array($admin->id, $secondaryReferees) ? 'selected' : '' }}>
                      {{ $admin->name }}
                  </option>
              @endif
          @endforeach
      
        </select>
      </div>
    
        
    </div>
    <button type="submit" class="btn btn-primary mt-4">Update Master Schedule</button>
</form>
