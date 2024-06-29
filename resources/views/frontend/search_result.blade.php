@extends('layouts.site')

@section('content')

    <div class="product-section">
        <h2 class="section-title">
            <span class="px-2">Kết quả tìm kiếm</span>
        </h2>
    </div>

    <div class="container">
        <div class="product-grid">
            @if (count($results) > 0)
                @foreach ($results as $result)
                    <div class="product-item">
                        <img src="{{ asset('images/products/' . $result->image) }}" alt="">
                        <h3>{{ $result->name }}</h3>
                        <p>Mô tả sản phẩm 1</p>
                        <p>${{ $result->price }}</p>
                        <div class="product-actions">
                            <a href="" class="add-to-cart">Thêm vào
                                giỏ hàng</a>
                            <a href="{{ route('site.product.detail', ['slug' => $result->slug]) }}" class="view-details">Chi
                                tiết</a>
                        </div>
                    </div>
                @endforeach
            @else
        </div>
        <p>Không tìm thấy kết quả nào.</p>
        @endif
    </div>
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            @for ($i = 1; $i <= $results->lastPage(); $i++)
                <li class="page-item {{ $results->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $results->url($i) }}">{{ $i }}</a>
                </li>
            @endfor
        </ul>
    </nav>
@endsection
