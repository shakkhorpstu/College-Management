@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <div class="row">
        @foreach ($students as $student)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <a>{{ $student->name }}</a>
                <h6>{{ 'Phone - '.$student->phone }}</h6>
                <h6>{{ 'Class - '.$student->class }}</h6>
                <h6>{{ 'Address - '.$student->address }}</h6>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection
