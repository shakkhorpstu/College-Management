<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use App\Models\Department;
use Session;

class DepartmentController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
  }

  public function index()
  {
    $departments = Department::orderBy('id', 'DESC')->get();
    return view('backend.pages.department.index', compact('departments'));
  }

  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required|unique:departments',
    ]);

    $department = new Department();
    $department->name = $request->name;
    $department->slug = StringHelper::createSlug($request->name, 'Department', 'slug');
    $department->save();

    session()->flash('success', 'Department added successfully');
    return redirect()->route('admin.department.index');
  }


  public function update(Request $request, $id)
  {
    $department = Department::find($id);
    $this->validate($request, [
      'name' => 'required|unique:departments,name,'.$department->id,
    ]);

    $department->name = $request->name;
    $department->slug = StringHelper::createSlug($request->name, 'Department', 'slug');
    $department->save();

    session()->flash('success', 'Department updated successfully');
    return redirect()->route('admin.department.index');
  }


  public function destroy(Request $request, $id)
  {
    $department = Department::find($id);
    $department->delete();
    session()->flash('error', 'Department deleted successfully');
    return redirect()->route('admin.department.index');
  }
}
