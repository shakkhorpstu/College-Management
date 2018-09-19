@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
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
    </div>
@endsection
