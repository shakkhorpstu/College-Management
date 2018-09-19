@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <div class="row">
          <table class="table">
          	<h3>Class - {{ $student->class }},   Roll - {{ $student->roll }}</h3>
          	<thead>
              <th>Subject</th>
              <th>Term</th>
              <th>Total Class</th>
          		<th>Attend Class</th>
          		<th>Attendnace %</th>
          		<th>Mark</th>
          	</thead>
          	<tbody>
          		@foreach ($subjects as $subject)
          		<tr>
                <td>{{ $subject->name }}</td>
                <td>{{ \App\Models\Attendance::term($subject->id, $studentId, 18) }}</td>
                <td>{{ \App\Models\Attendance::totalAttendance($subject->id, $studentId, 18) }}</td>
                <td>{{ \App\Models\Attendance::attendClass($subject->id, $studentId, 18) }}</td>
          			<td>{{ \App\Models\Attendance::percentage($subject->id, $studentId, 18) }}</td>
          			<td>{{ \App\Models\Attendance::attendanceMark($subject->id, $studentId, 18) }}</td>
          		</tr>
          		@endforeach
          	</tbody>
          </table>
      </div>
    </div>
@endsection