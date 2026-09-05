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
                <h4 class="neutral-1000">{{ __('Our Dealership Locations') }}</h4>
            </div>
            <div class="row mt-30">
                @if(isset($locations) && count($locations) > 0)
                    @foreach($locations as $loc)
                        <div class="col-lg-4 col-sm-6 mb-30">
                            <div class="card-contact h-100 shadow-sm border p-4 rounded-16 background-card">
                                <div class="card-image mb-3">
                                    <div class="card-icon">
                                        <i class="fi fi-rr-marker text-primary fs-1"></i>
                                    </div>
                                </div>
                                <div class="card-info">
                                    <div class="card-title mb-3">
                                        <h5 class="heading-6 mb-0 neutral-1000">{{ $loc->name }}</h5>
                                    </div>
                                    <div class="card-method-contact">
                                        @if($loc->address)
                                            <div class="d-flex align-items-start mb-2">
                                                <div class="icon">
                                                    <i class="fi fi-rr-marker text-primary fs-5"></i>
                                                </div>
                                                <span class="location text-md-medium ms-2 neutral-500">{{ $loc->address }}</span>
                                            </div>
                                        @endif
                                        @php
                                            $phone = $loc->phone ?: setting('contact_phone');
                                            $cleanPhone = preg_replace('/[^0-9+]/', '', $phone);
                                        @endphp
                                        @if($phone)
                                            <div class="d-flex align-items-start mb-2">
                                                <div class="icon">
                                                    <i class="fi fi-rr-phone-call text-primary fs-5"></i>
                                                </div>
                                                <a class="phone text-md-medium ms-2 neutral-1000" href="tel:{{ $cleanPhone }}">{{ $phone }}</a>
                                            </div>
                                        @endif
                                        @php
                                            $email = $loc->email ?: setting('contact_email');
                                        @endphp
                                        @if($email)
                                            <div class="d-flex align-items-center">
                                                <div class="icon">
                                                    <i class="fi fi-rr-envelope text-primary fs-5"></i>
                                                </div>
                                                <a class="email text-md-medium ms-2 neutral-1000" href="mailto:{{ $email }}">{{ $email }}</a>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-lg-4 col-sm-6 mb-30">
                        <div class="card-contact h-100 shadow-sm border p-4 rounded-16 background-card">
                            <div class="card-image mb-3">
                                <div class="card-icon">
                                    <i class="fi fi-rr-marker text-primary fs-1"></i>
                                </div>
                            </div>
                            <div class="card-info">
                                <div class="card-title mb-3">
                                    <h5 class="heading-6 mb-0 neutral-1000">{{ setting('site_name', 'Main Showroom') }}</h5>
                                </div>
                                <div class="card-method-contact">
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="icon">
                                            <i class="fi fi-rr-marker text-primary fs-5"></i>
                                        </div>
                                        <span class="location text-md-medium ms-2 neutral-500">{{ setting('contact_address', '750 7th Avenue, Manhattan, New York, NY 10019, USA') }}</span>
                                    </div>
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="icon">
                                            <i class="fi fi-rr-phone-call text-primary fs-5"></i>
                                        </div>
                                        <a class="phone text-md-medium ms-2 neutral-1000" href="tel:{{ preg_replace('/[^0-9+]/', '', setting('contact_phone', '+1 212 555 0146')) }}">{{ setting('contact_phone', '+1 212 555 0146') }}</a>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="icon">
                                            <i class="fi fi-rr-envelope text-primary fs-5"></i>
                                        </div>
                                        <a class="email text-md-medium ms-2 neutral-1000" href="mailto:{{ setting('contact_email', 'sale@carento.com') }}">{{ setting('contact_email', 'sale@carento.com') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
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
                                        <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.5 15L15.5 8L8.5 1M15.5 8L1.5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
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
