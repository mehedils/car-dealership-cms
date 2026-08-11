@extends('layouts.app')

@section('title', 'Contact Us - Carento')

@section('content')
<div>
    <div class="page-header pt-30 background-body">
        <div class="custom-container position-relative mx-auto">
            <div class="bg-overlay rounded-12 overflow-hidden">
                <img class="w-100 h-100 rounded-12 img-banner" src="/assets/imgs/page-header/banner4.png" alt="Carento" />
            </div>
            <div class="container position-absolute z-1 top-50 start-50 translate-middle">
                <h2 class="text-white">Get in touch</h2>
            </div>
        </div>
    </div>
    <section class="box-section background-body pt-110">
        <div class="container">
            <div class="text-start">
                <h4 class="neutral-1000">Our agents worldwide</h4>
            </div>
            <div class="row mt-30">
                <div class="col-lg-3 col-sm-6">
                    <div class="card-contact">
                        <div class="card-image">
                            <div class="card-icon">
                                <i class="fi fi-rr-marker text-primary fs-1"></i>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title mb-2">
                                <a class="title heading-6" href="#">New York</a>
                            </div>
                            <div class="card-method-contact">
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-marker text-primary fs-5"></i>
                                    </div>
                                    <a class="location text-md-medium ms-2" href="#">{{ setting('contact_address', '750 7th Avenue, Manhattan, New York, NY 10019, USA') }}</a>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-phone-call text-primary fs-5"></i>
                                    </div>
                                    <a class="phone text-md-medium ms-2" href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+1 212 555 0146')) }}">{{ setting('contact_phone', '+1 212 555 0146') }}</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fi fi-rr-envelope text-primary fs-5"></i>
                                    </div>
                                    <a class="email text-md-medium ms-2" href="mailto:{{ setting('contact_email', 'sale@carento.com') }}">{{ setting('contact_email', 'sale@carento.com') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-contact">
                        <div class="card-image">
                            <div class="card-icon">
                                <i class="fi fi-rr-car fs-2 text-dark"></i>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title mb-2">
                                <a class="title heading-6" href="#">Tokyo</a>
                            </div>
                            <div class="card-method-contact">
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-marker text-dark fs-6"></i>
                                    </div>
                                    <a class="location text-md-medium ms-2" href="#">2-11-3 Meguro, Meguro City, Tokyo 153-0063, Japan</a>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-phone-call text-dark fs-6"></i>
                                    </div>
                                    <a class="phone text-md-medium ms-2" href="tel:+81334567890">+81 3 3456 7890</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fi fi-rr-envelope text-dark fs-6"></i>
                                    </div>
                                    <a class="email text-md-medium ms-2" href="mailto:tokyo@carento.com">tokyo@carento.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-contact">
                        <div class="card-image">
                            <div class="card-icon">
                                <i class="fi fi-rr-car fs-2 text-dark"></i>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title mb-2">
                                <a class="title heading-6" href="#">Paris</a>
                            </div>
                            <div class="card-method-contact">
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-marker text-dark fs-6"></i>
                                    </div>
                                    <a class="location text-md-medium ms-2" href="#">22 Rue de la Paix, 75002 Paris, France</a>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-phone-call text-dark fs-6"></i>
                                    </div>
                                    <a class="phone text-md-medium ms-2" href="tel:+33142685300">+33 1 42 68 53 00</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fi fi-rr-envelope text-dark fs-6"></i>
                                    </div>
                                    <a class="email text-md-medium ms-2" href="mailto:paris@carento.com">paris@carento.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="card-contact">
                        <div class="card-image">
                            <div class="card-icon">
                                <i class="fi fi-rr-car fs-2 text-dark"></i>
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title mb-2">
                                <a class="title heading-6" href="#">Sydney</a>
                            </div>
                            <div class="card-method-contact">
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-marker text-dark fs-6"></i>
                                    </div>
                                    <a class="location text-md-medium ms-2" href="#">88 George Street, The Rocks, Sydney NSW 2000, Australia</a>
                                </div>
                                <div class="d-flex align-items-start mb-2">
                                    <div class="icon">
                                        <i class="fi fi-rr-phone-call text-dark fs-6"></i>
                                    </div>
                                    <a class="phone text-md-medium ms-2" href="tel:+61292556000">+61 2 9255 6000</a>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="icon">
                                        <i class="fi fi-rr-envelope text-dark fs-6"></i>
                                    </div>
                                    <a class="email text-md-medium ms-2" href="mailto:sydney@carento.com">sydney@carento.com</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="box-section box-contact-form background-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <h2 class="neutral-1000 mb-25">Get in Touch</h2>
                    <div class="form-contact">
                        <form action="#" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-sm-medium neutral-1000">First Name</label>
                                        <input class="form-control username" type="text" placeholder="First Name" name="first_name" required />
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="text-sm-medium neutral-1000">Last Name</label>
                                        <input class="form-control username" type="text" placeholder="Last Name" name="last_name" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-sm-medium neutral-1000">Email Address</label>
                                        <input class="form-control email" type="email" placeholder="email@domain.com" name="email" required />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-sm-medium neutral-1000">Phone Number</label>
                                        <input class="form-control phone" type="text" placeholder="Phone number" name="phone" />
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-sm-medium neutral-1000">Your Message</label>
                                        <textarea class="form-control" rows="6" placeholder="Leave us a message..." name="message" required></textarea>
                                    </div>
                                </div>
                                <div class="box-remember-forgot">
                                    <div class="form-group">
                                        <div class="remeber-me">
                                            <label class="text-sm-medium neutral-500">
                                                <input class="cb-remember" type="checkbox" name="terms" required /> Agree to our <a class="text-sm-medium neutral-1000" href="#">Terms of service</a> and <a class="text-sm-medium neutral-1000" href="#">Privacy Policy</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-lg-12">
                                     <button type="submit" class="btn btn-book">
                                         Send message
                                         <i class="fi fi-rr-arrow-right ms-2"></i>
                                     </button>
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="ps-lg-5">
                        <h4 class="neutral-1000">Our location</h4>
                        <p class="neutral-500 mb-30">{{ setting('contact_address', '750 7th Avenue, Manhattan, New York, NY 10019, USA') }}</p>
                        <iframe class="h-520 rounded-3" src="{{ setting('google_map_embed', 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d283661.3575233618!2d2.2296777857951824!3d47.16509219592609!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1712486491620!5m2!1svi!2s') }}" width="100%" height="650" style="border: 0;" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
