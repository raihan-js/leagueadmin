@extends('layouts.app')
@section('main')
  <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
    <div class="col-lg-12 col-md-12 col-12 mb-4">
      <div class="card">
        <div class="row">
          <div class="col-md-3">
            <h5 class="card-header">All Available Ump/Refs</h5>
          </div>
          <div class="col-md-9">
            <div class="d-flex justify-content-end">
              <div class="pt-3 px-3">
                <div class="row">
                  <div class="mb-3 col-md-4 d-flex">
                    <x-datetime-range-picker 
                      dateFilterName="datefilter" 
                      apiToCall="/available/ump" 
                      apiToCallVerb="get"
                      responseViewSlot="#filtered-view" 
                      style=""
                    />
                </div>
              </div>
            </div>
          </div>
        </div>                
        </div>
        <div id="filtered-view">
          @include('pages.availability.ump.table')
        </div>
    </div>
    </div>
  </div>
@endsection