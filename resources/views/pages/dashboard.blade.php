@extends('layouts.app')
@section('main')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-6 mb-4">
            @include('validate')
          </div>
          {{-- total leagues --}}
          <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="dashboard-icons bx bx-adjust"></i>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View All</a>
                    </div>
                  </div>
                </div>
                <span>Total Leagues</span>
                <h3 class="card-title text-nowrap mb-1">{{ $total_leagues ?? 0 }}</h3>
              </div>
            </div>
          </div>
          {{-- total leagues --}}

          {{-- total teams --}}
          <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="dashboard-icons bx bx-cube"></i>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View All</a>
                    </div>
                  </div>
                </div>
                <span>Total Teams</span>
                <h3 class="card-title text-nowrap mb-1">{{ $total_teams ?? 0 }}</h3>
              </div>
            </div>
          </div>
          {{-- total teams --}}

          {{-- total games --}}
          <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="dashboard-icons bx bx-layout"></i>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View All</a>
                    </div>
                  </div>
                </div>
                <span>Total Schedules</span>
                <h3 class="card-title text-nowrap mb-1">{{ $total_schedules ?? 0 }}</h3>
              </div>
            </div>
          </div>
          {{-- total Games --}}

          {{-- total users --}}
          <div class="col-lg-3 col-md-12 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <i class="dashboard-icons bx bx-user-pin"></i>
                  </div>
                  <div class="dropdown">
                    <button
                      class="btn p-0"
                      type="button"
                      id="cardOpt6"
                      data-bs-toggle="dropdown"
                      aria-haspopup="true"
                      aria-expanded="false"
                    >
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                      <a class="dropdown-item" href="javascript:void(0);">View All</a>
                    </div>
                  </div>
                </div>
                <span>Total Users</span>
                <h3 class="card-title text-nowrap mb-1">{{ $total_users - 1 ?? 0 }}</h3>
              </div>
            </div>
          </div>
          {{-- total users --}}
          
        </div>

        {{-- Table row --}}
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 mb-4">
            <div class="card">
              <h5 class="card-header">{{ $latestWeeklySchedule->title ?? 'No weekly schedules created' }}</h5>
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
                  <tbody>
                    @if ($latestWeeklySchedule)
                      @forelse ($latestWeeklySchedule->masterSchedules as $index => $masterSchedule)
                          <tr>
                              <td>{{ $index + 1 }}</td>
                              <td><span class="badge bg-label-primary">{{ $masterSchedule->homeTeam->name }}</span></td>
                              <td><span class="badge bg-label-primary">{{ $masterSchedule->awayTeam->name }}</span></td>
                              <td>{{ $masterSchedule->date }}</td>
                              <td>{{ $masterSchedule->time }}</td>
                              <td>{{ $masterSchedule->location }}</td>
                              <td>{{ $masterSchedule->sub_location }}</td>
                              <td>{{ $masterSchedule->created_at->diffForHumans() }}</td>
                              <td>
                                  <div class="dropdown">
                                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                          <i class="bx bx-dots-vertical-rounded"></i>
                                      </button>
                                      <div class="dropdown-menu">
                                          <a class="dropdown-item" href="{{ route('masterschedules.edit', $masterSchedule->id) }}">
                                              <i class="bx bx-edit"></i> Edit
                                          </a>
                                          <form action="{{ route('masterschedules.destroy', $masterSchedule->id) }}" method="POST"
                                              class="delete-form">
                                              @csrf
                                              @method('DELETE')
                                              <button type="submit" class="dropdown-item" href="#">
                                                  <i class="bx bx-trash me-1"></i> Delete
                                              </button>
                                          </form>
                                      </div>
                                  </div>
                              </td>
                          </tr>
                      @empty
                          <tr>
                              <td colspan="9">
                                  <div class="alert alert-primary" role="alert">
                                      No Schedules Found
                                  </div>
                              </td>
                          </tr>
                      @endforelse
                    @else
                      <tr>
                          <td colspan="9">
                              <div class="alert alert-primary" role="alert">
                                  No Weekly Schedules Created
                              </div>
                          </td>
                      </tr>
                    @endif
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