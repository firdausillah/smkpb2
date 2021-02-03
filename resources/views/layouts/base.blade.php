<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMK PB 2 | @yield('title')</title>
    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <link rel="icon" href="{{ asset('storage/images/logo/WBU2IlHJiXt2fDqWnf0QlFFt8fv97odmnyuzhVlI.png') }}" type="image/png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset("css/bootstrap.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/linericon/style.css") }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ asset("vendors/owl-carousel/owl.carousel.min.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/lightbox/simpleLightbox.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/nice-select/css/nice-select.css") }}">
    <link rel="stylesheet" href="{{ asset("vendors/animate-css/animate.css") }}">
     <link rel="stylesheet" href="{{ asset("vendors/popup/magnific-popup.css") }}">
    <!-- main css -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/responsive.css") }}">

    @stack('css')

    @yield('baseStyles')
</head>
<body>
    @yield('body')

    @yield('baseScripts')
    
    @stack('js')
            <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/stellar.js') }}"></script>
        <script src="{{ asset('vendors/lightbox/simpleLightbox.min.js') }}"></script>
        <script src="{{ asset('vendors/nice-select/js/jquery.nice-select.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/imagesloaded.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('vendors/popup/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('vendors/counter-up/jquery.counterup.js') }}"></script>
        <script src="{{ asset('js/mail-script.js') }}"></script>
        <script src="{{ asset('js/theme.js') }}"></script>
</body>
</html>
