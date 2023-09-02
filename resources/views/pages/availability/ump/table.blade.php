<div class="table-responsive text-nowrap pt-2">
    <table class="table">
      <thead>
        <tr>
          <th>SN</th>
          <th>Title</th>
          <th>Home Team</th>
          <th>Away Team</th>
          <th>Date</th>
          <th>Time</th>
          <th>Location</th>
          <th>Sub Location</th>
          <th>Created</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($master as $item)

        <tr>
            <td>{{ $loop -> index + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td><strong>{{ $item->homeTeam->name }}</strong></td>
            <td>{{ $item->awayTeam->name }}</td>                     
            <td><span class="badge rounded-pill bg-warning text-dark c-font">{{ $item->date }}</span></td>                     
            <td><span class="badge rounded-pill bg-info text-dark c-font">{{ $item->time }}</span></td>                                                            
            <td>{{ $item->location }}</td>                                                            
            <td>{{ $item->sub_location }}</td>                                                            
            {{-- <td><span class="badge bg-label-primary me-1">@if($item->role){{ $item->role->name }}@else No Role Assigned @endif</span></td>                      --}}
            <td>{{ $item->created_at->diffForHumans() }}</td>
            
            <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                  <div class="dropdown-menu">

                    
                      <a class="dropdown-item" href="{{ route('masterschedules.edit', $item->id) }}"><i class='bx bx-edit'></i> Edit</a>
                    

                    <form action="{{ route('masterschedules.destroy', $item->id) }}" method="POST" class="delete-form">
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
                    No Ump/Ref Available
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
