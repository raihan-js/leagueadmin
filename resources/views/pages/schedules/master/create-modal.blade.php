{{-- Create  Modal --}}
<div class="modal fade" id="createUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalCenterTitle">Create New Master Schedule</h5>
          <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
          ></button>
        </div>
        
        <div class="modal-body">
          
          {{-- Modal Input Group --}}
              <form method="POST" action="{{ route('masterschedules.store') }}">
                @csrf
                <div class="row">
                  <div class="mb-3 col-md-12">
                      <label class="form-label" for="">Title</label>
                      <input type="text" name="title" class="form-control" id="" placeholder="Schedule title..." required value="">
                  </div>
                    <div class="col mb-3">
                    <label for="league_id" class="form-label">Select League:</label>
                      <select class="form-select" name="league_id" id="league_id">
                          @foreach ($leagues as $league)
                              <option value="{{ $league->id }}">{{ $league->title }}</option>
                          @endforeach
                      </select>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="">Home Team</label>
                    <select name="home_team_id" id="home_team_id" class="form-control" required>
                      <option value="">Select Home Team</option>
                      @foreach ($teams as $team)
                          <option value="{{ $team->id }}">{{ $team->name }}</option>
                      @endforeach
                  </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="defaultSelect" class="form-label">Away Team</label>
                        <select name="away_team_id" id="away_team_id" class="form-control" required>
                          <option value="">Select Away Team</option>
                          @foreach ($teams as $team)
                              <option value="{{ $team->id }}">{{ $team->name }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Date</label>
                        <input type="date" name="date" class="form-control" id="" placeholder="Date" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Time</label>
                        <input type="time" name="time" class="form-control" id="" placeholder="Time" required>
                    </div>

                    <div class="mb-3 col-md-6">
                      <label class="form-label" for="">Location</label>
                      <input type="text" name="location" class="form-control" id="" placeholder="Location name..." required>
                  </div>

                  <div class="mb-3 col-md-6">
                      <label class="form-label" for="">Sub Location</label>
                      <input type="text" name="sub_location" class="form-control" id="" placeholder="A, B, C" required>
                  </div>

                  <div class="mb-3 col-md-6">
                    <label class="form-label" for="">Primary Ump/Ref</label>
                    <select name="primary_admins[]" id="primary_admins" class="form-select" multiple>
                      <option value="">Select Referee</option>
                      @foreach($admins as $admin)
                          @if ($admin->email !== 'admin@leagueadmin.net')
                              <option value="{{ $admin->id }}">
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
                              <option value="{{ $admin->id }}">
                                  {{ $admin->name }}
                              </option>
                          @endif
                      @endforeach
                  
                    </select>
                  </div>
                    
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
              </form>
          {{-- End Input Group --}}
        </div>                
      </div>
    </div>
</div>
{{-- End Create Permission Modal --}}