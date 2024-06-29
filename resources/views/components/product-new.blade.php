<div class="product-section">
    <h2 class="section-title">
        <span class="px-2">Products New</span>
    </h2>
</div>

<div class="product-grid">
    @foreach ($list as $item)
        <div class="product-item">
            <img src="{{ asset('images/products/' . $item->image) }}" alt="">
            <h3>{{ $item->name }}</h3>
            <p>Mô tả sản phẩm 1</p>
            <p>${{ $item->price }}</p>
            <div class="product-actions">
                <a href="" class="add-to-cart">Thêm vào
                    giỏ hàng</a>
                <a href="{{ route('site.product.detail', ['slug' => $item->slug]) }}" class="view-details">Chi tiết</a>
            </div>
        </div>
    @endforeach
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        @for ($i = 1; $i <= $list->lastPage(); $i++)
            <li class="page-item {{ $list->currentPage() == $i ? 'active' : '' }}">
                <a class="page-link" href="{{ $list->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
    </ul>
</nav>
