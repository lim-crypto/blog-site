@extends('admin.layouts.app')
@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('Adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('Adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">

<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="{{asset('Adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
@endsection
@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Posts</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
            <li class="breadcrumb-item active">Posts</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    @can('posts.create' , Auth::user() )
    <a href="{{route('post.create')}}" class="btn btn-success mb-3">Add New</a>
    @endcan
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">DataTable with default features</h3>
      </div>
      @include('includes.messages')
      <!-- /.card-header -->
      <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Post title</th>
              <th>Sub title</th>
              <th>Slug</th>
              <th>Created At</th>
              <th>Status</th>
              @can('posts.publish' , Auth::user())
              <th>Published</th>
              @endcan
              @can('posts.update' , Auth::user())
              <th>Edit</th>
              @endcan
              @can('posts.delete' , Auth::user())
              <th>Delete</th>
              @endcan
            </tr>
          </thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{$loop->index+1}}</td>
              <td>{{$post->title}}</td>
              <td>{{$post->subtitle}}</td>
              <td>{{$post->slug}}</td>
              <!-- created_at -->
              <td>
                {{$post->created_at}}
              </td>
              <!-- status -->
              <td>
                @if($post->status )
                <span class="badge badge-success">Published</span>
                @else
                <span class="badge badge-danger">Unpublished</span>
                @endif
              </td>
              @can('posts.publish' , Auth::user())
              <td>
                <form action="{{route('post.publish',$post->slug)}}" method="POST" id="publish-form-{{$post->slug}}">
                  @csrf
                  @method('PUT')
                  <div class="icheck-primary  d-inline ">
                    <input  type="checkbox" @if($post->status) checked @endif id="checkboxPrimary1" onclick="document.getElementById('publish-form-{{$post->slug}}').submit();  "><label for="checkboxPrimary1">
                    </label>
                  </div>
                </form>
              </td>
              @endcan
              @can('posts.update' , Auth::user())
              <td><a href="{{route('post.edit',$post->slug)}}" class="btn btn-primary"><i class="fas fa-edit"></i></a></td>
              @endcan
              @can('posts.delete' , Auth::user())
              <td>
                <form id="delete-form-{{$post->slug}}" action="{{route('post.destroy',$post->slug)}}" method="POST" style="display: none;">
                  @csrf
                  @method('DELETE')
                </form>
                <button type="submit" class="btn btn-danger" onclick="
                if(confirm('Are you sure you want to delete this?')){
                  event.preventDefault();
                  document.getElementById('delete-form-{{$post->slug}}').submit();
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
              <th>Post title</th>
              <th>Sub title</th>
              <th>Slug</th>
              <th>Created At</th>
              <th>Status</th>
              @can('posts.publish' , Auth::user())
              <th>Published</th>
              @endcan
              @can('posts.update' , Auth::user())
              <th>Edit</th>
              @endcan
              @can('posts.delete' , Auth::user())
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