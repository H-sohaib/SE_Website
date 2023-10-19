<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicons -->
    <link href="{{ asset('assets/images/logo2.png') }}" rel="icon">
    {{-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> --}}


    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/bootstrap-icons.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('assets/css/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/swiper-bundle.min.css') }}" rel="stylesheet"> --}}
    {{-- <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet"> --}}
    {{-- <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet"> --}}


    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets/css/adminSideBar.css') }}" rel="stylesheet">


    <!-- Page Heading -->
    @if (isset($style))
        {{ $style }}
    @endif
</head>

<body>
    <div>

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

                    @if (session()->has('message'))
                        <x-alert type="primary">
                            {{ session()->get('message') }}
                        </x-alert>
                    @endif
                    @if (session()->has('error'))
                        <x-alert type="danger">
                            {{ session()->get('error') }}
                        </x-alert>
                    @endif
                    @if (session()->has('warning'))
                        <x-alert type="warning">
                            {{ session()->get('warning') }}
                        </x-alert>
                    @endif

                    <div class="bg-light border rounded-3 p-3 overflow-auto">
                        {{ $slot }}
                    </div>
                    <x-my-linkedin></x-my-linkedin>
                </div>
            </main>
            <!--Main layout-->
        </div>


    </div>



    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/validateEmailForm.js') }}"></script>
    <script src="{{ asset('assets/js/admin_main.js') }}"></script>
    <script src="{{ asset('assets/js/active_current_link.js') }}"></script>
    {{-- <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script> --}}
    {{-- <script src="assets/vendor/waypoints/noframework.waypoints.js"></script> --}}
    @if (isset($script))
        {{ $script }}
    @endif

    <script>
        AOS.init();
        const glightbox = GLightbox({
            selector: ".glightbox",
        });


        function confirmDelete(form, e) {
            e.preventDefault();
            if (confirm('Are you sure u want to delete this !'))
                form.submit()


        }
    </script>
</body>

</html>
