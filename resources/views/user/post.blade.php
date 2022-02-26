@extends('user.app')
@section('style')
<!-- prism -->
<link rel="stylesheet" href="{{asset('user/css/prism.css')}}">
@endsection

@section('bg-img', asset('storage/post').'/'.$post->image)
@section('title', $post->title)
@section('sub-heading', $post->subtitle)
@section('main-content')

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0&appId=478611033596320&autoLogAppEvents=1" nonce="akZFqsq7"></script>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <small>Created at {{$post->created_at}}</small>

                <small class="float-right mr-2">
                    @foreach($post->categories as $category)
                    <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
                    @endforeach
                </small>

                <div class="mt-4">
                    {!! htmlspecialchars_decode($post->body) !!}
                </div>
                <h3>tags clouds</h3>
                @foreach($post->tags as $tag)
                <a href="{{route('tag',$tag->slug)}}">
                    <small class="border rounded p-1 me-1">
                        {{$tag->name}}
                    </small>
                </a>
                @endforeach
            <div class="fb-comments" data-href="http://localhost:8000/" data-width="" data-numposts="5"></div>

            </div>
        </div>
    </div>
</article>

@endsection

@section('script')
<!-- prism -->

<script src="{{asset('user/js/prism.js')}}"></script>
@endsection