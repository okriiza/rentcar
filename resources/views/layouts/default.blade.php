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
    <div id="app">
        @include('includes.admin.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <div class="page-heading">
                @yield('content')
            </div>
            @include('includes.admin.footer')
        </div>
    </div>
    @include('includes.admin.script')
    @stack('addon-script')

</body>
@vite('resources/js/app.js')

</html>
