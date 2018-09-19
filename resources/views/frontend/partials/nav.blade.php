<nav class="nav-section">
  <div class="container">
    <div class="nav-right">
    </div>
    <ul class="main-menu">
      <li class="active"><a href="{{ route('index') }}">Home</a></li>
      <li><a href="about.html">About Us</a></li>
      <li><a href="{{ route('staffProfile') }}">Staffs</a></li>
      <li><a href="#">Academic Info</a></li>
      <li><a href="{{ route('department') }}">Departments</a></li>
      <li><a href="{{ route('teacherProfile') }}">Teachers Profile</a></li>
      <li><a href="{{ route('studentProfile') }}">Students Profile</a></li>
      <li><a href="{!! route('student.result.list') !!}">Result</a></li>
      <li><a href="#">Gallery</a></li>
      <!--<li><a href="#">Contact</a></li>-->
    </ul>
  </div>
</nav>
