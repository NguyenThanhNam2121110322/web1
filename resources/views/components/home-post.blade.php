<div class="product-section">
    <h2 class="section-title">
        <span class="px-2">Bài viết</span>
    </h2>
</div>

<div class="product-grid">
    @foreach ($post as $post_item)
        <x-post :postitem="$post_item" />
    @endforeach
</div>

<div class="product-actions">
    <a href="/tat-ca-bai-viet" class="btn btn-primary">Xem thêm</a>
</div>
