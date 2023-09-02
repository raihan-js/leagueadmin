@extends('layouts.app')
@section('main')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">

  @if ($type=='edit')
  <div class="row">
    <div class="col-lg-6 col-md-6 col-12 mb-4">
      <div class="card">
        
        <div class="row">
          <div class="col-md-12">
            <h5 class="card-header">Edit Weekly Schedule</h5>


            <form method="POST" action="{{ route('weeklyschedules.update', $weeklySchedule->id) }}" class="update-input">
              @csrf
              @method('PUT')
              <div class="row">
                <div class="mb-3 col-md-12">
                <label class="form-label" for="">Week Title</label>
                <input type="text" name="title" class="form-control" id="" placeholder="League 1" required value="{{$weeklySchedule->title}}">
                </div>
                
                <div class="mb-3 col-md-12">
                  <label for="master_schedules" class="form-label">Master Schedules</label>
                  <select id="master_schedules" class="form-control @error('master_schedules') is-invalid @enderror" name="master_schedules[]" multiple required>
                    @foreach ($masterSchedules as $masterSchedule)
                      <option value="{{ $masterSchedule->id }}" {{ in_array($masterSchedule->id, $weeklySchedule->masterSchedules->pluck('id')->toArray()) ? 'selected' : '' }}>
                        {{ $masterSchedule->title . ($masterSchedule->title ? ',' : '') }}
                        Home Team: {{ $masterSchedule->homeTeam->name }},
                        Away Team: {{ $masterSchedule->awayTeam->name }},
                        Date & Time: {{ date('F j, Y h:i A', strtotime($masterSchedule->date . ' ' . $masterSchedule->time)) }},
                        Location: {{ $masterSchedule->location }},
                        Sub Location: {{ $masterSchedule->sub_location }}
                      </option>
                    @endforeach
                  </select>
        
                  @error('master_schedules')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              
                
                
            </div>
              <button type="submit" class="btn btn-primary mt-4">Update Weekly Schedule</button>
            </form>


            
          </div>
          
          
        </div>

      </div>
    </div>
  </div>
      
  @endif


    <div class="row">
      <div class="col-md-4" style="padding-left: 0px"><h5 class="card-header">All Weekly Schedules</h5></div>
      <div class="col-md-4">@include('validate')</div>
      <div class="col-md-4">
          <div class="d-flex flex-row-reverse">
              <div class="pt-3 pb-3">   
                {{-- Create User button --}}
                <a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('weeklyschedules.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
                
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Create Weekly Schedule</button>
                
                {{-- Create Permission Modal --}}
                <div class="modal fade" id="createUser" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="modalCenterTitle">Create New Week</h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      
                      <div class="modal-body">
                        
                        {{-- Modal Input Group --}}
                            <form method="POST" action="{{ route('weeklyschedules.store') }}">
                              @csrf
                              <div class="row">
                                  <div class="mb-3 col-md-12">
                                  <label class="form-label" for="">Week Title</label>
                                  <input type="text" name="title" class="form-control" id="" placeholder="Week 1" required>
                                  </div>

                                  <div class="mb-3 col-md-12">
                                      <select id="master_schedules" class="form-control @error('master_schedules') is-invalid @enderror" name="master_schedules[]" multiple required style="overflow-x: auto; white-space: nowrap;">
                                        @foreach ($masterSchedules as $masterSchedule)
                                        <option value="{{ $masterSchedule->id }}">
                                          <div class="schedule-info">
                                            {{ $masterSchedule->title . ($masterSchedule->title ? ',' : '') }}
                                            Home Team: {{ $masterSchedule->homeTeam->name }},
                                            Away Team: {{ $masterSchedule->awayTeam->name }},
                                            Date & Time: {{ date('F j, Y h:i A', strtotime($masterSchedule->date . ' ' . $masterSchedule->time)) }},
                                            Location: {{ $masterSchedule->location }},
                                            Sub Location: {{ $masterSchedule->sub_location }}
                                          </div>
                                        </option>
                                        @endforeach
                                    </select>

                                    @error('master_schedules')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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

                

              </div>    
          </div>
      </div>
      
      
    </div>

    <div class="row mb-5">
      @forelse($weeklyschedules as $item)
      <div class="col-md-6 col-lg-4">
        <div class="card  mb-3">
          <div class="card-body">
            <div class="card-title text-center d-flex align-items-start justify-content-between">
              <h4>{{ $item->title }}</h4>
              <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">

                  
                    <a class="dropdown-item" href="{{ route('weeklyschedules.edit', $item->id) }}"><i class='bx bx-edit'></i> Edit</a>
                  

                  <form action="{{ route('weeklyschedules.destroy', $item->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</button>
                  </form>
                </div>
              </div>
            </form>
            </div>
            <p><strong>Total Schedules:</strong> <span class="badge rounded-pill bg-primary">{{ $item->masterSchedules->count() }}</span></p>
            <a href="{{ route('weeklyschedules.show', $item->id) }}" class="btn rounded-pill btn-icon btn-outline-primary"><i class='bx bx-right-arrow-alt'></i></a>
          </div>
        </div>
      </div>
      
        @empty
        <div class="col-md-6 col-lg-4">
        <div class="card text-center mb-3">
          <div class="card-body">
            <div class="card-title text-center ">
              <h4>No Weeks to show</h4>
            </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#createUser" class="btn rounded-pill btn-icon btn-outline-primary"><i class='bx bx-plus'></i></a>
          </div>
        </div>
      </div>
        @endforelse
    </div>
    {{-- {{ $leagues->links() }} --}}
    

    {{-- Table row --}}

    {{-- End Table row --}}


  
    

   
    
    
  </div>
  <!-- / Content -->

@endsection