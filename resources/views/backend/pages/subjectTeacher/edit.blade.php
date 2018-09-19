@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Subject Teacher</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.subjectTeacher.index') }}">Teacher's Subject</a></li>
          <li class="breadcrumb-item active">Edit</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="admin-page">
    <div class="col-md-6 offset-md-3">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="mb-3">
          <div class="">
            <h4>Course Information</h4>
          </div>

          <div class="">
            @include('backend.partials.message')

            <form class="" action="{{ route('admin.subjectTeacher.update', $courseTeacher->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="subject_id">Subject</label>
                <select class="form-control" id="subject_id" name="subject_id" required>
                  @foreach ($subjects as $subject)
                    <option value="{{ $subject->id }}" {{ ($subject->id == $courseTeacher->subject_id) ? 'selected' : '' }}>{{ $subject->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="teacher_id">Teacher</label>
                <select class="form-control" id="teacher_id" name="teacher_id" required>
                  @foreach ($teachers as $teacher)
                    <option value="{{ $teacher->id }}" {{ ($teacher->id == $courseTeacher->teacher_id) ? 'selected' : '' }}>{{ $teacher->name }}</option>
                  @endforeach
                </select>
              </div>

              <div class="form-group">
                <label for="file">Image</label>
                <input type="file" class="form-control" name="file" id="file">
              </div>

              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div><!-- end card-->
        </div>
      </div>
    </div>
  </div>

@endsection
