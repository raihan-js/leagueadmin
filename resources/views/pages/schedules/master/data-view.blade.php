@if ($type=='edit')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-12 mb-4">
			<div class="card">
				<div class="row">
					<div class="col-md-12">
						<h5 class="card-header">Edit Master Schedule</h5>
						<div class="col-md-12 pt-3 px-3">@include('validate')</div>
						@include('pages.schedules.master.master-schedule-form')
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
				<div class="col-md-3"><h5 class="card-header">All Master Schedules</h5></div>
				<div class="col-md-5 pt-3 px-3">
					@if ($type != 'edit')
						@include('validate')
					@endif
				</div>
				<div class="col-md-4">
						<div class="d-flex flex-row-reverse">
								<div class="pt-3 px-3">   
									{{-- Create master schedule button --}}
									<a  data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="left" data-bs-html="true" title="" data-bs-original-title="<i class='bx bx-refresh bx-xs' ></i> <span>Refresh Data</span>" class="d-inline px-3" href="{{ route('masterschedules.index')}}"><i class='bx bx-refresh refresh-icon' style="font-size: 24px"></i></a>
									<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createUser">Create Master Schedule</button>
									<button style="margin-left: 7px" type="button" class="btn btn-icon btn-outline-info" data-bs-toggle="modal" data-bs-target="#importmaster"><i class='bx bx-import'></i></button>
									@include('pages.schedules.master.import-modal')
									@include('pages.schedules.master.create-modal')
						</div>
				</div>
			</div>
			@include('pages.schedules.master.master-schedule-table')
		</div>
	</div>
</div>
