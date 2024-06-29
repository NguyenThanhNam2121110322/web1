<!DOCTYPE html>
<html lang="en">
<head>

    <title>@yield('title')</title>

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="{{ asset('jquery/jquery-3.7.1.min.js') }}"></script>

    @yield('header')
</head>
<body>
   <x-header/>

    <main>
        @yield('content')

    </main>
    <x-footer/>
    @yield('footer')
</body>
</html>
