<header class="header sticky-bar header-home-2">
    <x-topbar />
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
