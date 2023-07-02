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
              <h5 class="card-header">Edit Team</h5>
  
  
              <form method="POST" action="{{ route('teams.update', $edit->id) }}" class="update-input">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="mb-3 col-md-6">
                    <label class="form-label" for="">Team Name</label>
                    <input type="text" name="name" class="form-control" id="" placeholder="Team 1" required value="{{$edit->name}}">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="defaultSelect" class="form-label">Team Sport</label>
                        <select name="sport" id="defaultSelect" class="form-select">
                        <option>Select sport</option>
                            <option value="Kickball" {{ $edit->sport === 'Kickball' ? 'selected' : '' }}>Kickball</option>
                            <option value="Dodgeball" {{ $edit->sport === 'Dodgeball' ? 'selected' : '' }}>Dodgeball</option>
                            <option value="Bowling" {{ $edit->sport === 'Bowling' ? 'selected' : '' }}>Bowling</option>
                        </select>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Team Captain</label>
                        <input type="text" name="captain" class="form-control" id="" placeholder="Captain name..." required value="{{$edit->captain}}">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label class="form-label" for="">Division</label>
                        <input type="text" name="division" class="form-control" id="" placeholder="A, B, C" required value="{{$edit->division}}">
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
            <div class="col-md-4"><h5 class="card-header">All Teams</h5></div>
            <div class="col-md-4 pt-3 px-3">@include('validate')</div>
            <div class="col-md-4">
                <div class="d-flex flex-row-reverse">
                    <div class="pt-3 px-3">   
                      {{-- Create User button --}}
                      <a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('teams.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
                      
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Create Team</button>
                      
                      {{-- Create Permission Modal --}}
                      <div class="modal fade" id="createUser" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Create New Team</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            
                            <div class="modal-body">
                              
                              {{-- Modal Input Group --}}
                                  <form method="POST" action="{{ route('teams.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="mb-3 col-md-6">
                                        <label class="form-label" for="">Team Name</label>
                                        <input type="text" name="name" class="form-control" id="" placeholder="League 1" required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="defaultSelect" class="form-label">Team Sport</label>
                                            <select name="sport" id="defaultSelect" class="form-select">
                                            <option>Select sport</option>
                                                <option value="Kickball">Kickball</option>
                                                <option value="Dodgeball">Dodgeball</option>
                                                <option value="Bowling">Bowling</option>
                                            </select>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Team Captain</label>
                                            <input type="text" name="captain" class="form-control" id="" placeholder="Captain name..." required>
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label class="form-label" for="">Division</label>
                                            <input type="text" name="division" class="form-control" id="" placeholder="A, B, C" required>
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
                  <th>Team Name</th>
                  <th>Team Sport</th>
                  <th>Team Captain</th>
                  <th>Division</th>
                  <th>Created</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($all_teams as $item)

                <tr>
                    <td>{{ $loop -> index + 1 }}</td>
                    <td><strong>{{ $item->name }}</strong></td>
                    <td>{{ $item->sport }}</td>                     
                    <td>{{ $item->captain }}</td>                     
                    <td>{{ $item->division }}</td>                                                            
                    {{-- <td><span class="badge bg-label-primary me-1">@if($item->role){{ $item->role->name }}@else No Role Assigned @endif</span></td>                      --}}
                    <td>{{ $item->created_at->diffForHumans() }}</td>
                    
                    <td>
                        <div class="dropdown">
                          <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                          <div class="dropdown-menu">
  
                            
                              <a class="dropdown-item" href="{{ route('teams.edit', $item->id) }}"><i class='bx bx-edit'></i> Edit</a>
                            
  
                            <form action="{{ route('teams.destroy', $item->id) }}" method="POST" class="delete-form">
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
                            No Teams Found
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