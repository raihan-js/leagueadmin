@extends('layouts.app')
@section('main')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
          <span class="text-muted fw-light">Account Settings / </span> Connections
        </h4>

        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.account') }}"
                  ><i class="bx bx-user me-1"></i> Account</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.notifications') }}"
                  ><i class="bx bx-bell me-1"></i> Notifications</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"
                  ><i class="bx bx-link-alt me-1"></i> Connections</a
                >
              </li>
            </ul>
            <div class="row">
              <div class="col-md-6 col-12 mb-md-0 mb-4">
                <div class="card">
                  <h5 class="card-header">Connected Accounts</h5>
                  <div class="card-body">
                    <p>Display content from your connected accounts on your site</p>
                    <!-- Connections -->
                    
                    <div class="d-flex mb-3">
                      <div class="flex-shrink-0">
                        <img src="{{ asset('assets/img/icons/brands/slack.png') }}" alt="slack" class="me-3" height="30" />
                      </div>
                      <div class="flex-grow-1 row">
                        <div class="col-9 mb-sm-0 mb-2">
                          <h6 class="mb-0">Slack</h6>
                          <small class="text-muted">Communication</small>
                        </div>
                        <div class="col-3 text-end">
                          <div class="form-check form-switch">
                            <input class="form-check-input float-end" type="checkbox" role="switch" checked />
                          </div>
                        </div>
                      </div>
                    </div>
                    
                    <!-- /Connections -->
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
@endsection