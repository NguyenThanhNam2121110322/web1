<header>
    <h1>Cửa hàng của tôi</h1>
</header>

<div class="top-bar">
    <div class="logo">
        <img src="logo.png" alt="Logo">
        <span>Company Name</span>
    </div>
    <form class="search-form">
        <input type="text" class="search-input" placeholder="Search...">
    </form>
    @php
        $count = count(session('carts', []));
    @endphp

<div class="menu-right">
    @if (Auth::check())
        <a href="/dang-xuat" class="cart-link">
            <i class="fa-solid fa-sign-out-alt"></i>
            <span class="cart-text">Logout</span>
        </a>
    @else
        <a href="/dang-nhap" class="cart-link">
            <i class="fa-solid fa-user"></i>
            <span class="cart-text">Login</span>
        </a>
    @endif
</div>

    <div class="menu-right">
        <a href="/gio-hang" class="cart-link">
            <i class="fa-solid fa-cart-shopping"></i>
            <span class="cart-text">Cart</span>
            (<span class="badge" id="showqty">{{ $count }}</span>)
        </a>
    </div>
</div>


<x-main-menu />
