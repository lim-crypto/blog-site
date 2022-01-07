@extends('admin.layouts.app')

@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$total_post}}</h3>

              <p>Total Posts</p>
            </div>
            <div class="icon">
              <i class="far fa-newspaper"></i>
            </div>
            <a href="admin/post" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$total_user}}</h3>

              <p>Users</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$total_admin}}</h3>

              <p>Admins</p>
            </div>
            <div class="icon">
              <i class="fas fa-users-cog"></i>
            </div>
            <a href="admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{$inactived_admin}}</h3>

              <p>Inactived admin</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-slash"></i>
            </div>
            <a href="admin/user" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

@endsection