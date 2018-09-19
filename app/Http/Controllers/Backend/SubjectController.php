<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Models\Department;
use App\Models\Subject;
use Session;

class SubjectController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    $subjects = Subject::orderBy('id', 'DESC')->get();
    $departments = Department::orderBy('id', 'DESC')->get();
    return view('backend.pages.subject.index', compact('departments', 'subjects'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|unique:subjects',
    ]);

    $subject = new Subject();
    $subject->name = $request->name;
    $subject->department_id = $request->department_id;
    $subject->class = $request->class;
    $subject->slug = StringHelper::createSlug($request->name, 'Subject', 'slug');
    $subject->save();

    session()->flash('success', 'Subject added successfully');
    return redirect()->route('admin.subject.index');
  }


  public function update(Request $request, $id)
  {
    $subject = Subject::find($id);
    $this->validate($request, [
      'name' => 'required|unique:subjects,name,'.$subject->id,
    ]);

    $subject->name = $request->name;
    $subject->department_id = $request->department_id;
    $subject->class = $request->class;
    $subject->slug = StringHelper::createSlug($request->name, 'Subject', 'slug');
    $subject->save();

    session()->flash('success', 'Subject updated successfully');
    return redirect()->route('admin.subject.index');
  }


  public function destroy(Request $request, $id)
  {
    $subject = Department::find($id);
    $subject->delete();
    session()->flash('error', 'Subject deleted successfully');
    return redirect()->route('admin.subject.index');
  }
}
