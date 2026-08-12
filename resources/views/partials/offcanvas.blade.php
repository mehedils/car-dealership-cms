<div class="sidebar-canvas-wrapper perfect-scrollbar button-bg-2">
    <div class="sidebar-canvas-container">
        <div class="sidebar-canvas-head">
            <div class="sidebar-canvas-logo">
                <a class="d-flex" href="/">
                    <img class="light-mode" alt="{{ setting('site_name', 'Carento') }}" src="{{ setting('site_logo_dark', '/assets/imgs/template/logo-d.svg') }}">
                </a>
            </div>
            <div class="sidebar-canvas-lang">
                <a class="close-canvas">
                    <i class="fi fi-rr-cross fs-5"></i>
                </a>
            </div>
        </div>
        <div class="sidebar-canvas-content">
            <div class="box-author-profile">
                <div class="card-author">
                    <div class="card-image">
                        <img src="/assets/imgs/page/homepage1/author2.png" alt="Carento">
                    </div>
                    <div class="card-info">
                        <p class="text-md-bold neutral-1000">Howdy, Steven</p>
                        <p class="text-xs neutral-1000">25 September 2024</p>
                    </div>
                </div>
                <a class="btn btn-black" href="#">Logout</a>
            </div>
            <div class="box-contactus">
                <h6 class="title-contactus neutral-1000">{{ __('Contact Us') }}</h6>
                <div class="contact-info">
                    <p class="address-2 text-md-medium neutral-1000">
                        {{ setting('contact_address', '750 7th Avenue, Manhattan, New York, NY 10019, USA') }}
                    </p>
                    <p class="hour-work-2 text-md-medium neutral-1000">{{ __('Hours') }}: 8:00 - 17:00, Mon - Sat</p>
                    <p class="email-2 text-md-medium neutral-1000">{{ setting('contact_email', 'sale@carento.com') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
