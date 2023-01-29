@extends('layouts.app')
@section('main')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        

        {{-- Table row --}}
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12 mb-4">
            <div class="card">
              
              <div class="row">
                <div class="col-md-6"><h5 class="card-header">Weekly Schedule</h5></div>
                <div class="col-md-6">
                    <div class="d-flex flex-row-reverse">
                        <div class="pt-3 px-3">
                            
                        {{-- Create Permission --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermission">Create Permission</button>
                        
                        {{-- Create Permission Modal --}}
                        <div class="modal fade" id="createPermission" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalCenterTitle">Modal Title</h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                  ></button>
                                </div>
                                <div class="modal-body">
                                  {{-- Modal Input Group --}}
                                      <form>
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-fullname">Permission Name</label>
                                          <input type="text" class="form-control" id="basic-default-fullname" placeholder="John Doe">
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-company">Company</label>
                                          <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc.">
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-email">Email</label>
                                          <div class="input-group input-group-merge">
                                            <input type="text" id="basic-default-email" class="form-control" placeholder="john.doe" aria-label="john.doe" aria-describedby="basic-default-email2">
                                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                                          </div>
                                          <div class="form-text"> You can use letters, numbers &amp; periods </div>
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-phone">Phone No</label>
                                          <input type="text" id="basic-default-phone" class="form-control phone-mask" placeholder="658 799 8941">
                                        </div>
                                        <div class="mb-3">
                                          <label class="form-label" for="basic-default-message">Message</label>
                                          <textarea id="basic-default-message" class="form-control" placeholder="Hi, Do you have a moment to talk Joe?"></textarea>
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