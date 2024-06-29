<div class="product-item">
    <img src="{{ asset('images/posts/' . $post->image) }}" alt="">
    <h3>{{ $post->title }}</h3>
    <p>{{ $post->detail }}</p>
    <div class="product-actions">
        <a href="{{ route('site.post.detail', ['slug' => $post->slug]) }}" class="view-details">Chi tiết</a>
    </div>
</div>

