<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    {{-- <section class="hero is-fullheight is-dark"> --}}
    @include('layouts.navbar')
    {{-- @yield('navbar') --}}
    
    <section class="section">
        <div class="container is-fluid">
            @yield('content')
        </div>
    </section>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script defer src="{{ asset('js/icon.js') }}"></script>
    @include('inc.footer')
</body>
</html>
