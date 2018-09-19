<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Department;
use App\Models\Attendance;
use App\Models\Staff;

class PagesController extends Controller
{
  public function index()
  {
    return view('frontend.pages.index');
  }

  public function department()
  {
    $departments = Department::orderBy('name', 'DESC')->get();
    return view('frontend.pages.department', compact('departments'));
  }


  public function subject($slug)
  {
    $department = Department::where('slug', $slug)->first();
    $subjects = Subject::where('department_id', $department->id)->get();
    return view('frontend.pages.subject', compact('subjects'));
  }


  public function teacher($slug)
  {
    $subject = Subject::where('slug', $slug)->first();
    $teachers = Teacher::where('subject_id', $subject->id)->get();
    return view('frontend.pages.teacher', compact('teachers'));
  }


  public function teacherProfile()
  {
    $teachers = Teacher::orderBy('subject_id', 'ASC')->get();
    return view('frontend.pages.teacher', compact('teachers'));
  }


  public function student()
  {
    $students = Student::orderBy('class', 'DESC')->paginate(20);
    return view('frontend.pages.student', compact('students'));
  }


  public function staff()
  {
    $staffs = Staff::orderBy('id', 'ASC')->get();
    return view('frontend.pages.staff', compact('staffs'));
  }


  public function marks($class, $studentId)
  {
    $subjects = Subject::where('class', $class)->get();
    $student = Student::where('id', $studentId)->first();
    return view('frontend.pages.attendanceMark', compact('subjects', 'studentId', 'student'));
  }
}
