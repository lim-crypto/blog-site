@extends('admin.layouts.app')
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('Adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1> Page</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    @can('users.create' , Auth::user())
    <a href="{{route('user.create')}}" class="btn btn-success mb-3">Add New</a>
    @endcan



    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Users</h3>
      </div>
      @include('includes.messages')
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>S.No</th>
              <th>User Name</th>
              <th>Assigned Roles</th>
              <th>Status</th>
              @can('users.update' , Auth::user())
              <th>Edit</th>
              @endcan
              @can('users.delete' , Auth::user())
              <th>Delete</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach($users as $user)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$user->name}}</td>
              <td>
                @foreach($user->roles as $role)
                <span class="badge badge-success">{{$role->name}}</span>
                @endforeach
              </td>
              <td>
                @if($user->status == 1)
                <span class="badge badge-success">Active</span>
                @else
                <span class="badge badge-danger">Inactive</span>
                @endif
              </td>
              @can('users.update' , Auth::user())
              <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
              @endcan
              @can('users.delete' , Auth::user())
              <td>
                <form id="delete-form-{{$user->id}}" action="{{route('user.destroy',$user->id)}}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
                <button type="submit" class="btn btn-danger" onclick="
                if(confirm('Are you sure you want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{$user->id}}').submit();
                }else{
                  event.preventDefault();
                }
                "><i class="fas fa-trash"></i></button>
              </td>
              @endcan
            </tr>
            @endforeach
          </tbody>
          <tfoot>
            <tr>
              <th>S.No</th>
              <th>User Name</th>
              <th>Assigned Roles</th>
              <th>Status</th>
              @can('users.update' , Auth::user())
              <th>Edit</th>
              @endcan
              @can('users.delete' , Auth::user())
              <th>Delete</th>
              @endcan
            </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('script')

<!-- DataTables  & Plugins -->
<script src="{{asset('Adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('Adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('Adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('Adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>


<!-- Page specific script -->
<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false
    });
  });
</script>
@endsection