<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Subject;
use App\Models\Student;
use Session;

class AttendanceController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $subjects = Subject::distinct()->get(['name', 'id']);
    return view('backend.pages.attendance.index', compact('subjects'));
  }


  public function subject($subjectId)
  {
    $subjects = Subject::distinct()->get(['class']);
    return view('backend.pages.attendance.subject', compact('subjects', 'subjectId'));
  }


  public function studentList($class, $subjectId)
  {
    $students = Student::where('class', $class)->get();
    return view('backend.pages.attendance.studentList', compact('students', 'subjectId'));
  }


  public function submitAttendance(Request $request)
  {
    $this->validate($request, [
      'total' => 'required',
      'attendance' => 'required',
      'term' => 'required',
    ]);

    $attendance = new Attendance();
    $total = $request->total;
    $thisStudent = $request->attendance;
   $calculattedAttentance = (100 * $thisStudent) / $total;

    if($calculattedAttentance < 59){
      $attendance->attendance = 0;
    }
    elseif($calculattedAttentance < 70 && $calculattedAttentance > 59){
      $attendance->attendance = 7;
    }
    elseif($calculattedAttentance < 80 && $calculattedAttentance > 69){
      $attendance->attendance = 8;
    }
    elseif($calculattedAttentance < 90 && $calculattedAttentance > 79){
      $attendance->attendance = 9;
    }
    else{
     $attendance->attendance = 10;
    }

 


    $attendance->term = $request->term;
    $attendance->student_id = $request->student_id;
    $attendance->subject_id = $request->subject_id;
    $attendance->year = date('y');
    $attendance->percentage = $calculattedAttentance;
    $attendance->total_class = $request->total;
    $attendance->attend_class = $request->attendance;
    $attendance->save();

    session()->flash('success', 'Successfully Submitted');
    return back();
  }
}
