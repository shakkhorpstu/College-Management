@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <div class="row">
        @foreach ($staffs as $staff)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h4>{{ $staff->name }}</h4>
                <h6>{{ 'Phone - '.$staff->phone }}</h6>
                <h6>{{ 'Address - '.$staff->address }}</h6>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection
