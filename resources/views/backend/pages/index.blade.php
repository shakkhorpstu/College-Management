@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <h4>Teacher</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <h4>Staff</h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <h4>Student</h4>
        </div>
      </div>
    </div>
  </div>

  @if(Auth::user()->teacher_id != null)
    @php
      $subjects = \App\Helpers\CalculateHelper::teacherCourses(Auth::user()->teacher_id);
    @endphp
    <h2 class="mt-4">My Assigned Subjects</h2>
    @if($subjects)
      <div class="row">
        @foreach ($subjects as $subject)
          <div class="col-md-4 card dashboard-card">
            <div class="card-body">
              <a href="{!! route('admin.result.index', [$subject->subject_id, $subject->id]) !!}">{{ $subject->subject->name }}</a>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  @endif
@endsection
