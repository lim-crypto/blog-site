@extends('admin.layouts.app')


@section('main-content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/category">Categories</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                    @include('includes.messages')
                    <!-- form start -->
                    <form action="{{route('category.update',$category->slug)}}" method="POST" >
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <div class="mx-auto col-lg-6">
                                <div class="form-group">
                                    <label for="category">Post category</label>
                                    <input type="text" class="form-control" name="name" id="category" placeholder="title" value="{{$category->name}}" >
                                </div>

                                <div class="form-group">
                                    <label for="slug">category slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{$category->slug}}" >
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a href="{{route('category.index')}}" class="btn btn-warning">Back</a>
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