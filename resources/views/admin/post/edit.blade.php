@extends('admin.layouts.app')

@section('style')
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('Adminlte/plugins/select2/css/select2.min.css')}}">
<!-- summernote -->
<link rel="stylesheet" href="{{asset('Adminlte/plugins/summernote/summernote-bs4.min.css')}}">
@endsection
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
                        <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                        <li class="breadcrumb-item"><a href="/admin/post">Posts</a></li>
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
                <div class="card card-primary">
                    @include('includes.messages')
                    <!-- form start -->
                    <form action="{{route('post.update',$post->slug)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        @method('PUT')
                        <div class="card-body row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="title">Post Title</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="tile" value="{{$post->title}}">
                                </div>
                                <div class="form-group">
                                    <label for="subtitle">Post Sub Title</label>
                                    <input type="text" class="form-control" name="subtitle" id="subtitle" placeholder="sub title" value="{{$post->subtitle}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Post Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="slug" value="{{$post->slug}}">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="image">Upload Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Select tags</label>
                                    <select class="select2" multiple="multiple" name="tags[]" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($tags as $tag)
                                        <option value="{{$tag->id}}" @foreach($post->tags as $postTag)
                                            @if($tag->id == $postTag->id)
                                            selected
                                            @endif
                                            @endforeach
                                            >{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Select categories</label>
                                    <select class="select2" multiple="multiple" name="categories[]" data-placeholder="Select a State" style="width: 100%;">
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}" @foreach($post->categories as $postCategory)
                                            @if($category->id == $postCategory->id)
                                            selected
                                            @endif
                                            @endforeach
                                            >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @can('posts.publish' , Auth::user())
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="status" value="1" {{$post->status ? 'checked':''}}> Published
                                    </label>
                                </div>
                                @endcan
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Write Post body here
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <textarea id="summernote" name="body">
                                {{$post->body}}
                                </textarea>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{route('post.index')}}" class="btn btn-warning">Back</a>
                        </div>
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

@section('script')
<!-- Select2 -->
<script src="{{asset('Adminlte/plugins/select2/js/select2.full.min.js')}}"></script>

<!-- bs-custom-file-input -->
<script src="{{asset('Adminlte/plugins/bs-custom-file-input/bs-custom-file-input.min.js')}}"></script>

<!-- Summernote -->
<script src="{{asset('Adminlte/plugins/summernote/summernote-bs4.min.js')}}"></script>

<!-- Page specific script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        bsCustomFileInput.init();

        // Summernote
        $('#summernote').summernote()

    })
</script>
@endsection