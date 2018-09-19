<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\UploadHelper;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\SubjectTeacher;

class SubjectTeacherController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $subjectTeachers = SubjectTeacher::orderBy('id', 'DESC')->get();
    return view('backend.pages.subjectTeacher.index', compact('subjectTeachers'));
  }


  public function create()
  {
    $subjects = Subject::orderBy('name', 'DESC')->get();
    $teachers = Teacher::orderBy('name', 'DESC')->get();
    return view('backend.pages.subjectTeacher.create', compact('subjects', 'teachers'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'subject_id' => 'required',
      'teacher_id' => 'required',
    ]);

    $courseTeacher = new SubjectTeacher();
    $courseTeacher->subject_id = $request->subject_id;
    $courseTeacher->teacher_id = $request->teacher_id;
    $courseTeacher->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files');
    $courseTeacher->save();

    session()->flash('success', 'Course Teacher added successfully');
    return redirect()->route('admin.subjectTeacher.index');
  }


  public function show($id)
  {
    //
  }


  public function edit($id)
  {
    $subjects = Subject::orderBy('name', 'DESC')->get();
    $teachers = Teacher::orderBy('name', 'DESC')->get();
    $courseTeacher = SubjectTeacher::find($id);
    return view('backend.pages.subjectTeacher.edit', compact('subjects', 'teachers', 'courseTeacher'));
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'subject_id' => 'required',
      'teacher_id' => 'required',
    ]);

    $courseTeacher = SubjectTeacher::find($id);
    $courseTeacher->subject_id = $request->subject_id;
    $courseTeacher->teacher_id = $request->teacher_id;
    if($request->file != null){
      if($courseTeacher->file){
        $courseTeacher->file = UploadHelper::update('file', $request->file('file'), time(), 'public/files', $courseTeacher->file);
      }
    else{
      $courseTeacher->file = UploadHelper::upload('file', $request->file('file'), time(), 'public/files');
    }
    }
    $courseTeacher->save();

    session()->flash('success', 'Course Teacher updated successfully');
    return redirect()->route('admin.subjectTeacher.index');
  }


  public function destroy($id)
  {
    $courseTeacher = SubjectTeacher::find($id);
    if($courseTeacher->file){
      UploadHelper::delete('public/files/'.$courseTeacher->file);
    }
    $courseTeacher->delete();

    session()->flash('success', 'Course Teacher updated successfully');
    return redirect()->route('admin.subjectTeacher.index');
  }
}
