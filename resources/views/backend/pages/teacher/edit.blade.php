@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Teacher</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="{{ route('admin.teacher.index') }}">Teacher</a></li>
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
            <h4>Teacher Information</h4>
          </div>

          <div class="">
            @include('backend.partials.message')

            <form class="" action="{{ route('admin.teacher.update', $teacher->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $teacher->name }}" required>
                </div>

                <div class="col-md-6 form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="email" value="{{ $teacher->email }}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="phone">Phone</label>
                  <input type="number" class="form-control" name="phone" id="phone" placeholder="phone" value="{{ $teacher->phone }}" required>
                </div>

                <div class="col-md-6 form-group">
                  <label for="address">Addtess</label>
                  <input type="text" class="form-control" name="address" id="address" placeholder="phone" value="{{ $teacher->address }}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="col-md-6 form-group">
                  <label for="department_id">Department</label>
                  <select class="form-control" id="department_id" name="department_id" required>
                    @foreach ($departments as $department)
                      <option value="{{ $department->id }}" {{ ($department->id == $teacher->department_id) ? 'selected' : '' }}>{{ $department->name }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="col-md-6 form-group">
                  <label for="subject_id">Subject</label>
                  <select class="form-control" id="subject_id" name="subject_id" required>
                    @foreach ($subjects as $subject)
                      <option value="{{ $subject->id }}" {{ ($subject->id == $teacher->subject_id) ? 'selected' : '' }}>{{ $subject->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label for="image">Image @if($teacher->image) <a href="{{ asset('public/images/teachers/'.$teacher->image) }}" target="_blank">See Image</a> @endif</label>
                <input type="file" class="form-control" name="image" id="image">
              </div>

              <button type="submit" class="btn btn-success">Submit</button>
            </form>
          </div><!-- end card-->
        </div>
      </div>
    </div>
  </div>

@endsection
