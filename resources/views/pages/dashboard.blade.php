@extends('layouts.app')
@section('main')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
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
                <h3 class="card-title text-nowrap mb-1">15</h3>
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
                <h3 class="card-title text-nowrap mb-1">10</h3>
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
                <h3 class="card-title text-nowrap mb-1">42</h3>
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
                <h3 class="card-title text-nowrap mb-1">5</h3>
              </div>
            </div>
          </div>
          {{-- total users --}}
          
        </div>

        {{-- Table row --}}
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 mb-4">
            <div class="card">
              <h5 class="card-header">Weekly Schedule (main now)</h5>
              <div class="table-responsive text-nowrap">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Away Team</th>
                      <th>Home Team</th>
                      <th>HB Ump (Shadow)</th>
                      <th>1B Ump Duty</th>
                      <th>Field</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-0">
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i>12-01-2023</td>
                      <td>11:00 AM</td>
                      <td><span class="badge bg-label-primary me-1">Sons Of Pitches</span></td>
                      <td><span class="badge bg-label-primary me-1">Kick Me, Daddy</span></td>
                      <td><strong>Nathan Wise</strong></td>
                      <td><strong>Sassy Bunts</strong></td>
                      <td>Dirt 1</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i>15-01-2023</td>
                      <td>11:00 AM</td>
                      <td><span class="badge bg-label-primary me-1">Fresh Kicks</span></td>
                      <td><span class="badge bg-label-primary me-1">Freeballers</span></td>
                      <td><strong>Scot Sweazy</strong></td>
                      <td><strong>Jason Painter</strong></td>
                      <td>Dirt 2</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td><i class="fab fa-angular fa-lg text-danger me-3"></i>02-02-2023</td>
                      <td>02:00 PM</td>
                      <td><span class="badge bg-label-primary me-1">Nancy Boys</span></td>
                      <td><span class="badge bg-label-primary me-1">Ambush</span></td>
                      <td><strong>Zac Eggers</strong></td>
                      <td><strong>Drew Compston</strong></td>
                      <td>Grass 1</td>
                      <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                            <a class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</a>
                          </div>
                        </div>
                      </td>
                    </tr>
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