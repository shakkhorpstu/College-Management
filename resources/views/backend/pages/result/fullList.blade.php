@extends('backend.layouts.master')

@section('content')
  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Dashboard</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item active">Full Result</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

  <div class="row mb-4">
    <h4>GPA </h4><span class="badge badge-primary ml-2">{{ \App\Helpers\CalculateHelper::totalGrade($results) }}</span>
  </div>
  
  <table class="table">
    <thead>
      <th>Subject</th>
      <th>Mid</th>
      <th>Assignment</th>
      <th>Atendance</th>
      <th>Final</th>
      <th>Grade</th>
    </thead>
    <tbody>
      @foreach ($results as $result)
        <tr>
          <td>{{ $result->subject->name }}</td>
          <td>{{ $result->mid }}</td>
          <td>{{ $result->assignment }}</td>
          <td>{{ $result->attendence }}</td>
          <td>{{ $result->marks }}</td>
          <td>{{ \App\Helpers\CalculateHelper::grade($result->mid, $result->attendence, $result->assignment, $result->marks) }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

@endsection
