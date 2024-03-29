@extends('layouts.app')
@section('main')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

    {{-- @if ($type=='edit')
    <div class="row">
      <div class="col-lg-6 col-md-6 col-12 mb-4">
        <div class="card">
          
          <div class="row">
            <div class="col-md-12">
              <h5 class="card-header">Edit Master Schedule</h5>
  
  
              <form method="POST" action="{{ route('masterschedules.update', $edit->id) }}" class="update-input">
                @csrf
                @method('PUT')
                <div class="row">
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
                    
                    
                </div>
                <button type="submit" class="btn btn-primary mt-4">Update Master Schedule</button>
              </form>
  
  
              
            </div>
            
            
          </div>
  
        </div>
      </div>
    </div>
        
    @endif --}}
    

    {{-- Table row --}}
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 mb-4">
        <div class="card">
          
          <div class="row">
            <div class="col-md-3">
              <div class="d-flex">
                <h5 class="card-header">{{ $league->title }}</h5>
              </div>
              
            </div>
            <div class="col-md-5 pt-3 px-3">@include('validate')</div>
            <div class="col-md-4 pt-3 px-3">
              <div class="d-flex flex-row-reverse">
                <button type="button" class=" btn btn-primary text-nowrap mx-2" data-bs-toggle="popover" data-bs-offset="0,14" data-bs-placement="left" data-bs-html="true" data-bs-content="<p>Type: <span class='badge rounded-pill bg-primary'>{{ $league->type }}</span><br>Start Date: <span class='badge rounded-pill bg-primary'>{{ $league->start_date }}</span><br>Weeks: <span class='badge rounded-pill bg-primary'>{{ $league->weeks }}</span><br>Ump/Ref: <span class='badge rounded-pill bg-primary'>{{ $league->admins()->wherePivot('role', 'primary')->first()->name }}</span><br>Secondary Ump/Ref: <span class='badge rounded-pill bg-primary'>{{ $league->admins()->wherePivot('role', 'secondary')->first()->name }}</span></p> <div class='d-flex justify-content-between'></div>" title="" data-bs-original-title="{{ $league->title }}">
                  League Details
                </button>
              </div>

            </div>
            
            
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Home Team</th>
                  <th>Away Team</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Location</th>
                  <th>Sub Location</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($league->masterSchedules as $item)

                <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td><strong>{{ $item->homeTeam->name }}</strong></td>
                    <td>{{ $item->awayTeam->name }}</td>                     
                    <td><span class="badge rounded-pill bg-warning text-dark c-font">{{ $item->date }}</span></td>                     
                    <td><span class="badge rounded-pill bg-info text-dark c-font">{{ $item->time }}</span></td>                                                            
                    <td>{{ $item->location }}</td>                                                            
                    <td>{{ $item->sub_location }}</td>                                                            
                    {{-- <td><span class="badge bg-label-primary me-1">@if($item->role){{ $item->role->name }}@else No Role Assigned @endif</span></td>                      --}}
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
  
                            
                              <a class="dropdown-item" href="{{ route('masterschedules.edit', $item->id) }}"><i class='bx bx-edit'></i> Edit</a>
                            
  
                            <form action="{{ route('masterschedules.destroy', $item->id) }}" method="POST" class="delete-form">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                          </div>
                        </div>
                      </form>
                    </td>
                  </tr>
                    
                @empty
                <div class="table-responsive text-nowrap">
                  <table class="table">
                    <thead>
                      <tr>
                        <th></th>
                        
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      <tr>
                        <td>
                          <div class="alert alert-primary" role="alert">
                            No Schedules Found
                          </div>
                        </td>
                        
                      </tr>
                      
                    </tbody>
                  </table>
                </div>
                @endforelse
                
              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
    {{-- End Table row --}}


  
    

   
    
    
  </div>
  <!-- / Content -->

@endsection