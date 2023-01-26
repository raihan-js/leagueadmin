@extends('layouts.app')
@section('main')
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-4">
          <span class="text-muted fw-light">Account Settings /</span> Notifications
        </h4>

        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-3">
              <li class="nav-item">
                <a class="nav-link" href="pages-account-settings-account.html"
                  ><i class="bx bx-user me-1"></i> Account</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="javascript:void(0);"
                  ><i class="bx bx-bell me-1"></i> Notifications</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="pages-account-settings-connections.html"
                  ><i class="bx bx-link-alt me-1"></i> Connections</a
                >
              </li>
            </ul>
            <div class="card">
              <!-- Notifications -->
              <h5 class="card-header">Notifications</h5>
              <div class="card-body">
                <span
                  >We need permission from your browser to show notifications.
                  <span class="notificationRequest"><strong>Request Permission</strong></span></span
                >
                <div class="error"></div>
              </div>
              <div class="table-responsive">
                <table class="table table-striped table-borderless border-bottom">
                  <thead>
                    <tr>
                      <th class="text-nowrap">Type</th>
                      <th class="text-nowrap text-center">Email Notifications</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-nowrap">News for you</td>
                      <td>
                        <div class="form-check d-flex justify-content-center">
                          <input class="form-check-input" type="checkbox" id="defaultCheck1" checked />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-nowrap">League Updates</td>
                      <td>
                        <div class="form-check d-flex justify-content-center">
                          <input class="form-check-input" type="checkbox" id="defaultCheck4" checked />
                        </div>
                      </td>
                      
                    </tr>
                    <tr>
                      <td class="text-nowrap">Team Updates</td>
                      <td>
                        <div class="form-check d-flex justify-content-center">
                          <input class="form-check-input" type="checkbox" id="defaultCheck7" checked />
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td class="text-nowrap">Availability Updates</td>
                      <td>
                        <div class="form-check d-flex justify-content-center">
                          <input class="form-check-input" type="checkbox" id="defaultCheck10" checked />
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <!-- /Notifications -->
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
@endsection