@extends('layouts.site')
@section('content')

    <div class="cart-container">
        <h2>Cart</h2>
        <form action="{{ route('site.cart.update') }}" method="post">
            @csrf
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Products</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Remove</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalMoney = 0;
                    @endphp
                    @foreach ($list_cart as $row_cart)
                        <tr>
                            <td>
                                <div class="product-info">
                                    <img src="{{ asset('images/products/' . $row_cart['image']) }}"
                                        alt=" {{ $row_cart['image'] }}" value=" {{ $row_cart['qty'] }}">
                                    <h3>{{ $row_cart['name'] }}</h3>
                                </div>
                            </td>
                            <td>${{ number_format($row_cart['price']) }}</td>
                            <td>
                                <div class="quantity-input">
                                    <input type="number" name="qty[{{ $row_cart['id'] }}]" value="{{ $row_cart['qty'] }}">
                                </div>
                            </td>
                            <td>${{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                            <td><button
                                    onclick="window.location.href='{{ route('site.cart.delete', ['id' => $row_cart['id']]) }}'"
                                    class="remove-btn">Remove</button></td>
                        </tr>
                        @php
                            $totalMoney += $row_cart['price'] * $row_cart['qty'];
                        @endphp
                    @endforeach
                </tbody>
            </table>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <a class="btn btn-success px-3" href="{{ route('site.home') }}">Mua thêm</a>
                        <button type="submit" class="btn btn-primary px-3">Cập nhật</button>
                        <a class="btn btn-info px-3" href="{{ route('site.cart.checkout') }}">Thanh toán</a>

                    </th>
                    <th colspan="3" class="text-end">
                        <strong> Tổng tiền: {{ number_format($totalMoney) }} </strong>
                    </th>
                </tr>
            </tfoot>
        </form>
    </div>

@endsection
@section('title', 'gio hang')
