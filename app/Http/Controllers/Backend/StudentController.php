<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Models\Student;

class StudentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $students = Student::orderBy('class', 'DESC')->get();
    return view('backend.pages.student.index', compact('students'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'roll' => 'required',
      'class' => 'required',
      'address' => 'required',
      'phone' => 'required',
    ]);

    $student = new Student();
    $student->name = $request->name;
    $student->roll = $request->roll;
    $student->class = $request->class;
    $student->address = $request->address;
    $student->phone = $request->phone;
    $student->save();

    session()->flash('success', 'Student added successfully');
    return redirect()->route('admin.student.index');
  }


  public function show($id)
  {
    //
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'roll' => 'required',
      'class' => 'required',
      'address' => 'required',
      'phone' => 'required',
    ]);

    $student = Student::find($id);
    $student->name = $request->name;
    $student->roll = $request->roll;
    $student->class = $request->class;
    $student->address = $request->address;
    $student->phone = $request->phone;
    $student->save();

    session()->flash('success', 'Student updated successfully');
    return redirect()->route('admin.student.index');
  }


  public function destroy($id)
  {
    $student = Student::find($id);
    $student->delete();
    session()->flash('success', 'Student updated successfully');
    return redirect()->route('admin.student.index');
  }
}
