@if( $errors -> any() )
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ $errors -> first() }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
  </div>
@endif

@if( Session::has('success') )
  <div class="alert alert-success alert-dismissible" role="alert">
    {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
  </div>
@endif

@if( Session::has('warning') )
  <div class="alert alert-warning alert-dismissible" role="alert">
    {{ Session::get('warning') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
  </div>
@endif

@if( Session::has('danger') )
  <div class="alert alert-danger alert-dismissible" role="alert">
    {{ Session::get('danger') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        </button>
  </div>
@endif

