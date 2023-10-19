<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/images/logo2.png') }}" rel="icon">

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    {{-- css links --}}
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-icons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/adminSideBar.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app_layout.css') }}" rel="stylesheet">

    <!-- Scripts -->

    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <link rel="stylesheet" href="{{ asset('build/assets/app-a46e077c.css') }}">
    <script src="{{ asset('build/assets/app-da59565c.js') }}"></script>


</head>

<body class="font-sans antialiased">
    <div>
        <!--Main Navigation-->
        <header>
            <!-- Sidebar -->
            @include('layouts.admin.sidebar')
            <!-- Sidebar -->
            <!-- Navbar -->
            <nav id="main-navbar" class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
                <!-- Header wrapper -->
                @include('layouts.admin.navigation')
                <!-- Header wrapper -->
            </nav>
            <!-- Navbar -->
        </header>
        <!--Main Navigation-->

        <!--Main layout-->
        <main style="margin-top: 58px;">
            <div class="container pt-4">
                <div class="bg-light border rounded-3 p-3 overflow-auto">
                    {{ $slot }}
                </div>
                <x-my-linkedin></x-my-linkedin>
            </div>
        </main>
        <!--Main layout-->
    </div>



    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/admin_main.js') }}"></script>
    <script src="{{ asset('assets/js/active_current_link.js') }}"></script>
    @if (isset($script))
        {{ $script }}
    @endif

</body>

</html>
