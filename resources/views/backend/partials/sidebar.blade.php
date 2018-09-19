<!-- Left Sidebar -->
<div class="left main-sidebar">
  <div class="sidebar-inner leftscroll">
    <div id="sidebar-menu">
      <ul>
        <li class="submenu">
          <a class="{{ Route::is('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" title="Dashboard"><i class="fa fa-fw fa-dashboard"></i><span> Dashboard </span> </a>
        </li>

        {{-- <li class="submenu">
          <a class="{{ Route::is('admin.attendance.index') ? 'active' : '' }}" href="{{ route('admin.attendance.index') }}" title="Staff"><i class="fa fa-fw fa-user"></i><span> Attendance </span> </a>
        </li> --}}

        <li class="submenu">
          <a class="{{ Route::is('admin.result.list') ? 'active' : '' }}" href="{{ route('admin.result.list') }}" title="Result"><i class="fa fa-fw fa-user"></i><span> Full Result </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.subjectTeacher.index') ? 'active' : '' }}" href="{{ route('admin.subjectTeacher.index') }}" title="Subject Teacher"><i class="fa fa-fw fa-user"></i><span> Subject Teacher </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ (Route::is('admin.teacher.index') || Route::is('admin.teacher.create') || Route::is('admin.teacher.edit')) ? 'active' : '' }}" title="Teacher" href="#teacher"><i class="fa fa-fw fa-user"></i> <span> Teacher </span> <span class="menu-arrow"></span></a>
          <ul class="list-unstyled" id="teacher">
            <li><a href="{{ route('admin.teacher.index') }}">Manage Teaher</a></li>
            <li><a href="{{ route('admin.teacher.create') }}">Add Teacher</a></li>
          </ul>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.staff.index') ? 'active' : '' }}" href="{{ route('admin.staff.index') }}" title="Staff"><i class="fa fa-fw fa-user"></i><span> Staff </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.student.index') ? 'active' : '' }}" href="{{ route('admin.student.index') }}" title="Subject Teacher"><i class="fa fa-fw fa-user"></i><span> Student </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.department.index') ? 'active' : '' }}" href="{{ route('admin.department.index') }}" title="Departments"><i class="fa fa-fw fa-dashboard"></i><span> Departments </span> </a>
        </li>

        <li class="submenu">
          <a class="{{ Route::is('admin.subject.index') ? 'active' : '' }}" href="{{ route('admin.subject.index') }}" title="Subjects"><i class="fa fa-fw fa-dashboard"></i><span> Subjects </span> </a>
        </li>
      </ul>

      <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<!-- End Sidebar -->
