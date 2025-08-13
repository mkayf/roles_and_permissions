<!DOCTYPE html>
<html>
<head>
    <title>@yield('title')</title>
    @vite('resources/css/app.css');
</head>
<body>
    @include('Components.navbar')
    <div>
        @yield('content')
    </div>
    @include('Components.footer')
    @vite('resources/js/app.js')
</body>
</html>
