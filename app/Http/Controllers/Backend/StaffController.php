<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Session;

class StaffController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth:admin');
  }


  public function index()
  {
    $staffs = Staff::orderBy('id', 'DESC')->get();
    return view('backend.pages.staff.index', compact('staffs'));
  }


  public function store(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'address' => 'required',
      'phone' => 'required',
    ]);

    $staff = new Staff();
    $staff->name = $request->name;
    $staff->address = $request->address;
    $staff->phone = $request->phone;
    $staff->save();

    session()->flash('success', 'Staff added successfully');
    return redirect()->route('admin.staff.index');
  }


  public function show($id)
  {
    //
  }


  public function update(Request $request, $id)
  {
    $this->validate($request, [
      'name' => 'required',
      'address' => 'required',
      'phone' => 'required',
    ]);

    $staff = Staff::find($id);
    $staff->name = $request->name;
    $staff->address = $request->address;
    $staff->phone = $request->phone;
    $staff->save();

    session()->flash('success', 'Staff updated successfully');
    return redirect()->route('admin.staff.index');
  }


  public function destroy($id)
  {
    $staff = Staff::find($id);
    $staff->delete();
    session()->flash('success', 'Staff updated successfully');
    return redirect()->route('admin.staff.index');
  }
}
