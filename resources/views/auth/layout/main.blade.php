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
    @include('sweetalert::alert')

    <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
        <div class="container">
            @include('backend.include.flash')
            @yield('content')
        </div>
    </div>
</body>
</html>
