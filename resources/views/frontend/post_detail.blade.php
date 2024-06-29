@extends('layouts.site')
@section('title', 'Chi tiết bài viết')
@section('content')
    <div class="product-section">
        <h2 class="section-title">
            <span class="px-2">Chi tiết bài viết</span>
        </h2>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 d-flex align-items-center">
                <img src="{{ asset('images/posts/' . $post->image) }}" alt="Image" class="img-fluid mr-4"
                    style="max-width: 200px;">
                <div>
                    <h1>{{ $post->name }}</h1>
                </div>
                <div class="col-lg-6">
                    <p class="lead">{{ $post->description }}</p>
                    <p class=>{{ $post->detail }}</p>
                </div>
            </div>
            <hr class="my-5">
        </div>
        <h2><span class="px-2">Bài viết liên quan</span></h2>
        <div class="product-grid">
            @foreach ($list_post->take(3) as $postitem)
                <x-post :$postitem />
            @endforeach
        </div>

    @endsection
