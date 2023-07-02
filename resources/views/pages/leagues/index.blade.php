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
                          <option value="Kickball" @if ($edit->type == 'Kickball') selected @endif>Kickball</option>
                          <option value="Dodgeball" @if ($edit->type == 'Dodgeball') selected @endif>Dodgeball</option>
                          <option value="Bowling" @if ($edit->type == 'Bowling') selected @endif>Bowling</option>
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
                      <label for="primary_admin" class="form-label">Ump/Ref</label>
                      <select name="primary_admin" id="primary_admin" class="form-select">
                      <option>Select Ump/Ref</option>

                          @foreach($admins as $admin)
                          @if ($admin->email !== 'admin@leagueadmin.net')
                              <option value="{{ $admin->id }}" {{ $edit->admins->where('pivot.role', 'primary')->pluck('id')->contains($admin->id) ? 'selected' : '' }}>{{ $admin->name }}</option>
                          @endif
                          @endforeach

                      </select>
                  </div>
                  
                  <div class="mb-3 col-md-6">
                      <label for="secondary_admin" class="form-label">Secondary Ump/Ref</label>
                      <select name="secondary_admin" id="secondary_admin" class="form-select">
                      <option>Select Secondary Ump/Ref</option>
                      
                      @foreach($admins as $admin)
                          @if ($admin->email !== 'admin@leagueadmin.net')
                              <option value="{{ $admin->id }}" {{ $edit->admins->where('pivot.role', 'secondary')->pluck('id')->contains($admin->id) ? 'selected' : '' }}>{{ $admin->name }}</option>
                          @endif
                          @endforeach

                      </select>
                  </div>
                  
                  
              </div>
                <button type="submit" class="btn btn-primary mt-4">Update League</button>
              </form>
  
  
              
            </div>
            
            
          </div>
  
        </div>
      </div>
    </div>
        
    @endif


    <div class="row">
      <div class="col-md-4" style="padding-left: 0px"><h5 class="card-header">All Leagues</h5></div>
      <div class="col-md-4">@include('validate')</div>
      <div class="col-md-4">
          <div class="d-flex flex-row-reverse">
              <div class="pt-3 pb-3">   
                {{-- Create User button --}}
                <a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('leagues.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
                
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
                                    <label for="primary_admin">Ump/Ref</label>
                                    <select name="primary_admin" class="form-control" id="primary_admin" required>
                                      <option value="">--- Select ---</option>
                                        @foreach($admins as $admin)
                                        @if ($admin->email !== 'admin@leagueadmin.net')
                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="secondary_admin">Secondary Ump/Ref</label>
                                    <select name="secondary_admin" class="form-control" id="secondary_admin" required>
                                      <option value="">--- Select ---</option>
                                        @foreach($admins as $admin)
                                        @if ($admin->email !== 'admin@leagueadmin.net')
                                            <option value="{{ $admin->id }}">{{ $admin->name }}</option>
                                        @endif
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

    <div class="row mb-5">
      @forelse($leagues as $item)
      <div class="col-md-6 col-lg-4">
        <div class="card  mb-3">
          <div class="card-body">
            <div class="card-title text-center d-flex align-items-start justify-content-between">
              <h4>{{ $item->title }}</h4>
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
            </div>
            <p><strong>Type:</strong> {{ $item->type }}</p>
            <p class="card-text"><strong>Start Date:</strong> {{ $item->start_date }}</p>
            <p class="card-text"><strong>Weeks:</strong> {{ $item->weeks }}</p>
            <p class="card-text"><strong>Primary Ump/Ref:</strong> {{ $item->admins()->wherePivot('role', 'primary')->first()->name }}</p>
            <p class="card-text"><strong>Secondary Ump/Ref:</strong> {{ $item->admins()->wherePivot('role', 'secondary')->first()->name }}</p>
            <p class="card-text">{{ $item->created_at->diffForHumans() }}</p>
            <a href="{{ route('leagues.show', $item->id) }}" class="btn rounded-pill btn-icon btn-outline-primary"><i class='bx bx-right-arrow-alt'></i></a>
          </div>
        </div>
      </div>
      
        @empty
        <p>Nothing</p>
        @endforelse
    </div>
    {{ $leagues->links() }}
    

    {{-- Table row --}}

    {{-- End Table row --}}


  
    

   
    
    
  </div>
  <!-- / Content -->

@endsection