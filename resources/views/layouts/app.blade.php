<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Absensi Sebelas</title>

    <link rel="shortcut icon" href="{{ asset('assets/html/images/iconabas.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/html/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/html/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/html/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/html/css/responsive.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

    @livewireStyles
    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body>

    <!-- loader Start -->
    <div id="loading">
        <div id="loading-center">
            <div class="loader">
                <div class="cube">
                    <div class="sides">
                        <div class="top"></div>
                        <div class="right"></div>
                        <div class="bottom"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="back"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- loader END -->

    <!-- Wrapper Start -->
    <div class="wrapper">

        <!-- Sidebar  -->
        <livewire:layouts.sidebar />
        <!-- Sidebar END -->

        <!-- TOP Nav Bar -->
        <livewire:layouts.top-navbar />
        <!-- TOP Nav Bar END -->

        <!-- Page Content  -->
        <div id="content-page" class="content-page">
            {{ $slot }}
        </div>

    </div>
    <!-- Wrapper END -->

    <!-- Footer -->
    <footer class="bg-white iq-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="privacy-policy.html">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="terms-of-service.html">Terms of Use</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 text-right">
                    Copyright 2025 <a href="#">ABAS</a> All Rights Reserved.
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer END -->

    @stack('myscript')
    @livewireScripts
    <script src="{{ asset('assets/html/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('assets/html/js/countdown.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/wow.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/html/js/slick.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/html/js/smooth-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/html/js/chart-custom.js') }}"></script>
    <script src="{{ asset('assets/html/js/custom.js') }}"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin=""></script>

</body>

</html>
