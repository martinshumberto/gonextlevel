<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Go Next Level') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/laroute.js') }}"></script>
    <script src="{{ asset('libs/fontawesome/fontawesome/all.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('libs/fontawesome/fontawesome/all.css') }}" rel="stylesheet">
</head>
<body class="menu-position-top full-screen with-content-panel">

    <div id="app" class="all-wrapper with-side-panel solid-bg-all">
        {{-- <div class="layout-w"> --}}
            <!-- Topbar content -->
            <section>
                <form id="logout-form" method="POST" action="{{route('logout')}}">
                    @csrf
                </form>
                <app-topbar :user="{{json_encode(Auth::user())}}"/>
            </section>

            <div class="content-w">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item"><a href="index.html">Products</a></li>
                    <li class="breadcrumb-item"><span>Laptop with retina screen</span></li>
                </ul>
                <!-- main content -->
                @yield('content')
            </div>
        {{-- </div> --}}

        <div class="display-type"></div>
    </div>
</body>
</html>
