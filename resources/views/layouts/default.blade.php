<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('includes.head')
</head>
<body>
<div id="app">
    <header>
        @include('includes.navigation')
    </header>
    @yield('content')
</div>
<footer>
    @include('includes.footer')
</footer>
</body>
</html>
