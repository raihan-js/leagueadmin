{{-- Import Modal --}}
<div class="modal fade" id="importmaster" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalCenterTitle">Import Master Schedule csv</h5>
            <button
            type="button"
            class="btn-close"
            data-bs-dismiss="modal"
            aria-label="Close"
            ></button>
        </div>
        
        <div class="modal-body">
            
            {{-- Modal Input Group --}}
                <form method="POST" action="{{ route('masterschedules.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col mb-3">
                    <label for="league_id" class="form-label">Select League:</label>
                        <select class="form-select" name="league_id" id="league_id">
                            @foreach ($leagues as $league)
                                <option value="{{ $league->id }}">{{ $league->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-3">
                    <div class="input-group">
                        <input name="import_file" type="file" class="form-control" id="importmaster" aria-describedby="importmasterschedule" aria-label="Upload">
                    </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-primary" id="importmasterschedule">Import</button>
                </div>
                </form>
            {{-- End Input Group --}}
        </div>                
        </div>
    </div>
</div>
{{-- End Import Modal --}}