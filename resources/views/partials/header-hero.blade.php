<header class="header header-fixed sticky-bar">
    <x-topbar :transparent="true" />
    <div class="container-fluid">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="/">
                        <img class="light-mode" alt="{{ setting('site_name', 'Carento') }}" src="{{ setting('site_logo_light', '/assets/imgs/template/logo-w.svg') }}">
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu">
                        <ul class="main-menu">
                            <li>
                                <a class="color-white" href="/">Home</a>
                            </li>
                            <li>
                                <a class="color-white" href="/cars">Cars</a>
                            </li>
                            <li>
                                <a class="color-white" href="/services">Services</a>
                            </li>
                            <li>
                                <a class="color-white" href="/about">About Us</a>
                            </li>
                            <li>
                                <a class="color-white" href="/contact">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right d-flex align-items-center gap-3">
                    <button class="btn btn-brand-2 btn-header-lead text-dark shadow-sm" data-bs-toggle="modal" data-bs-target="#leadModal">
                        <i class="fi fi-rr-envelope"></i>
                        <span>Inquire Now</span>
                    </button>
                    <div class="burger-icon burger-icon-white" id="btn-mobile-menu">
                        <span class="burger-icon-top"></span>
                        <span class="burger-icon-mid"> </span>
                        <span class="burger-icon-bottom"> </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
