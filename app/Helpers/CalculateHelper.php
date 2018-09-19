<?php

namespace App\Helpers;

use App\Models\Student;
use App\Models\SubjectTeacher;
use App\Models\Result;
use Request;

class CalculateHelper
{
  public static function teacherCourses($teacherID)
  {
    $subjects = SubjectTeacher::where('teacher_id', $teacherID)->get();
    return $subjects;
  }


  public static function updateClass($studentID, $class, $term)
  {
    if($class == 11){
      if($term == 1){
        $term = 2;
      }
      elseif($term == 2) {
        $term = 3;
      }
      else{
        $class = 12;
        $term = 1;
      }
    }
    else{
      if($term == 1){
        $term = 2;
      }
      else{
        Result::where('student_id', $studentID)->update(['status' => 1]);
        Student::where('id', $studentID)->update(['complete' => 1]);
      }
    }

    $updateInfo = array(
      'class' => $class,
      'term' => $term
    );

    $student = Student::find($studentID);
    $student->class = $class;
    $student->term = $term;
    $student->save();
  }


  public static function checkPass($studentID, $class, $term)
  {
    if($class == 11){
      if($term == 1){
        $class = 11;
        $term = 1;
      }
      elseif($term == 2) {
        $class = 11;
        $term = 1;
      }
      else{
        $class = 11;
        $term = 2;
      }
    }
    else{
      if($term == 1){
        $class = 11;
        $term = 3;
      }
      else{
        $class = 12;
        $term = 1;
      }
    }

    $results = Result::where('student_id', $studentID)->where('class', $class)->where('term', $term)->where('status', 0)->get();
    $passedAll = 1;
    foreach ($results as $result) {
      $total = $result->mid + $result->marks + $result->attendence + $result->assignment;
      if($total < 33){
        $passedAll = 0;
      }
    }

    if($passedAll == 1){
      return "Passed";
    }
    else{
      return "Failed";
    }
  }


  public static function grade($mid, $attendence, $assignment, $final)
  {
    $total = $mid + $attendence + $assignment + $final;

    if($total < 33){
      return "F";
    }
    elseif ($total >= 80) {
      return "A+";
    }
    elseif ($total >= 70 && $total <= 79) {
      return "A";
    }
    elseif ($total >= 60 && $total <= 69) {
      return "A-";
    }
    elseif ($total >= 50 && $total <= 59) {
      return "B";
    }
    elseif ($total >= 40 && $total <= 49) {
      return "C";
    }
    else{
      return "D";
    }
  }


  public static function totalGrade($results)
  {
    $grade = 0;
    $subject = count($results);
    foreach ($results as $result) {
      $total = $result->mid + $result->attendence + $result->assignment + $result->marks;
      $grade += CalculateHelper::letterGrade($total);
    }

    $grade = @($grade / $subject);
    return $grade;
  }


  public static function letterGrade($total)
  {
    if($total < 33){
      return 0;
    }
    elseif ($total >= 80) {
      return 5;
    }
    elseif ($total >= 70 && $total <= 79) {
      return 4;
    }
    elseif ($total >= 60 && $total <= 69) {
      return 3.5;
    }
    elseif ($total >= 50 && $total <= 59) {
      return 3;
    }
    elseif ($total >= 40 && $total <= 49) {
      return 2.5;
    }
    else{
      return 2;
    }
  }
}
