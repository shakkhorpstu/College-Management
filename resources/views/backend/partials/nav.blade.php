<!-- top bar navigation -->
<div class="headerbar">

  <!-- LOGO -->
  <div class="headerbar-left">
    <a href=""><h5>Admin</h5></a>
  </div>

  <nav class="navbar-custom">

    <ul class="list-inline float-right mb-0">

      <li class="list-inline-item dropdown notif">
        <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
          {{ Auth::guard('admin')->user()->name }} <i class="fa fa-caret-down"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">

          <!-- item-->
          <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
          <i class="fa fa-power-off"></i> <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </div>
    </li>

  </ul>

  <ul class="list-inline menu-left mb-0">
    <li class="float-left">
      <button class="button-menu-mobile open-left">
        <i class="fa fa-fw fa-bars"></i>
      </button>
    </li>
  </ul>

</nav>

</div>
<!-- End Navigation -->
