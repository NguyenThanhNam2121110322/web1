<header>
    <div class="header-content">
        <div class="contact">
            <i class="fas fa-phone"></i>
            <span>123-456-7890</span>
        </div>
    </div>
</header>

<div class="top-bar">
    <div class="logo">
        <a href="/">
            <img src="{{ asset('images/nqm.png') }}" alt="Logo">
        </a>
    </div>
    <form class="search-form" action="{{ route('search.search') }}" method="POST">
        @csrf
        <input type="text" class="search-input" name="search_term" placeholder="Search..." required>
        <button type="submit" class="search-button">
            <i class="fa-solid fa-search"></i>
        </button>
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
