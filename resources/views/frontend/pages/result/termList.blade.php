@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <table class="table">
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
                <td><a href="{!! route('student.result.fullList', [$student->id, $class, $term]) !!}" class="btn btn-success btn-sm">View</a></td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </table>
    </div>
@endsection
