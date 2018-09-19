<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
  public static function attendance($studentId, $year, $subjectId)
  {
    $attendance = Attendance::where('student_id', $studentId)->where('year', 18)->where('subject_id', $subjectId)->first();
    if($attendance != null){
      return $attendance->attendance;
    }
    else{
      return 'Not yet Any Attendance';
    }
  }

  public static function check($studentId, $year, $subjectId)
  {
    $attendance = Attendance::where('student_id', $studentId)->where('year', 18)->where('subject_id', $subjectId)->count();
    return $attendance;
  }

  public static function percentage($subjectId, $studentId, $year)
  {
    $attendance = Attendance::where('subject_id', $subjectId)->where('student_id', $studentId)->where('year', 18)->first();
    if($attendance != null){
      return $attendance->percentage;
    }
    else{
      return "No mark added";
    }
  }

  public static function attendanceMark($subjectId, $studentId, $year)
  {
    $attendance = Attendance::where('subject_id', $subjectId)->where('student_id', $studentId)->where('year', 18)->first();
    if($attendance != null){
      return $attendance->attendance;
    }
    else{
      return "No mark added";
    }
  }

  public static function term($subjectId, $studentId, $year)
  {
    $attendance = Attendance::where('subject_id', $subjectId)->where('student_id', $studentId)->where('year', 18)->first();
    if($attendance != null){
      return $attendance->term;
    }
    else{
      return "No mark added";
    }
  }

  public static function totalAttendance($subjectId, $studentId, $year)
  {
    $attendance = Attendance::where('subject_id', $subjectId)->where('student_id', $studentId)->where('year', 18)->first();
    if($attendance != null){
      return $attendance->total_class;
    }
    else{
      return "No mark added";
    }
  }

  public static function attendClass($subjectId, $studentId, $year)
  {
    $attendance = Attendance::where('subject_id', $subjectId)->where('student_id', $studentId)->where('year', 18)->first();
    if($attendance != null){
      return $attendance->attend_class;
    }
    else{
      return "No mark added";
    }
  }    
}
