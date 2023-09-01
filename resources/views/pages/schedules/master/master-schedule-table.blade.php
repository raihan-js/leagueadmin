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
          <th>Ump/Ref</th>
          <th>Created</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        @forelse ($master as $item)
        {{-- <pre> {{ $item }}</pre> --}}
        <tr>
            <td>{{ $loop -> index + 1 }}</td>
            <td>{{ $item->title }}</td>
            <td><strong>{{ $item->homeTeam->name }}</strong></td>
            <td>{{ $item->awayTeam->name }}</td>                     
            <td><span class="badge rounded-pill bg-warning text-dark c-font">{{ $item->date }}</span></td>                     
            <td><span class="badge rounded-pill bg-info text-dark c-font">{{ $item->time }}</span></td>                                                            
            <td>{{ $item->location }}</td>                                                            
            <td>{{ $item->sub_location }}</td> 
            <td>
              @if (sizeof($item->referees) > 0)
              <div class="referee" style=":hover {cursor: pointer;}">
                <a href="#" class="open-referee-modal" data-bs-toggle="modal" data-bs-target="#refereeModal" data-id="{{ $item->id }}" data-referee="{{ json_encode($item->referees) }}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path fill="#3B71CA" d="M93.75 81.443c-5.38 0-12.368 2.49-22.358 8.967c3.966 4.682 8.167 9.687 16.47 19.256c5.782 6.663 11.618 13.29 16.026 18.088c.038.042.055.055.092.096l30.894-17.932l-14.652-14.148c-11.292-9.404-18.644-13.866-25.418-14.293a16.554 16.554 0 0 0-1.055-.034zm120.08 15.082a89.446 89.446 0 0 0-2.643.01c-10.46.193-20.2 2.23-26.742 5.424l-67.262 39.038c2.45.544 4.885 1.196 7.287 2.02c17.275 5.923 33.093 18.223 49.568 34.7l216.44 213.5l80.978-44.433L258.54 111.38c-8.656-7.84-22.49-12.908-36.693-14.394a86.624 86.624 0 0 0-8.018-.46zM58.192 102.74c-17.543 20.723-20.57 37.186-15.326 57.004c.692 2.618 3.057 6.357 6.373 10.47a182.968 182.968 0 0 1 7.086-9.478c3.99-4.995 8.385-9.183 13.085-12.558l-.106-.2l2.768-1.61a56.414 56.414 0 0 1 4.13-2.393l11.868-6.89a1048.196 1048.196 0 0 1-13.803-15.622a2604.997 2604.997 0 0 1-16.074-18.723zm184.093 13.438l58.415 61.67c-46.086-5.037-56.79 13.2-69.027 34.2l-57.334-59.304l67.946-36.566zM103.702 157.23a45.332 45.332 0 0 0-2.15.002c-6.976.18-14.207 2.058-22.252 5.885c-3.035 2.29-5.99 5.196-8.91 8.852c-25.77 32.264-30.45 59.135-25.484 83.477c4.965 24.343 20.536 46.656 37.916 66.455c13.314 15.168 28.86 23.992 48.472 27.93c19.614 3.94 43.438 2.708 71.98-3.475c33.246-7.2 66.01 8.42 95.81 27.665c26.118 16.868 50.676 37.09 70.98 49.95l8.79-18.935l-217.52-214.57l-.022-.022c-15.524-15.524-29.565-25.905-42.682-30.402c-5.02-1.722-9.925-2.695-14.928-2.813zm367.08 210.456l-73.45 40.304l-10.48 22.567l70.833-38.41l13.096-24.46z"/></svg>
                </a>
              </div>
                @else
              <div class="referee">
                {{-- <a href="#" class="open-referee-modal" data-bs-toggle="modal" data-bs-target="#refereeModal" data-id="{{ $item->id }}" data-referee="{{ json_encode($item->referees) }}"> --}}
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path fill="gray" d="M93.75 81.443c-5.38 0-12.368 2.49-22.358 8.967c3.966 4.682 8.167 9.687 16.47 19.256c5.782 6.663 11.618 13.29 16.026 18.088c.038.042.055.055.092.096l30.894-17.932l-14.652-14.148c-11.292-9.404-18.644-13.866-25.418-14.293a16.554 16.554 0 0 0-1.055-.034zm120.08 15.082a89.446 89.446 0 0 0-2.643.01c-10.46.193-20.2 2.23-26.742 5.424l-67.262 39.038c2.45.544 4.885 1.196 7.287 2.02c17.275 5.923 33.093 18.223 49.568 34.7l216.44 213.5l80.978-44.433L258.54 111.38c-8.656-7.84-22.49-12.908-36.693-14.394a86.624 86.624 0 0 0-8.018-.46zM58.192 102.74c-17.543 20.723-20.57 37.186-15.326 57.004c.692 2.618 3.057 6.357 6.373 10.47a182.968 182.968 0 0 1 7.086-9.478c3.99-4.995 8.385-9.183 13.085-12.558l-.106-.2l2.768-1.61a56.414 56.414 0 0 1 4.13-2.393l11.868-6.89a1048.196 1048.196 0 0 1-13.803-15.622a2604.997 2604.997 0 0 1-16.074-18.723zm184.093 13.438l58.415 61.67c-46.086-5.037-56.79 13.2-69.027 34.2l-57.334-59.304l67.946-36.566zM103.702 157.23a45.332 45.332 0 0 0-2.15.002c-6.976.18-14.207 2.058-22.252 5.885c-3.035 2.29-5.99 5.196-8.91 8.852c-25.77 32.264-30.45 59.135-25.484 83.477c4.965 24.343 20.536 46.656 37.916 66.455c13.314 15.168 28.86 23.992 48.472 27.93c19.614 3.94 43.438 2.708 71.98-3.475c33.246-7.2 66.01 8.42 95.81 27.665c26.118 16.868 50.676 37.09 70.98 49.95l8.79-18.935l-217.52-214.57l-.022-.022c-15.524-15.524-29.565-25.905-42.682-30.402c-5.02-1.722-9.925-2.695-14.928-2.813zm367.08 210.456l-73.45 40.304l-10.48 22.567l70.833-38.41l13.096-24.46z"/></svg>
                {{-- </a> --}}
              </div>
              @endif
            </td>
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
                    No Master Schedules Found
                  </div>
                </td>
                
              </tr>
              
            </tbody>
          </table>
        </div>
        @endforelse
        @include('pages.schedules.master.referee-modal')
        
      </tbody>
    </table>
  </div>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
  <script>
    $(document).ready(function () {
        $('.open-referee-modal').click(function () {
            var masterScheduleId = $(this).data('id');

            $.ajax({
                url: '/masterschedules/' + masterScheduleId,
                type: 'GET',
                success: function (data) {
                    $('#referee-modal-body').html(data);
                },
                error: function () {
                    alert('Failed to load referee information.');
                }
            });
        });
    });
</script>