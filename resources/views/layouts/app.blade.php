<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Carento - Car Rental')</title>
    <link rel="icon" type="image/svg+xml" href="{{ setting('site_favicon', '/assets/imgs/template/favicon.svg') }}">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
    <style>
        :root {
            --bs-brand-2: {{ setting('primary_color', '#70f46d') }};
            --bs-button-bg: {{ setting('primary_color', '#70f46d') }};
            --bs-primary: {{ setting('primary_color', '#70f46d') }};
            --bs-brand-2-darken: {{ setting('primary_hover_color', '#5edd5b') }};
            --bs-brand-1: {{ setting('secondary_color', '#8acfff') }};
            --bs-danger: {{ setting('accent_color', '#f15d44') }};
            --bs-button-text: {{ setting('button_text_color', '#101010') }};
            --bs-color-1000: {{ setting('button_text_color', '#101010') }};
            --bs-color-black: {{ setting('button_text_color', '#101010') }};
            --bs-header-bg: {{ setting('header_bg_color', '#101010') }};
            --bs-footer-bg: {{ setting('footer_bg_color', '#101010') }};
            --bs-heading-color: {{ setting('heading_color', '#000000') }};
        }

        .btn-brand-2, .btn-primary, .btn-book {
            background-color: var(--bs-brand-2) !important;
            border-color: var(--bs-brand-2-darken) !important;
            color: var(--bs-button-text) !important;
        }

        .btn-brand-2 *, .btn-primary *, .btn-book * {
            color: var(--bs-button-text) !important;
        }

        .btn-brand-2 svg path, .btn-primary svg path, .btn-book svg path {
            fill: var(--bs-button-text) !important;
        }

        .btn-brand-2:hover, .btn-primary:hover, .btn-book:hover {
            color: {{ setting('button_hover_text_color', '#000000') }} !important;
        }

        .btn-brand-2:hover *, .btn-primary:hover *, .btn-book:hover * {
            color: {{ setting('button_hover_text_color', '#000000') }} !important;
        }

        .btn-brand-2:hover svg path, .btn-primary:hover svg path, .btn-book:hover svg path {
            fill: {{ setting('button_hover_text_color', '#000000') }} !important;
        }

        a.icon-socials {
            transition: transform 0.25s ease, background-color 0.25s ease;
        }

        a.icon-socials svg path {
            fill: #ffffff !important;
            transition: fill 0.25s ease-in-out;
        }

        a.icon-socials:hover {
            transform: translateY(-3px);
        }

        a.icon-socials:hover svg path {
            fill: var(--bs-primary, #70f46d) !important;
        }

        .top-bar-2 .container-fluid {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
        }

        .top-bar-2 .text-header-info {
            flex: 1 1 0%;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        .top-bar-2 .text-header-info a {
            color: #ffffff !important;
            display: inline-flex;
            align-items: center;
            transition: color 0.25s ease-in-out;
            text-decoration: none;
            margin-right: 0px !important;
        }

        .top-bar-2 .text-header-info a i {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            line-height: 1;
            transition: color 0.25s ease-in-out;
        }

        .top-bar-2 .text-header-info a:hover,
        .top-bar-2 .text-header-info a:hover i,
        .top-bar-2 .text-header-info a:hover span {
            color: var(--bs-primary, #70f46d) !important;
        }

        .top-bar-2 .text-header {
            flex: 0 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .top-bar-2 .top-right-header {
            flex: 1 1 0%;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
    </style>
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
