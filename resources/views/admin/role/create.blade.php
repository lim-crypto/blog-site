@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create Role</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/role">Roles</a></li>
                        <li class="breadcrumb-item active">Create Role</li>
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
                        <h3 class="card-title">Create New Role</h3>
                    </div>

                    @include('includes.messages')
                    <!-- form start -->
                    <form action="{{route('role.store')}}" method="POST">
                        @csrf
                        <div class="card-body row">
                            <div class="mx-auto col-lg-6">
                                <div class="form-group">
                                    <label for="role">Role Title</label>
                                    <input type="text" class="form-control" name="name" id="role" placeholder="title">
                                </div>

                                <div class="row">
                                    <div class="col-lg-4">
                                        <label for="name"> Posts Permissions </label>
                                        @foreach($permissions as $permission)
                                        @if($permission->for == 'Post')
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="{{$permission->id}}" name="permission[]">{{$permission->name}}</label>
                                        </div>
                                        @endif
                                        @endforeach

                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">User Permissions</label>
                                        @foreach ($permissions as $permission)
                                        @if ($permission->for == 'User')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="name">Other Permissions</label>
                                        @foreach ($permissions as $permission)
                                        @if ($permission->for == 'Other')
                                        <div class="checkbox">
                                            <label><input type="checkbox" name="permission[]" value="{{ $permission->id }}">{{ $permission->name }}</label>
                                        </div>
                                        @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('role.index')}}" class="btn btn-warning">Back</a>
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