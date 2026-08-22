<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 text-center text-md-start">
                    <h5 class="color-white wow fadeInDown">{{ __('Subscribe to get exclusive dealership offers, new inventory alerts & price drop updates!') }}</h5>
                </div>
                <div class="col-lg-7 col-md-6 text-center text-md-end mt-md-0 mt-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <form class="form-newsletter wow fadeInUp" action="{{ route('inquiries.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="Newsletter Subscriber">
                            <input type="hidden" name="message" value="Newsletter Subscription Request">
                            <input class="form-control" type="email" name="email" placeholder="{{ __('Your Email') }}" required>
                            <input class="btn btn-brand-2" type="submit" value="{{ __('Subscribe') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Column 1: Dealership Info & Contact -->
            <div class="col-lg-3 col-md-6 col-sm-12 footer-1 mb-30">
                <div class="mt-20 mb-20">
                    <a class="d-flex" href="{{ route('home') }}">
                        <img class="light-mode" alt="{{ setting('site_name', 'Carento') }}" src="{{ setting('site_logo_light', '/assets/imgs/template/logo-w.svg') }}">
                    </a>
                    <div class="box-info-contact mt-3">
                        <p class="text-md neutral-400 icon-address mb-2">{{ setting('contact_address', '750 7th Avenue, Manhattan, New York, NY 10019, USA') }}</p>
                        <p class="text-md neutral-400 icon-worktime mb-2">{{ __('Hours') }}: {{ __(setting('contact_hours', 'Mon - Sat: 9:00 AM - 7:00 PM')) }}</p>
                        <p class="text-md neutral-400 icon-email mb-2">
                            <a href="mailto:{{ setting('contact_email', 'sale@carento.com') }}" class="neutral-400">{{ setting('contact_email', 'sale@carento.com') }}</a>
                        </p>
                    </div>
                    <div class="box-need-help mt-3">
                        <p class="need-help text-md-medium mb-1">{{ __('Need help? Call us') }}</p>
                        <a class="heading-6 phone-support" href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+1 222-555-33-99')) }}">{{ setting('contact_phone', '+1 222-555-33-99') }}</a>
                    </div>
                </div>
            </div>
            <!-- Column 2: Navigation / Quick Links -->
            <div class="col-lg-2 col-md-6 col-xs-6 footer-3 mb-30">
                <h6 class="text-linear-3 mb-20">{{ __('Quick Links') }}</h6>
                <ul class="menu-footer">
                    <li><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                    <li><a href="{{ route('cars.index') }}">{{ __('Inventory') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('Services') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('About Us') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('Contact Us') }}</a></li>
                </ul>
            </div>
            <!-- Column 3: Vehicle Inventory / Categories -->
            <div class="col-lg-2 col-md-6 col-xs-6 footer-2 mb-30">
                <h6 class="text-linear-3 mb-20">{{ __('Vehicles by Type') }}</h6>
                <ul class="menu-footer">
                    <li><a href="{{ route('cars.index', ['type' => 'suv']) }}">{{ __('SUVs') }}</a></li>
                    <li><a href="{{ route('cars.index', ['type' => 'sedan']) }}">{{ __('Sedans') }}</a></li>
                    <li><a href="{{ route('cars.index', ['type' => 'pickup']) }}">{{ __('Pickups & Trucks') }}</a></li>
                    <li><a href="{{ route('cars.index', ['condition' => 'new']) }}">{{ __('New Inventory') }}</a></li>
                    <li><a href="{{ route('cars.index', ['condition' => 'certified']) }}">{{ __('Certified Pre-Owned') }}</a></li>
                </ul>
            </div>
            <!-- Column 4: Dealership Services -->
            <div class="col-lg-2 col-md-6 col-xs-6 footer-4 mb-30">
                <h6 class="text-linear-3 mb-20">{{ __('Our Services') }}</h6>
                <ul class="menu-footer">
                    <li><a href="{{ route('services') }}">{{ __('Vehicle Financing') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('Trade-In Valuation') }}</a></li>
                    <li><a href="{{ route('about') }}">{{ __('Multi-Point Inspection') }}</a></li>
                    <li><a href="{{ route('services') }}">{{ __('Warranty & Protection') }}</a></li>
                    <li><a href="{{ route('cars.index') }}">{{ __('Custom Vehicle Search') }}</a></li>
                </ul>
            </div>
            <!-- Column 5: Support & Inquiries -->
            <div class="col-lg-3 col-md-6 col-xs-6 footer-5 mb-30">
                <h6 class="text-linear-3 mb-20">{{ __('Support & Info') }}</h6>
                <ul class="menu-footer">
                    <li><a href="{{ route('cars.index') }}">{{ __('Schedule Test Drive') }}</a></li>
                    <li><a href="{{ route('about') }}#faqs">{{ __('Frequently Asked Questions') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('Location & Directions') }}</a></li>
                    <li><a href="{{ route('contact') }}">{{ __('Contact Sales Team') }}</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-30">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 text-md-start text-center mb-20">
                    <p class="text-sm color-white mb-0">{{ __(setting('footer_copyright', '© ' . date('Y') . ' ' . setting('site_name', 'Carento') . '. All rights reserved.')) }}</p>
                </div>
                <div class="col-md-6 text-md-end text-center mb-20">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <p class="text-lg-bold neutral-0 d-inline-block mr-10 mb-0">{{ __('Follow Us') }}</p>
                        <div class="box-socials-footer d-inline-block">
                            @if(setting('social_instagram') && setting('social_instagram') !== '#')
                            <a class="icon-socials icon-instagram" href="{{ setting('social_instagram') }}" target="_blank" aria-label="Instagram">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                </svg>
                            </a>
                            @endif
                            @if(setting('social_facebook') && setting('social_facebook') !== '#')
                            <a class="icon-socials icon-facebook" href="{{ setting('social_facebook') }}" target="_blank" aria-label="Facebook">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                </svg>
                            </a>
                            @endif
                            @if(setting('social_twitter') && setting('social_twitter') !== '#')
                            <a class="icon-socials icon-twitter" href="{{ setting('social_twitter') }}" target="_blank" aria-label="Twitter / X">
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                            </a>
                            @endif
                            @if(setting('social_behance') && setting('social_behance') !== '#')
                            <a class="icon-socials icon-be" href="{{ setting('social_behance') }}" target="_blank" aria-label="Behance">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 7h7a3 3 0 0 1 3 3v0a3 3 0 0 1-3 3H3V7z"></path>
                                    <path d="M3 13h8a3.5 3.5 0 0 1 3.5 3.5v0A3.5 3.5 0 0 1 11 20H3v-7z"></path>
                                    <path d="M17 10h4"></path>
                                    <path d="M21 14.5a3.5 3.5 0 1 0-7 0 3.5 3.5 0 0 0 7 0z"></path>
                                </svg>
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
