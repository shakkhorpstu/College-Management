@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Result</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <a class="btn btn-success mb-4" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    Upload Excel Result File
  </a>
  <div class="collapse" id="collapseExample">
    <p class="text-info mt-3 mb-3"><i class="fa fa-info-circle"></i>
      Only excel file is allowed
    </p>
    <form action="{!! route('admin.result.uploadExcel', $subject->id) !!}" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="file" class="form-control" required>
      <input type="submit" class="mt-2 mb-2 btn btn-success">
    </form>
  </div>


  <table class="table">
    <thead>
      <th>Name</th>
      <th>Roll</th>
      <th>Mid</th>
      <th>Atendance</th>
      <th>Assignment</th>
      <th>Final</th>
      <th>Action</th>
    </thead>
    <tbody>
      @foreach ($results as $result)
        <tr>
          <form action="{!! route('admin.result.update', $subjectID) !!}" method="post">
            @csrf
            <td>{{ $result->student->name }}</td>
            <td><input type="text" class="form-control" name="roll" value="{{ $result->student->roll }}" required></td>
            <td><input type="text" class="form-control" name="mid" value="{{ $result->mid }}" required></td>
            <td><input type="text" class="form-control" name="attendence" value="{{ $result->attendence }}" required></td>
            <td><input type="text" class="form-control" name="assignment" value="{{ $result->assignment }}" required></td>
            <td><input type="text" class="form-control" name="marks" value="{{ $result->marks }}" required></td>
            <td><input type="hidden" class="form-control" name="row" value="{{ $result->id }}" required></td>
            <td><button type="submit" class="btn btn-success btn-sm">Update</button></td>
          </form>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
