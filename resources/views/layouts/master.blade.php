<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    @include('partials.head')
    @yield('head')
</head>
<body>
    @include('partials.header')
    @include('partials.settings')  
    @yield('content')
    @include('partials.footer')
    @yield('js')
</body>
</html>
