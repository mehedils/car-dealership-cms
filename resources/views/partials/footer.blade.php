<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <div class="row align-items-center">
                <div class="col-lg-5 col-md-6 text-center text-md-start">
                    <h5 class="color-white wow fadeInDown">Subscribe to see secret deals prices drop the moment you
                        sign up!</h5>
                </div>
                <div class="col-lg-7 col-md-6 text-center text-md-end mt-md-0 mt-4">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <form class="form-newsletter wow fadeInUp" action="#">
                            <input class="form-control" type="text" placeholder="Enter your email">
                            <input class="btn btn-brand-2" type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-12 footer-1">
                <div class="mt-20 mb-20">
                    <a class="d-flex" href="/">
                        <img class="light-mode" alt="{{ setting('site_name', 'Carento') }}" src="{{ setting('site_logo_light', '/assets/imgs/template/logo-w.svg') }}">
                    </a>
                    <div class="box-info-contact mt-0">
                        <p class="text-md neutral-400 icon-address">{{ setting('contact_address', '2356 Oakwood Drive, Suite 18, San Francisco, California 94111, US') }}</p>
                        <p class="text-md neutral-400 icon-worktime">Hours: 8:00 - 17:00, Mon - Sat</p>
                        <p class="text-md neutral-400 icon-email">{{ setting('contact_email', 'sale@carento.com') }}</p>
                    </div>
                    <div class="box-need-help">
                        <p class="need-help text-md-medium mb-5">Need help? Call us</p>
                        <br><a class="heading-6 phone-support" href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+1 222-555-33-99')) }}">{{ setting('contact_phone', '+1 222-555-33-99') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-xs-6 footer-3">
                <h6 class="text-linear-3">Company</h6>
                <ul class="menu-footer">
                    <li><a href="/">Home</a></li>
                    <li><a href="/cars-list-1">Cars List</a></li>
                    <li><a href="/cars-details-3">Car Details</a></li>
                    <li><a href="/dealer-listing">Dealer Listing</a></li>
                    <li><a href="/dealer-details">Dealer Details</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-xs-6 footer-2">
                <h6 class="text-linear-3">Our Services</h6>
                <ul class="menu-footer">
                    <li><a href="#">Car Rental Services</a></li>
                    <li><a href="#">Vehicle Leasing Options</a></li>
                    <li><a href="#">Long-Term Car Rentals</a></li>
                    <li><a href="#">Car Sales and Trade-Ins</a></li>
                    <li><a href="#">Luxury Car Rentals</a></li>
                    <li><a href="#">Rent-to-Own Programs</a></li>
                    <li><a href="#">Fleet Management Solutions</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-xs-6 footer-4">
                <h6 class="text-linear-3">Our Partners</h6>
                <ul class="menu-footer">
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Travel Agents</a></li>
                    <li><a href="#">AARP Members</a></li>
                    <li><a href="#">Points Programs</a></li>
                    <li><a href="#">Military &amp; Veterans</a></li>
                    <li><a href="#">Work with us</a></li>
                    <li><a href="#">Advertise with us</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-6 footer-5">
                <h6 class="text-linear-3">Support</h6>
                <ul class="menu-footer">
                    <li><a href="#">Forum support</a></li>
                    <li><a href="#">Help Center</a></li>
                    <li><a href="#">Live chat</a></li>
                    <li><a href="#">How it works</a></li>
                    <li><a href="#">Security</a></li>
                    <li><a href="#">Refund Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom mt-50">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-6 text-md-start text-center mb-20">
                    <p class="text-sm color-white">{{ setting('footer_copyright', '© ' . date('Y') . ' Carento Inc. All rights reserved.') }}</p>
                </div>
                <div class="col-md-6 text-md-end text-center mb-20">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-end">
                        <p class="text-lg-bold neutral-0 d-inline-block mr-10">Follow us</p>
                        <div class="box-socials-footer d-inline-block">
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
        </div>
    </div>
</footer>
