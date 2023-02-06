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
            <h5 class="card-header">Edit Role</h5>


            <form method="POST" action="{{ route('roles.update', $edit->id) }}" class="update-input">
              @csrf
              @method('PUT')
              <div class="mb-3 ">
                <label class="form-label" for="">Role Name</label>
                <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="" placeholder=""  required>
              </div>
              
              <label class="form-label" for="">Permissions</label>
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
                      
                  @endforelse
              <button type="submit" class="btn btn-primary mt-4">Update</button>
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
            <div class="col-md-4"><h5 class="card-header">All Roles</h5></div>
            <div class="col-md-4 pt-3 px-3">@include('validate')</div>
            <div class="col-md-4">
                <div class="d-flex flex-row-reverse">
                    <div class="pt-3 px-3">   
                      {{-- Create Permission button --}}
                      <a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('roles.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
                      
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createPermission">Create Role</button>
                      
                      {{-- Create Permission Modal --}}
                      <div class="modal fade" id="createPermission" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="modalCenterTitle">Create New Role</h5>
                              <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                              ></button>
                            </div>
                            
                            <div class="modal-body">
                              
                              {{-- Modal Input Group --}}
                                  <form method="POST" action="{{ route('roles.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                      <label class="form-label" for="">Role Name</label>
                                      <input type="text" name="name" class="form-control" id="" placeholder="" required>
                                    </div>
                                    
                                    <label class="form-label" for="">Permissions</label>
                                        @forelse ($permissions as $item)
                                        <div class="form-check">
                                            <input name="permissions[]" class="form-check-input" type="checkbox" value="{{ $item->name }}" id="defaultCheck3">
                                            <label class="form-check-label" for="defaultCheck3">
                                            {{ $item->name }}
                                            </label>
                                        </div>
                                        @empty
                                            
                                        @endforelse
                                    <button type="submit" class="btn btn-primary mt-4">Create</button>
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
                  <th>Role Name</th>
                  <th>Slug</th>
                  <th>Permissions</th>
                  <th>Created at</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody class="table-border-bottom-0">
                @forelse ($all_roles as $per)
                <tr>
                  <td>{{ $loop -> index + 1 }}</td>
                  <td><strong>{{ $per->name }}</strong></td>
                  <td>{{ $per->slug }}</td>   
                  <td>
                    @forelse (json_decode($per ->permissions) as $item)
                    
                    <span class="badge bg-label-primary me-1">
                        {{ $item }}
                    </span>

                    @empty  
                    <span class="badge bg-label-primary me-1">No Permission Added</span>
                    @endforelse
                    
                  </td>
                  <td>{{ $per->created_at->diffForHumans() }}</td>
                  
                  <td>
                      <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                        <div class="dropdown-menu">

                          
                            <a  class="dropdown-item" href="{{ route('roles.edit', $per->id) }}"><i class='bx bx-edit'></i> Edit</a>
                          

                          <form action="{{ route('roles.destroy', $per->id) }}" method="POST" class="delete-form">
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
                            No Roles Found
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