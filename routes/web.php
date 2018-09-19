<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'Frontend\PagesController@index')->name('index');
Route::get('/department', 'Frontend\PagesController@department')->name('department');
Route::get('/department/{slug}', 'Frontend\PagesController@subject')->name('department.subject');
Route::get('/subject/{slug}', 'Frontend\PagesController@teacher')->name('subject.teacher');
Route::get('/teacher', 'Frontend\PagesController@teacherProfile')->name('teacherProfile');
Route::get('/student', 'Frontend\PagesController@student')->name('studentProfile');
Route::get('/mark/{class}/{student_id}', 'Frontend\PagesController@marks')->name('studentMarks');
Route::get('/staff', 'Frontend\PagesController@staff')->name('staffProfile');

Route::group(['prefix' => 'result'], function(){
  Route::get('/list', 'Frontend\ResultsController@list')->name('student.result.list');
  Route::get('/list/{class}/{term}', 'Frontend\ResultsController@listTerm')->name('student.result.termList');
  Route::get('/list/{student_id}/{class}/{term}', 'Frontend\ResultsController@fullList')->name('student.result.fullList');
});



/**
 * Admin Routes
 */
Route::group(['prefix' => 'admin'], function(){
    // Login & Logout
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login.submit');
    Route::post('/logout', 'Auth\LoginController@logout')->name('admin.logout');

    //Password resets routes
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('admin.password.reset');

    Route::get('/dashboard', 'Backend\PagesController@index')->name('admin.dashboard');


    Route::group(['prefix' => 'department'], function(){
      Route::get('/', 'Backend\DepartmentController@index')->name('admin.department.index');
      Route::post('/add', 'Backend\DepartmentController@store')->name('admin.department.store');
      Route::post('/edit/{id}', 'Backend\DepartmentController@update')->name('admin.department.update');
      Route::post('/delete/{id}', 'Backend\DepartmentController@destroy')->name('admin.department.delete');
    });


    Route::group(['prefix' => 'subject'], function(){
      Route::get('/', 'Backend\SubjectController@index')->name('admin.subject.index');
      Route::post('/add', 'Backend\SubjectController@store')->name('admin.subject.store');
      Route::post('/edit/{id}', 'Backend\SubjectController@update')->name('admin.subject.update');
      Route::post('/delete/{id}', 'Backend\SubjectController@destroy')->name('admin.subject.delete');
    });


    Route::group(['prefix' => 'student'], function(){
      Route::get('/', 'Backend\StudentController@index')->name('admin.student.index');
      Route::post('/add', 'Backend\StudentController@store')->name('admin.student.store');
      Route::post('/edit/{id}', 'Backend\StudentController@update')->name('admin.student.update');
      Route::post('/delete/{id}', 'Backend\StudentController@destroy')->name('admin.student.delete');
    });


    Route::group(['prefix' => 'staff'], function(){
      Route::get('/', 'Backend\StaffController@index')->name('admin.staff.index');
      Route::post('/add', 'Backend\StaffController@store')->name('admin.staff.store');
      Route::post('/edit/{id}', 'Backend\StaffController@update')->name('admin.staff.update');
      Route::post('/delete/{id}', 'Backend\StaffController@destroy')->name('admin.staff.delete');
    });


    Route::group(['prefix' => 'attendance'], function(){
      Route::get('/', 'Backend\AttendanceController@index')->name('admin.attendance.index');
      Route::get('/subject/{id}', 'Backend\AttendanceController@subject')->name('admin.attendance.subject');
      Route::get('/class/{id}/{subject_id}', 'Backend\AttendanceController@studentList')->name('admin.attendance.studentList');
      Route::post('/add', 'Backend\AttendanceController@submitAttendance')->name('submitAttedance');
    });


    Route::group(['prefix' => 'teacher'], function(){
      Route::get('/', 'Backend\TeacherController@index')->name('admin.teacher.index');
      Route::get('/add', 'Backend\TeacherController@create')->name('admin.teacher.create');
      Route::post('/add', 'Backend\TeacherController@store')->name('admin.teacher.store');
      Route::get('/edit/{id}', 'Backend\TeacherController@edit')->name('admin.teacher.edit');
      Route::post('/edit/{id}', 'Backend\TeacherController@update')->name('admin.teacher.update');
      Route::post('/delete/{id}', 'Backend\TeacherController@destroy')->name('admin.teacher.delete');
    });


    Route::group(['prefix' => 'subject-teacher'], function(){
      Route::get('/', 'Backend\SubjectTeacherController@index')->name('admin.subjectTeacher.index');
      Route::get('/add', 'Backend\SubjectTeacherController@create')->name('admin.subjectTeacher.create');
      Route::post('/add', 'Backend\SubjectTeacherController@store')->name('admin.subjectTeacher.store');
      Route::get('/edit/{id}', 'Backend\SubjectTeacherController@edit')->name('admin.subjectTeacher.edit');
      Route::post('/edit/{id}', 'Backend\SubjectTeacherController@update')->name('admin.subjectTeacher.update');
      Route::post('/delete/{id}', 'Backend\SubjectTeacherController@destroy')->name('admin.subjectTeacher.delete');
    });


    Route::group(['prefix' => 'result'], function(){
      Route::get('/{subject_id}/{subject_teacher_id}', 'Backend\ResultsController@index')->name('admin.result.index');
      Route::get('/publish', 'Backend\ResultsController@publishResult')->name('admin.result.publish');
      Route::get('/list', 'Backend\ResultsController@list')->name('admin.result.list');
      Route::get('/list/{class}/{term}', 'Backend\ResultsController@listTerm')->name('admin.result.termList');
      Route::get('/list/{student_id}/{class}/{term}', 'Backend\ResultsController@fullList')->name('admin.result.fullList');
      Route::post('upload/{subject_id}', 'Backend\ResultsController@upload')->name('admin.result.uploadExcel');
      Route::post('update/{subject_id}', 'Backend\ResultsController@update')->name('admin.result.update');
    });
});
