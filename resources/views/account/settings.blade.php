@extends('layouts.app')
@section('main')

<!-- Content -->

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account Settings /</span> Account</h4>

    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-pills flex-column flex-md-row mb-3">
          <li class="nav-item">
            <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.notifications') }}"
              ><i class="bx bx-bell me-1"></i> Notifications</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.connections') }}"
              ><i class="bx bx-link-alt me-1"></i> Connections</a
            >
          </li>
        </ul>
        <div class="card mb-4">

          <div class="card-body">
            <form id="formAccountSettings" method="POST" onsubmit="return false">
              <div class="row">
                <div class="mb-3 col-md-6">
                  <label for="firstName" class="form-label">Full Name</label>
                  <input
                    class="form-control"
                    type="text"
                    id="firstName"
                    name="firstName"
                    value="{{ Auth::guard('admin') -> user() -> name }}"
                    autofocus
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="lastName" class="form-label">Username</label>
                  <input class="form-control" type="text" name="username" id="username" value="admin2" disabled />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="email" class="form-label">E-mail</label>
                  <input
                    class="form-control"
                    type="text"
                    id="email"
                    name="email"
                    value="{{ Auth::guard('admin') -> user() -> username }}"
                    placeholder=""
                    disabled
                  />
                </div>
                <div class="mb-3 col-md-6">
                  <label for="organization" class="form-label">User Type</label>
                  <div class="demo-inline-spacing">
                    <span class="badge bg-primary">{{ Auth::guard('admin') -> user() -> role->name }}</span>
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label class="form-label" for="phoneNumber">Phone Number</label>
                  <div class="input-group input-group-merge">
                    <span class="input-group-text">US (+1)</span>
                    <input
                      type="text"
                      id="phoneNumber"
                      name="phoneNumber"
                      class="form-control"
                      placeholder=""
                      value="{{ Auth::guard('admin') -> user() -> phone }}"
                      disabled
                    />
                  </div>
                </div>
                <div class="mb-3 col-md-6">
                  <label for="address" class="form-label">Teams</label>
                  <div class="demo-inline-spacing">
                    <span class="badge bg-primary">Team 1</span>
                    <span class="badge bg-secondary">Team 2</span>
                  </div>
                </div>
                <div class="mb-3 col-md-12">
                  <label for="state" class="form-label">Slack Member ID</label>
                  <input class="form-control" type="text" id="slack" name="slack" placeholder="U022T65UTKH" />
                </div>
                
                
                
                
              </div>
              <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Update changes</button>
                
              </div>
            </form>
          </div>
          <!-- /Account -->
        </div>
        
      </div>
    </div>
  </div>
  <!-- / Content -->
    
@endsection