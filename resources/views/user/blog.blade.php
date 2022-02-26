@extends('user.app')
@section('bg-img', asset('user/img/twilight.jpg'))
@section('title', 'Twilight')
@section('sub-heading', 'Read and get updated on how we progress')
@section('main-content')
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div id="app" class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <posts
            v-for='value in blog'
            :title='value.title'
            :subtitle='value.subtitle'
            :posted_by='value.posted_by'
            :created_at='value.created_at'
            :slug='value.slug'
            :key='value.index'
            :post-id='value.id'
            login="{{ Auth::check() }}"
            :likes="value.likes.length"
            ></posts>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('js/app.js')}}"></script>
@endsection