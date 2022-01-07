@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Permission</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/permission">Permissions</a></li>
                        <li class="breadcrumb-item active">Create Permission</li>
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
                        <h3 class="card-title">Create New Permission</h3>
                    </div>

                    @include('includes.messages')
                    <!-- form start -->
                    <form action="{{route('permission.store')}}" method="POST">
                        @csrf
                        <div class="card-body row">
                            <div class="mx-auto col-lg-6">
                                <div class="form-group">
                                    <label for="permission">Permission</label>
                                    <input type="text" class="form-control" name="name" id="permission" placeholder="Permission">
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