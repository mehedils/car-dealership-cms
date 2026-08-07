<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Carento - Car Rental')</title>
    <link rel="icon" type="image/svg+xml" href="/assets/imgs/template/favicon.svg">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <script src="/assets/js/vendors/jquery.min.js"></script>
    <script src="/assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/vendors/slick.min.js"></script>
    <script src="/assets/js/vendors/bootstrap-datepicker.min.js"></script>
    <script src="/assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="/assets/js/vendors/wow.min.js"></script>
    @vite(['resources/js/main.js'])
</head>
<body>
    <div id="top"></div>
    @include('partials.header' . (trim($__env->yieldContent('headerStyle')) === '1' ? '-hero' : ''))
    @include('partials.mobile-menu')
    @include('partials.offcanvas')

    <main class="main">
        @yield('content')
    </main>

    @include('partials.footer')
    @include('partials.back-to-top')
</body>
</html>
