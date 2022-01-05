@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Text Editors</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Text Editors</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <!-- general form elements -->
                <div class="card card-primary card-outline">
                    <!-- card header -->
                    <div class="card-header">
                        <h3 class="card-title">Edit Permission</h3>
                    </div>
                    <!-- /.card header -->
                    @include('includes.messages')
                    <!-- form start -->
                    <form action="{{route('permission.update',$permission->id)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <div class="mx-auto col-lg-6">
                                <div class="form-group">
                                    <label for="permission">Permission name</label>
                                    <input type="text" class="form-control" name="name" id="permission" placeholder="title" value="{{$permission->name}}" >
                                </div>
                                <div class="form-group">
                                    <label for="for">Permission for</label>
                                    <select name="for" id="for" class="form-control" >
                                        <option selected disabled>Select Permission for</option>
                                        <option value="user">User</option>
                                        <option value="post">Post</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('permission.index')}}" class="btn btn-warning">Back</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->


                    </form>
                </div>
                <!-- /.card -->


            </div>
            <!-- /.col-->
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection