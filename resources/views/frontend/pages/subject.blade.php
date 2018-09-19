@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <div class="row">
        @foreach ($subjects as $subject)
          <div class="col-md-4">
            <div class="card">
              <div class="card-body">
                <a href="{{ route('subject.teacher', $subject->slug) }}" class="text-center">{{ $subject->name }}</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
@endsection
