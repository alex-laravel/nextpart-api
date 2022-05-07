<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') | {{ config('app.name') }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @yield('scripts')
</head>
<body>
    @include('backend.include.sidebar')
    <div class="wrapper d-flex flex-column min-vh-100 bg-light">
        @include('backend.include.header')

        <main class="body flex-grow-1 px-3">
            <div class="container-lg">
                @include('sweetalert::alert')
                @include('backend.include.flash')
                @yield('content')
            </div>
        </main>

        @include('backend.include.footer')
    </div>
</body>
</html>
