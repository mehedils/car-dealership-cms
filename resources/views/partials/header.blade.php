<header class="header sticky-bar header-home-2">
    <div class="top-bar top-bar-2 top-bar-3">
        <div class="container-fluid">
            <div class="text-header-info">
                <a class="phone-head text-white" href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+1 222-555-33-99')) }}">
                    <i class="fi fi-rr-phone-call me-1"></i>
                    <span class="d-none d-lg-inline-block">{{ setting('contact_phone', '+1 222-555-33-99') }}</span>
                </a>
                <a class="email-head text-white" href="mailto:{{ setting('contact_email', 'sale@carento.com') }}">
                    <i class="fi fi-rr-envelope me-1"></i>
                    <span class="d-none d-lg-inline-block">{{ setting('contact_email', 'sale@carento.com') }}</span>
                </a>
            </div>
            <div class="text-header">
                <div class="text-unlock text-sm-medium text-white"><i class="fi fi-rr-car me-2"></i>{{ setting('site_slogan', 'More than 800+ special collection cars in this summer') }}</div>
                <a class="btn btn-brand-2 btn-small text-dark px-3 py-2 text-xs-medium" href="/cars-list-1">
                    Access Now
                    <i class="fi fi-rr-arrow-right ms-1"></i>
                </a>
            </div>
            <div class="top-right-header">
                <div class="box-socials-header d-inline-flex align-items-center gap-2">
                    <a class="icon-socials icon-instagram" href="{{ setting('social_instagram', '#') }}" target="_blank">
                        <i class="fi fi-rr-camera"></i>
                    </a>
                    <a class="icon-socials icon-facebook" href="{{ setting('social_facebook', '#') }}" target="_blank">
                        <i class="fi fi-rr-thumbs-up"></i>
                    </a>
                    <a class="icon-socials icon-twitter" href="{{ setting('social_twitter', '#') }}" target="_blank">
                        <i class="fi fi-rr-share-square"></i>
                    </a>
                    <a class="icon-socials icon-be" href="{{ setting('social_behance', '#') }}" target="_blank">
                        <i class="fi fi-rr-play-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid background-body">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo">
                    <a class="d-flex" href="/">
                        <img class="light-mode" alt="{{ setting('site_name', 'Carento') }}" src="{{ setting('site_logo_dark', '/assets/imgs/template/logo-d.svg') }}">
                    </a>
                </div>
                <div class="header-nav">
                    <nav class="nav-main-menu">
                        <ul class="main-menu">
                            <li>
                                <a href="/">Home</a>
                            </li>
                            <li class="has-children">
                                <a href="#">Cars</a>
                                <ul class="sub-menu">
                                    <li><a href="/cars-list-1">Cars List</a></li>
                                    <li><a href="/cars-details-3">Car Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children">
                                <a href="#">Dealers</a>
                                <ul class="sub-menu">
                                    <li><a href="/dealer-listing">Dealer Listing</a></li>
                                    <li><a href="/dealer-details">Dealer Details</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="/contact">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <div class="burger-icon-2 burger-icon-white" id="btn-offcanvas">
                        <i class="fi fi-rr-menu-burger fs-4 text-dark"></i>
                    </div>
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
