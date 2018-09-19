<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\ImageUploadHelper;
use App\Models\Teacher;
use App\Models\Department;
use App\Models\Admin;
use App\Models\Subject;
use Session;
use Hash;

class TeacherController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $teachers = Teacher::orderBy('id', 'DESC')->get();
    return view('backend.pages.teacher.index', compact('teachers'));
  }


  public function create()
  {
    $departments = Department::orderBy('name', 'ASC')->get();
    $subjects = Subject::orderBy('name', 'ASC')->get();
    return view('backend.pages.teacher.create', compact('departments', 'subjects'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|unique:teachers',
      'phone' => 'required|unique:teachers',
      'department_id' => 'required',
      'subject_id' => 'required',
      'address' => 'required',
    ]);

    $teacher = new Teacher();
    $teacher->name = $request->name;
    $teacher->email = $request->email;
    $teacher->phone = $request->phone;
    $teacher->department_id = $request->department_id;
    $teacher->subject_id = $request->subject_id;
    $teacher->address = $request->address;
    $teacher->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/teachers');
    $teacher->save();

    $admin = new Admin();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->teacher_id = $teacher->id;
    $admin->password = Hash::make('123456');
    $admin->save();

    session()->flash('success', 'Teacher added successfully');
    return redirect()->route('admin.teacher.index');
  }


  public function show($id)
  {
    //
  }


  public function edit($id)
  {
    $departments = Department::orderBy('name', 'ASC')->get();
    $subjects = Subject::orderBy('name', 'ASC')->get();
    $teacher = Teacher::find($id);
    return view('backend.pages.teacher.edit', compact('departments', 'subjects', 'teacher'));
  }


  public function update(Request $request, $id)
  {
    $teacher = Teacher::find($id);
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|unique:teachers,email,'.$teacher->id,
      'phone' => 'required|unique:teachers,phone,'.$teacher->id,
      'department_id' => 'required',
      'subject_id' => 'required',
      'address' => 'required',
    ]);

    $teacher->name = $request->name;
    $teacher->email = $request->email;
    $teacher->phone = $request->phone;
    $teacher->department_id = $request->department_id;
    $teacher->subject_id = $request->subject_id;
    $teacher->address = $request->address;
    if($request->image != null){
      if($teacher->image){
        $teacher->image = ImageUploadHelper::update('image', $request->file('image'), time(), 'public/images/teachers', $teacher->image);
      }
      else{
        $teacher->image = ImageUploadHelper::upload('image', $request->file('image'), time(), 'public/images/teachers');
      }
    }
    $teacher->save();

    $admin = Admin::where('teacher_id', $teacher->id)->first();
    $admin->name = $request->name;
    $admin->email = $request->email;
    $admin->save();

    session()->flash('success', 'Teacher updated successfully');
    return redirect()->route('admin.teacher.index');
  }


  public function destroy($id)
  {
    $teacher = Teacher::find($id);
    if($teacher->image){
      ImageUploadHelper::delete('public/images/teachers/'.$teacher->image);
    }
    Admin::where('email', $teacher->email)->delete();
    $teacher->delete();

    session()->flash('success', 'Teacher updated successfully');
    return redirect()->route('admin.teacher.index');
  }
}
