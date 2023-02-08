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
              <h5 class="card-header">Edit league</h5>
  
  
              <form method="POST" action="{{ route('leagues.update', $edit->id) }}" class="update-input">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="mb-3 col-md-6">
                  <label class="form-label" for="">League Title</label>
                  <input type="text" name="title" class="form-control" id="" placeholder="League 1" required value="{{$edit->title}}">
                  </div>

                  <div class="mb-3 col-md-6">
                      <label for="defaultSelect" class="form-label">Type of league</label>
                      <select name="type" id="defaultSelect" class="form-select">
                      <option>Select type</option>
                          <option value="Kickball">Kickball</option>
                          <option value="Dodgeball">Dodgeball</option>
                          <option value="Bowling">Bowling</option>
                      </select>
                  </div>

                  <div class="mb-3 col-md-6">
                      <label class="form-label" for="">Start date</label>
                      <input type="date" name="start_date" class="form-control" id="" placeholder="" required value="{{$edit->start_date}}">
                  </div>

                  <div class="mb-3 col-md-6">
                      <label class="form-label" for="">Number of weeks</label>
                      <input type="number" name="weeks" class="form-control" id="" placeholder="" required value="{{$edit->weeks}}">
                  </div>

                  <div class="mb-3 col-md-6">
                      <label for="defaultSelect" class="form-label">Ump/Ref</label>
                      <select name="role" id="defaultSelect" class="form-select">
                      <option>Select Ump/Ref</option>
                          {{-- @foreach ($all_roles as $item)
                          <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                          @endforeach --}}
                      </select>
                  </div>
                  
                  <div class="mb-3 col-md-6">
                      <label for="defaultSelect" class="form-label">Secondary Ump/Ref</label>
                      <select name="role" id="defaultSelect" class="form-select">
                      <option>Select Ump/Ref</option>
                          {{-- @foreach ($all_roles as $item)
                          <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                          @endforeach --}}
                      </select>
                  </div>
                  
                  
              </div>
                {{-- <div class="row">
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
                        <option>Select role</option>
                            @foreach ($all_roles as $item)
                            <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    
                </div> --}}
                {{-- <label class="form-label" for="">Permissions</label>
                    @forelse (json_decode($permissions) as $item)
                    <div class="form-check">
                        <input 
                        @if (in_array($item->name, json_decode($edit->permissions)))
                            checked
                        @endif 
                        name="permissions[]" class="form-check-input" type="checkbox" value="{{ $item->name }}" id="defaultCheck3">
                        <label class="form-check-label" for="defaultCheck3">
                        {{ $item->name }}
                        </label>
                    </div>
                    @empty
                        
                    @endforelse --}}
                <button type="submit" class="btn btn-primary mt-4">Update League</button>
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
            <div class="col-md-4"><h5 class="card-header">All Leagues</h5></div>
            <div class="col-md-4 pt-3 px-3">@include('validate')</div>
            <div class="col-md-4">
                <div class="d-flex flex-row-reverse">
                    <div class="pt-3 px-3">   
                      {{-- Create User button --}}
                      <a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('admins.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
                      
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Create League</button>
                      
                      {{-- Create Permission Modal --}}
                      <div class="modal fade" id="createUser" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Create New League</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            
                            <div class="modal-body">
                              
                              {{-- Modal Input Group --}}
                                  <form method="POST" action="{{ route('leagues.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">League Title</label>
                                        <input type="text" name="title" class="form-control" id="" placeholder="League 1" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="defaultSelect" class="form-label">Type of league</label>
                                            <select name="type" id="defaultSelect" class="form-select">
                                            <option>Select type</option>
                                                <option value="Kickball">Kickball</option>
                                                <option value="Dodgeball">Dodgeball</option>
                                                <option value="Bowling">Bowling</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Start date</label>
                                            <input type="date" name="start_date" class="form-control" id="" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Number of weeks</label>
                                            <input type="number" name="weeks" class="form-control" id="" placeholder="" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="defaultSelect" class="form-label">Ump/Ref</label>
                                            <select name="role" id="defaultSelect" class="form-select">
                                            <option>Select Ump/Ref</option>
                                                {{-- @foreach ($all_roles as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                        
                                        <div class="mb-3 col-md-6">
                                            <label for="defaultSelect" class="form-label">Secondary Ump/Ref</label>
                                            <select name="role" id="defaultSelect" class="form-select">
                                            <option>Select Ump/Ref</option>
                                                {{-- @foreach ($all_roles as $item)
                                                <option value="{{ $item -> id }}">{{ $item -> name }}</option>
                                                @endforeach --}}
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
                  <th>League Title</th>
                  <th>Type of league</th>
                  <th>Start date</th>
                  <th>Weeks</th>
                  <th>Ump/Ref</th>
                  <th>Secondary Ump/Ref</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($all_leagues as $item)

                <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td><strong>{{ $item->title }}</strong></td>
                    <td>{{ $item->type }}</td>                     
                    <td>{{ $item->start_date }}</td>                     
                    <td>{{ $item->weeks }}</td>                     
                    <td>Ump 1</td>                     
                    <td>Ump 3</td>                                         
                    {{-- <td><span class="badge bg-label-primary me-1">@if($item->role){{ $item->role->name }}@else No Role Assigned @endif</span></td>                      --}}
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
  
                            
                              <a class="dropdown-item" href="{{ route('leagues.edit', $item->id) }}"><i class='bx bx-edit'></i> Edit</a>
                            
  
                            <form action="{{ route('leagues.destroy', $item->id) }}" method="POST" class="delete-form">
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
                            No Leagues Found
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