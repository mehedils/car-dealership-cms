<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar button-bg-2">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-logo">
            <a class="d-flex" href="/"><img class="light-mode" alt="{{ setting('site_name', 'Carento') }}" src="{{ setting('site_logo_dark', '/assets/imgs/template/logo-d.svg') }}"></a>
            <div class="btn-close-mobile-menu" id="btn-mobile-menu-close" role="button" aria-label="{{ __('Close menu') }}">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </div>
        </div>
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border mb-30">
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li>
                                <a href="/">{{ __('Home') }}</a>
                            </li>
                            <li>
                                <a href="/cars">{{ __('Cars') }}</a>
                            </li>
                            <li>
                                <a href="/services">{{ __('Services') }}</a>
                            </li>
                            <li>
                                <a href="/about">{{ __('About Us') }}</a>
                            </li>
                            <li>
                                <a href="/contact">{{ __('Contact Us') }}</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account p-3">
                    <button class="btn btn-brand-2 btn-header-lead text-dark w-100 shadow-sm" data-bs-toggle="modal" data-bs-target="#leadModal">
                        <i class="fi fi-rr-envelope"></i>
                        <span>{{ __('Send Inquiry') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
