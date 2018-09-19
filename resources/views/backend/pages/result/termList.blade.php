@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Subject</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Result</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Result</span>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Name</th>
                <th>Roll</th>
                <th>Result</th>
                <th>More</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($students as $student)
                <tr>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->roll }}</td>
                  <td>{{ \App\Helpers\CalculateHelper::checkPass($student->id, $class, $term) }}</td>
                  <td><a href="{!! route('admin.result.fullList', [$student->id, $class, $term]) !!}" class="btn btn-success btn-sm">View</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div><!-- end card-->
    </div>
  </div>

  @endsection
