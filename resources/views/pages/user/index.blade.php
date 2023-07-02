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
              <h5 class="card-header">Edit user</h5>
  
  
              <form method="POST" action="{{ route('admins.update', $edit->id) }}" class="update-input">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="">Name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="" value="{{ $edit->name }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Email</label>
                        <input type="text" name="email" class="form-control" id="" placeholder="" value="{{ $edit->email }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Username</label>
                        <input type="text" name="username" class="form-control" id="" placeholder="" value="{{ $edit->username }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Phone</label>
                        <input type="text" name="phone" class="form-control" id="" placeholder="" value="{{ $edit->phone }}" required>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Password</label>
                        <input type="text" name="password" class="form-control" id="" placeholder="New Password" required>
                    </div>
                    
                    <div class="mb-3 col-md-6">
                        <label for="defaultSelect" class="form-label">Role</label>
                        <select name="role" id="defaultSelect" class="form-select">
                        <option>Change role</option>
                            @foreach ($all_roles as $item)
                            <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update User</button>
              </form>
  
  
              
            </div>
            
            
          </div>
  
        </div>
      </div>
    </div>
        
    @endif
    

    {{-- Table row --}}
    <div class="row">
      <div class="col-lg-12 col-md-12 col-12 mb-4">
        <div class="card">
          
          <div class="row">
            <div class="col-md-4"><h5 class="card-header">All Users</h5></div>
            <div class="col-md-4 pt-3 px-3">@include('validate')</div>
            <div class="col-md-4">
                <div class="d-flex flex-row-reverse">
                    <div class="pt-3 px-3">   
                      {{-- Create User button --}}
                      <a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('admins.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
                      
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Create User</button>
                      
                      {{-- Create Permission Modal --}}
                      <div class="modal fade" id="createUser" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Create New User</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            
                            <div class="modal-body">
                              
                              {{-- Modal Input Group --}}
                                  <form method="POST" action="{{ route('admins.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">Name</label>
                                        <input type="text" name="name" class="form-control" id="" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Email</label>
                                            <input type="text" name="email" class="form-control" id="" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Username</label>
                                            <input type="text" name="username" class="form-control" id="" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Phone</label>
                                            <input type="text" name="phone" class="form-control" id="" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Password</label>
                                            <a  class="" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Password will be autogenerated if empty</span>">
                                              <i class='bx bx-info-circle'></i>
                                            </a>
                                            <input type="text" name="password" class="form-control" id="" placeholder="">
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label for="defaultSelect" class="form-label">Role</label>
                                            <select  name="role" id="defaultSelect" class="form-select" required>
                                            <option value="">Select role</option>
                                                @foreach ($all_roles as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> name }}</option>
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

                      

                    </div>    
                </div>
            </div>
            
            
          </div>
          
          <div class="table-responsive text-nowrap">
            <table class="table">
              <thead>
                <tr>
                  <th>SN</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Username</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Created at</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($all_users as $item)
                @if ($item->email !== 'admin@leagueadmin.net')

                <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td><strong>{{ $item->name }}</strong></td>
                    <td>{{ $item->email }}</td>                     
                    <td>{{ $item->username }}</td>                     
                    <td>{{ $item->phone }}</td>                     
                    <td><span class="badge @if($item->role->name === 'Ump/Ref') bg-label-warning @else bg-label-primary @endif me-1">@if($item->role){{ $item->role->name }}@else No Role Assigned @endif</span></td>                     
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    <td>
                      <form action="{{ route('update.status', $item->id) }}" method="GET">
                        <div class="form-check form-switch mb-2">
                          <input style="cursor: pointer;" name="status" class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" onChange="this.form.submit()"
                          @if ($item->status)
                              checked
                          @else

                          @endif 
                          >
                        </div>
                      </form>
                    </td>
                    
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
  
                            
                              <a  class="dropdown-item" href="{{ route('admins.edit', $item->id) }}"><i class='bx bx-edit'></i> Edit</a>
                            
  
                            <form action="{{ route('admins.destroy', $item->id) }}" method="POST" class="delete-form">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="dropdown-item" href="#"><i class="bx bx-trash me-1"></i> Delete</button>
                            </form>
                          </div>
                        </div>
                      </form>
                    </td>
                  </tr>
                    
                @endif
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
                            No Users Found
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