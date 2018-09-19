@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <div class="row">
        @foreach ($teachers as $teacher)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <h4>{{ $teacher->name }}</h4>
                <h6>{{ 'Phone - '.$teacher->phone }}</h6>
                <h6>{{ 'Subject - '.$teacher->subject->name }}</h6>
                <h6>{{ 'Address - '.$teacher->address }}</h6>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection
