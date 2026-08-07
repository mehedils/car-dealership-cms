@extends('layouts.app')

@section('title', 'Carento - Dealer Listing')

@section('content')
<div>
    <div class="page-header pt-30 background-body">
        <div class="custom-container position-relative mx-auto">
            <div class="bg-overlay rounded-12 overflow-hidden">
                <img class="w-100 h-100 img-banner" src="/assets/imgs/page-header/banner7.png" alt="Carento">
            </div>
            <div class="container position-absolute z-1 top-50 start-50 translate-middle">
                <h2 class="text-white">Dealer Listing</h2>
                <span class="text-white text-xl-medium">Professional car rental people</span>
            </div>
            <div class="background-body position-absolute z-1 top-100 start-50 translate-middle px-3 py-2 rounded-12 border d-flex gap-3 d-none">
                <a href="/" class="neutral-700 text-md-medium">Home</a>
                <span>
                    <img src="/assets/imgs/template/icons/arrow-right.svg" alt="Carento">
                </span>
                <a href="#" class="neutral-1000 text-md-bold"></a>
            </div>
        </div>
    </div>
    <section class="box-section background-body py-96 border-bottom">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-8">
                    <h4 class="neutral-1000">Our Vehicle Fleet</h4>
                    <p class="text-lg-medium neutral-500">Turning dreams into reality with versatile vehicles.</p>
                </div>
                <div class="col-md-4">
                    <div class="d-flex justify-content-end mt-md-0 mt-4">
                        <a class="btn btn-primary rounded-3" href="/cars-list-1">
                            Become a renter
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-60">
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-1.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Opel Manchester</a>
                                <p class="text-md-medium neutral-500">123 Kingsway Strandeif, Manchester, M19 2XS</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-2.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">BMW Birmingham</a>
                                <p class="text-md-medium neutral-500">45 Solihull Road, Birmingham, B91 2DA</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-3.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Toyota London</a>
                                <p class="text-md-medium neutral-500">78 High Street Nomawal, London, E1 6RL</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-4.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Ford Glasgow</a>
                                <p class="text-md-medium neutral-500">15 Buchanan Street,
                                    Glasgow, G1 3HL</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-5.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Volkswagen Leeds</a>
                                <p class="text-md-medium neutral-500">230 block 90 Kirkstall Road, Leeds, LS3 1HS</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-6.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Honda Edinburgh</a>
                                <p class="text-md-medium neutral-500">62 Princes Street,
                                    Edinburgh, EH2 4AD</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-7.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Nissan Bristol</a>
                                <p class="text-md-medium neutral-500">11 Clifton Down Road,
                                    Bristol, BS8 4AB</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-8.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Kia Liverpool</a>
                                <p class="text-md-medium neutral-500">29 Hope Street,
                                    Liverpool, L1 9BX</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-9.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Peugeot Sheffield</a>
                                <p class="text-md-medium neutral-500">Block 123 / 90 Kirkstall Road, Leeds, LS3 1HS</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-10.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Volvo Oxford</a>
                                <p class="text-md-medium neutral-500">45 Solihull Road, Birmingham, B91 2DA</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-11.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Mazda Southampton</a>
                                <p class="text-md-medium neutral-500">123 Kingsway Strandeif, Manchester, M19 2XS</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-12.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Land Rover Norwich</a>
                                <p class="text-md-medium neutral-500">45 Solihull Road, Birmingham, B91 2DA</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-13.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Jeep Nottingham</a>
                                <p class="text-md-medium neutral-500">123 Kingsway Strandeif, Manchester, M19 2XS</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-2.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">BMW Manchester</a>
                                <p class="text-md-medium neutral-500">11 Clifton Down Road,
                                    Bristol, BS8 4AB</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="card-contact card-dealer d-flex">
                        <div class="card-image me-3">
                            <div class="position-relative">
                                <img src="/assets/imgs/dealer/dealer-listing/icon-4.svg" alt="Carento">
                            </div>
                        </div>
                        <div class="card-info">
                            <div class="card-title">
                                <a class="title heading-6" href="/dealer-details">Ford Manchester</a>
                                <p class="text-md-medium neutral-500">123 Kingsway Strandeif, Manchester, M19 2XS</p>
                            </div>
                            <div class="card-method-contact2">
                                <a class="email text-xs-bold" href="/cars-list-1">
                                    180 Vehicles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link active" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">4</a></li>
                    <li class="page-item"><a class="page-link" href="#">5</a></li>
                    <li class="page-item"><a class="page-link" href="#">...</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">
                                <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </section>
    <section class="section-cta-7 background-body py-96">
        <div class="box-cta-6">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">
                        <a class="btn btn-signin bg-2 text-dark mb-4" href="#">Our Mission</a>
                        <h4 class="mb-4 neutral-1000">Sell your car at a fair price. <br>Get started with us today.</h4>
                        <p class="text-lg-medium neutral-500 mb-4">Our mission is to make car rental easy, accessible, and affordable for everyone. We believe that renting a car should be a hassle-free experience, and we're dedicated to ensuring that every customer finds the perfect vehicle for their journey.</p>
                        <div class="row">
                            <div class="col">
                                <ul class="list-ticks-green list-ticks-green-2">
                                    <li class="neutral-1000 pe-0">Explore a wide range of flexible rental options to suit your needs</li>
                                    <li class="neutral-1000 pe-0">Comprehensive insurance coverage for complete peace of mind</li>
                                    <li class="neutral-1000 pe-0">24/7 customer support for assistance anytime, anywhere</li>
                                </ul>
                            </div>
                        </div>
                        <a class="btn btn-primary mt-2" href="#">
                            Get Started Now
                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 15L15 8L8 1M15 8L1 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="col-lg-6 offset-lg-1 position-relative z-1 mt-lg-0 mt-4">
                        <div class="d-flex flex-column gap-4">
                            <div class="d-flex gap-4">
                                <div class="position-relative">
                                    <img class="bdrd8 w-100" src="/assets/imgs/cta/cta-8/img-1.png" alt="Carento">
                                </div>
                                <div class="mt-auto">
                                    <img class="bdrd8 w-100" src="/assets/imgs/cta/cta-8/img-2.png" alt="Carento">
                                </div>
                            </div>
                            <div class="d-flex gap-4">
                                <div class="position-relative">
                                    <img class="bdrd8 w-100" src="/assets/imgs/cta/cta-8/img-3.png" alt="Carento">
                                </div>
                                <div class="position-relative">
                                    <img class="bdrd8 w-100" src="/assets/imgs/cta/cta-8/img-4.png" alt="Carento">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-overlay position-absolute bottom-0 end-0 h-75 background-brand-2 opacity-25 z-0 rounded-start-pill"></div>
        </div>
    </section>
    <section class="section-static-1 background-body background-2 pt-80 pb-80">
        <div class="container">
            <div class="row">
                <div>
                    <div class="wow fadeIn">
                        <div class="d-flex align-items-center justify-content-around flex-wrap">
                            <div class="mb-4 mb-lg-0 d-block px-lg-5 px-3">
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <h3 class="count neutral-1000" data-count="45">0</h3>
                                    <h3 class="neutral-1000">+</h3>
                                </div>
                                <div class="text-md-start text-center">
                                    <p class="text-lg-bold neutral-1000">Global</p>
                                    <p class="text-lg-bold neutral-1000">Branches</p>
                                </div>
                            </div>
                            <div class="mb-4 mb-lg-0 d-block px-lg-5 px-3">
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <h3 class="count neutral-1000" data-count="29">0</h3>
                                    <h3 class="neutral-1000">K</h3>
                                </div>
                                <div class="text-md-start text-center">
                                    <p class="text-lg-bold neutral-1000">Destinations</p>
                                    <p class="text-lg-bold neutral-1000">Collaboration</p>
                                </div>
                            </div>
                            <div class="mb-4 mb-lg-0 d-block px-lg-5 px-3">
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <h3 class="count neutral-1000" data-count="20">0</h3>
                                    <h3 class="neutral-1000">+</h3>
                                </div>
                                <div class="text-md-start text-center">
                                    <p class="text-lg-bold neutral-1000">Years</p>
                                    <p class="text-lg-bold neutral-1000">Experience</p>
                                </div>
                            </div>
                            <div class="mb-4 mb-lg-0 d-block px-lg-5 px-3">
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <h3 class="count neutral-1000" data-count="168">0</h3>
                                    <h3 class="neutral-1000">K</h3>
                                </div>
                                <div class="text-md-start text-center">
                                    <p class="text-lg-bold neutral-1000">Happy</p>
                                    <p class="text-lg-bold neutral-1000">Customers</p>
                                </div>
                            </div>
                            <div class="mb-4 mb-lg-0 d-block px-lg-5 px-3">
                                <div class="d-flex justify-content-center justify-content-md-start">
                                    <h3 class="count neutral-1000" data-count="15">0</h3>
                                    <h3 class="neutral-1000">M</h3>
                                </div>
                                <div class="text-md-start text-center">
                                    <p class="text-lg-bold neutral-1000">User</p>
                                    <p class="text-lg-bold neutral-1000">Account</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
