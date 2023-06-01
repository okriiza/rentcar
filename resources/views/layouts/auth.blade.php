<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('includes.admin.style')
    @stack('addon-style')
</head>

<body>
    <script src="{{ asset('themes/assets/static/js/initTheme.js') }}"></script>
    <div id="auth">
        @yield('content')
    </div>
</body>

</html>
