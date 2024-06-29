@extends('layouts.site')
@section('title', 'Tất cả bài viết')
@section('header')
    <link rel="stylesheet" href="post.css">
@endsection
@section('content')

    <div class="product-section">
        <h2 class="section-title">
            <span class="px-2">Tất cả bài viết</span>
        </h2>
    </div>

    <div class="topic">
        @foreach ($topic as $topi)
            <a href="{{ route('site.post.topic', ['slug' => $topi->slug]) }}" class="topic-name">{{$topi->name}}</a>
        @endforeach
    </div>

    <div class="product-grid">
        @foreach ($list_post as $item)
            <div class="product-item">
                <img src="{{ asset('images/posts/' . $item->image) }}" alt="">
                <h3>{{ $item->title }}</h3>
                <p>{{ $item->detail }}</p>
                <div class="product-actions">
                    <a href="{{ route('site.post.detail', ['slug' => $item->slug]) }}" class="view-details">Chi tiết</a>
                </div>
            </div>
        @endforeach
    </div>

    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @for ($i = 1; $i <= $list_post->lastPage(); $i++)
                <li class="page-item {{ $list_post->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $list_post->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </nav>
@endsection
