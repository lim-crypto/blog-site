<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.home')}}" class="brand-link">
    <img src="{{asset('Adminlte/dist/img/twilight.png')}}" alt="Twilight Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Twilight</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="#" class="d-block text-capitalize ">{{Auth::user()->name}}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-item">
          <a href="{{route('post.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Posts
            </p>
          </a>
        </li>
        @can('posts.category' , Auth::user())
        <li class="nav-item">
          <a href="{{route('category.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Categories
            </p>
          </a>
        </li>

        @endcan
        @can('posts.tag' , Auth::user())
        <li class="nav-item">
          <a href="{{route('tag.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Tags
            </p>
          </a>
        </li>
        @endcan
        <li class="nav-item">
          <a href="{{route('user.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Users
            </p>
          </a>
        </li>
        @can('users.role' , Auth::user())
        <li class="nav-item">
          <a href="{{route('role.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Roles
            </p>
          </a>
        </li>
        @endcan
        @can('users.permission' , Auth::user())
        <li class="nav-item">
          <a href="{{route('permission.index')}}" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>
              Permission
            </p>
          </a>
        </li>
        @endcan
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>