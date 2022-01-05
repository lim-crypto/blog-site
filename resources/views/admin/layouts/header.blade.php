<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">

    <li class="nav-item dropdown user-menu">
      <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
        <img src="../../dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline text-capitalize">{{Auth::user()->name}}</span>
      </a>
      <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
        <!-- User image -->
        <li class="user-header bg-primary">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

          <p>
          {{Auth::user()->name}} - Web Developer
            <small>Member since {{Auth::user()->created_at->toFormattedDateString()}}</small>
          </p>
        </li>

        <!-- Menu Footer-->
        <li class="user-footer">
          <a href="#" class="btn btn-default btn-flat">Profile</a>
          <a class="btn btn-default btn-flat float-right" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }} </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.navbar -->