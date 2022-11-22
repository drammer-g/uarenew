<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
<header>
    @include('includes.navigation')
</header>
<div id="app">
    @yield('content')
</div>
<footer>
    @include('includes.footer')
</footer>
</body>
</html>
