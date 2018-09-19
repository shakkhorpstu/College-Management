@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Attendance</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Attendnace</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  @php
    $subject = \App\Models\Subject::find($subjectId);
  @endphp

  <h4 class="text-success mb-2">{{ $subject->name.' Marks' }}</h4>

  <div class="row">
    @foreach ($students as $student)
      <div class="col-md-4">
        <div class="card">
          <div class="card-header">
            <h4>Roll - {{ $student->roll }}</h4>
            @if(\App\Models\Attendance::check($student->id, date('y'), $subjectId) <= 0)
              <form action="{{ route('submitAttedance') }}" method="post">
                @csrf
                <div class="form-row">
                  <div class="form-group">
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <input type="hidden" name="subject_id" value="{{ $subjectId }}">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="total" value="" placeholder="Total Attendance">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="attendance" value="" placeholder="Student Attendance">
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" name="term" value="" placeholder="Term eg. 1 or 2">
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Submit</button>
              </form>
            @else
              <h5>Marks - {{ \App\Models\Attendance::attendance($student->id, date('y'), $subjectId) }}</h5>
            @endif
          </div>
        </div>
      </div>
    @endforeach
  </div>

@endsection
