<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Helpers\CalculateHelper;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Result;
use Session;
use Auth;
use File;
use Excel;

class ResultsController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }

  public function index($subjectID, $id)
  {
    $subject = Subject::find($subjectID);
    $results = Result::where('teacher_id', Auth::user()->teacher_id)->where('subject_id', $subjectID)->get();
    return view('backend.pages.result.index', compact('subject', 'subjectID', 'id', 'results'));
  }

  public function update(Request $request, $subjectID)
  {
    $this->validate($request, [
      'mid' => 'required',
      'attendence' => 'required',
      'assignment' => 'required',
      'marks' => 'required',
      'roll' => 'required',
    ]);

    $subject = Subject::find($subjectID);
    $student = Student::where('roll', $request->roll)->where('class', $subject->class)->first();

    Result::where('student_id', $student->id)
    ->where('class', $student->class)
    ->where('term', $student->term)
    ->where('subject_id', $subjectID)
    ->where('status', 1)
    ->delete();

    $result = Result::find($request->row);
    $result->mid = $request->mid;
    $result->attendence = $request->attendence;
    $result->assignment = $request->assignment;
    $result->marks = $request->marks;
    $result->student_id = $student->id;
    $result->save();

    return back();
  }

  public function upload(Request $request, $subjectID)
  {
    $this->validate($request, [
      'file' => 'required',
    ]);

    if($request->hasFile('file')){
      $extension = File::extension($request->file->getClientOriginalName());
      if ($extension == "xlsx" || $extension == "xls" || $extension == "csv") {

        $path = $request->file->getRealPath();

        $data = Excel::load($path, function($reader) {
        })->get();

        if(!empty($data) && $data->count()){

          foreach ($data as $key => $value) {

            // check each excel column is fillable or not for each row
            if(!is_null($value->roll) && !is_null($value->mid) && !is_null($value->attendance) && !is_null($value->assignment) && !is_null($value->final)){
              $subject = Subject::find($subjectID);
              $student = Student::where('roll', $value->roll)->where('class', $subject->class)->first();

              Result::where('student_id', $student->id)
              ->where('class', $student->class)
              ->where('term', $student->term)
              ->where('subject_id', $subjectID)
              ->where('status', 1)
              ->delete();

              // keep this row value in a array
              if($student){
                $insert[] = [
                  'student_id' => $student->id,
                  'subject_id' => $subjectID,
                  'teacher_id' => Auth::user()->teacher_id,
                  'mid' => $value->mid,
                  'attendence' => $value->attendance,
                  'assignment' => $value->assignment,
                  'marks' => $value->final,
                  'class' => $student->class,
                  'term' => $student->term
                ];
              }
            }
          }

          //check array is empty or not
          if(!empty($insert)){
            // insert to courses table
            DB::table('results')->insert($insert);
            return back();
          }
        }
      }
      else {
        Session::flash('error', 'File is a '.$extension.' file.!! Please upload a valid xls/csv file..!!');
        return back();
      }
    }
  }


  public function publishResult()
  {
    $students = Student::all();

    foreach ($students as $student) {
      $results = Result::where('student_id', $student->id)
      ->where('class', $student->class)
      ->where('term', $student->term)
      ->where('status', 0)
      ->get();

      if(count($results) > 0){
        $passedAll = 1;
        foreach ($results as $result) {
          $total = $result->mid + $result->marks + $result->attendence + $result->assignment;
          if($total < 33){
            $passedAll = 0;
          }
        }

        if($passedAll == 1){
          CalculateHelper::updateClass($student->id, $student->class, $student->term);
        }
        else{
          Result::where('student_id', $student->id)->where('class', $student->class)->where('term', $student->term)->update(['status' => 1]);
        }
      }
    }

    return back();
  }


  public function list()
  {
    return view('backend.pages.result.list');
  }


  public function listTerm($class, $term)
  {
    $students = Student::orderBy('id', 'DESC')->get();
    return view('backend.pages.result.termList', compact('students', 'class', 'term'));
  }


  public function fullList($studentID, $class, $term)
  {
    $results = Result::where('student_id', $studentID)->where('class', $class)->where('term', $term)->get();
    return view('backend.pages.result.fullList', compact('results'));
  }
}
