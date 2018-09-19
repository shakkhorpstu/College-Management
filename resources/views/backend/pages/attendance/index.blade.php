@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Attendance</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Attendance</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="row">
    @foreach ($subjects as $subject)
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <a href="{{ route('admin.attendance.subject', $subject->id) }}">{{ $subject->name }}</a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

@endsection
