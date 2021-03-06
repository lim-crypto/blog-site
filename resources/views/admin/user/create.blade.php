@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Create User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/user">Users</a></li>
                        <li class="breadcrumb-item active">Create User</li>
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
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-edit"></i>
                            Add New Admin
                        </h3>
                    </div>
                    @include('includes.messages')
                    <!-- form start -->
                    <form action="{{route('user.store')}}" method="POST">
                        @csrf
                        <div class="card-body row">
                            <div class="mx-auto col-lg-6">
                                <div class="form-group">
                                    <label for="name">User Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="User name" value="{{old('name')}}">
                                </div>
                                <!-- email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                                </div>
                                <!-- phone number -->
                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" value="{{old('phone')}}">
                                </div>
                                <!-- password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <!-- password_confirmation -->
                                <div class="form-group">
                                    <label for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password">
                                </div>
                                <!-- status -->
                                <div class="form-group">
                                    <label>Status</label>
                                    <div class="checkbox">
                                        <label> <input type="checkbox" name="status" value="1" @if(old('status')==1) checked @endif> Active</label>

                                    </div>
                                    <!-- <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select> -->
                                </div>
                                <!-- role -->
                                <div class="form-group">
                                    <label for="role">Role</label>
                                    <div class="row">
                                        @foreach($roles as $role)
                                        <div class="col-lg-3">
                                            <div class="checkbox">
                                                <label><input type="checkbox" name="role[]" value="{{$role->id}}"> {{$role->name}}</label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('user.index')}}" class="btn btn-warning">Back</a>
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