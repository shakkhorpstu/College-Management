<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Result;
use App\Models\Student;

class ResultsController extends Controller
{
  public function list()
  {
    return view('frontend.pages.result.list');
  }


  public function listTerm($class, $term)
  {
    $students = Student::orderBy('id', 'DESC')->get();
    return view('frontend.pages.result.termList', compact('students', 'class', 'term'));
  }


  public function fullList($studentID, $class, $term)
  {
    $results = Result::where('student_id', $studentID)->where('class', $class)->where('term', $term)->get();
    return view('frontend.pages.result.fullList', compact('results'));
  }
}
