@extends('layouts.app')
@section('title', $car->name . ' - ' . setting('site_name', 'Carento'))
@section('content')
@php
    $currencySymbol = setting('currency_symbol', '$');
    $currencyCode = setting('currency_code', ($currencySymbol !== '$' && $currencySymbol !== 'USD') ? $currencySymbol : 'USD');
@endphp
<div>
    <section class="box-section box-breadcrumb background-body">
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="{{ route('home') }}">{{ __('Home') }}</a>
                    <span class="arrow-right">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </li>
                <li>
                    <a href="{{ route('cars.index') }}">{{ __('Cars') }}</a>
                    <span class="arrow-right">
                        <svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 11L6 6L1 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </span>
                </li>
                <li>
                    <span class="text-breadcrumb">{{ $car->name }}</span>
                </li>
            </ul>
        </div>
    </section>
    <section class="box-section box-content-tour-detail background-body pt-0">
        <div class="container">
            <div class="tour-header pb-20 mb-15">
                <div class="row align-items-end justify-content-between g-3">
                    <div class="col-lg-7">
                        <div class="tour-title-main">
                            <h2 class="neutral-1000 fw-bold mb-2">{{ $car->name }}</h2>
                            @if($car->estimated_monthly_payment > 0)
                                <div class="d-flex align-items-center gap-2 flex-wrap">
                                    <span class="badge bg-light text-primary border rounded-pill px-3 py-2 text-xs-bold d-inline-flex align-items-center">
                                        <i class="fi fi-rr-credit-card me-1"></i>{{ __('Financiamiento disponible desde :symbol:amount/mes', ['symbol' => $currencySymbol, 'amount' => number_format($car->estimated_monthly_payment)]) }}
                                    </span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="d-flex flex-column align-items-lg-end align-items-start gap-2">
                            <div class="d-flex align-items-baseline justify-content-lg-end">
                                <h2 class="text-3xl-bold neutral-1000 mb-0">{{ $currencySymbol }}{{ number_format($car->price) }}</h2>
                                <span class="text-sm-bold text-muted ms-1">{{ $currencyCode }}</span>
                            </div>
                            <div class="d-flex align-items-center">
                                <button type="button" class="btn btn-share btn-sm px-3 py-2 rounded-pill text-xs-bold d-inline-flex align-items-center border bg-white" onclick="shareVehicle(this)" id="btnShareVehicle">
                                    <svg width="14" height="16" viewBox="0 0 16 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="me-1">
                                        <path d="M13 11.5332C12.012 11.5332 11.1413 12.0193 10.5944 12.7584L5.86633 10.3374C5.94483 10.0698 6 9.79249 6 9.49989C6 9.10302 5.91863 8.72572 5.77807 8.37869L10.7262 5.40109C11.2769 6.04735 12.0863 6.46655 13 6.46655C14.6543 6.46655 16 5.12085 16 3.46655C16 1.81225 14.6543 0.466553 13 0.466553C11.3457 0.466553 10 1.81225 10 3.46655C10 3.84779 10.0785 4.20942 10.2087 4.54515L5.24583 7.53149C4.69563 6.90442 3.8979 6.49989 3 6.49989C1.3457 6.49989 0 7.84559 0 9.49989C0 11.1542 1.3457 12.4999 3 12.4999C4.00433 12.4999 4.8897 11.9996 5.4345 11.2397L10.147 13.6529C10.0602 13.9331 10 14.2249 10 14.5332C10 16.1875 11.3457 17.5332 13 17.5332C14.6543 17.5332 16 16.1875 16 14.5332C16 12.8789 14.6543 11.5332 13 11.5332Z" fill="currentColor"></path>
                                    </svg>
                                    <span class="share-btn-text">{{ __('Share') }}</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <div class="container-banner-activities">
                        <div class="box-banner-activities">
                            <div class="banner-activities-detail">
                                @php $gallery = $car->getMedia('gallery'); @endphp
                                @forelse($gallery as $media)
                                    <div class="banner-slide-activity">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $car->name }}">
                                    </div>
                                @empty
                                    <div class="banner-slide-activity">
                                        <img src="/assets/imgs/cars-details/banner.png" alt="{{ $car->name }}">
                                    </div>
                                    <div class="banner-slide-activity">
                                        <img src="/assets/imgs/cars-details/banner2.png" alt="{{ $car->name }}">
                                    </div>
                                @endforelse
                            </div>
                            <div class="box-button-abs">
                                <a class="btn btn-primary rounded-pill" href="#">
                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 8V2.75C20 2.3375 19.6625 2 19.25 2H14C13.5875 2 13.25 2.3375 13.25 2.75V8C13.25 8.4125 13.5875 8.75 14 8.75H19.25C19.6625 8.75 20 8.4125 20 8ZM19.25 0.5C20.495 0.5 21.5 1.505 21.5 2.75V8C21.5 9.245 20.495 10.25 19.25 10.25H14C12.755 10.25 11.75 9.245 11.75 8V2.75C11.75 1.505 12.755 0.5 14 0.5H19.25Z" fill="currentColor"></path>
                                        <path d="M20 19.25V14C20 13.5875 19.6625 13.25 19.25 13.25H14C13.5875 13.25 13.25 13.5875 13.25 14V19.25C13.25 19.6625 13.5875 20 14 20H19.25C19.6625 20 20 19.6625 20 19.25ZM19.25 11.75C20.495 11.75 21.5 12.755 21.5 14V19.25C21.5 20.495 20.495 21.5 19.25 21.5H14C12.755 21.5 11.75 20.495 11.75 19.25V14C11.75 12.755 12.755 11.75 14 11.75H19.25Z" fill="currentColor"></path>
                                        <path d="M8 8.75C8.4125 8.75 8.75 8.4125 8.75 8V2.75C8.75 2.3375 8.4125 2 8 2H2.75C2.3375 2 2 2.3375 2 2.75V8C2 8.4125 2.3375 8.75 2.75 8.75H8ZM8 0.5C9.245 0.5 10.25 1.505 10.25 2.75V8C10.25 9.245 9.245 10.25 8 10.25H2.75C1.505 10.25 0.5 9.245 0.5 8V2.75C0.5 1.505 1.505 0.5 2.75 0.5H8Z" fill="currentColor"></path>
                                        <path d="M8 20C8.4125 20 8.75 19.6625 8.75 19.25V14C8.75 13.5875 8.4125 13.25 8 13.25H2.75C2.3375 13.25 2 13.5875 2 14V19.25C2 19.6625 2.3375 20 2.75 20H8ZM8 11.75C9.245 11.75 10.25 12.755 10.25 14V19.25C10.25 20.495 9.245 21.5 8 21.5H2.75C1.505 21.5 0.5 20.495 0.5 19.25V14C0.5 12.755 1.505 11.75 2.75 11.75H8Z" fill="currentColor"></path>
                                    </svg>
                                    See All Photos
                                </a>
                                 <a class="btn btn-white-md popup-youtube" href="https://www.youtube.com/watch?v=AOg61RB75Ho">
                                    <i class="fi fi-rr-play-alt text-primary fs-5 me-1"></i>
                                    Video Clips
                                </a>
                            </div>
                        </div>
                        <div class="slider-thumnail-activities">
                            <div class="slider-nav-thumbnails-activities-detail">
                                @forelse($gallery as $media)
                                    <div class="banner-slide">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $car->name }}">
                                    </div>
                                @empty
                                    <div class="banner-slide">
                                        <img src="/assets/imgs/page/car/banner-thumn.png" alt="{{ $car->name }}">
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="box-feature-car">
                        <div class="list-feature-car align-items-start">
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-dashboard fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ is_numeric($car->mileage) ? number_format((int)$car->mileage) . ' mi' : ($car->mileage ?? '56,500 mi') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-gas-pump fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->fuelType?->name ?? 'Diesel' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-settings-sliders fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->transmission ?? 'Automatic' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-user fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->seats ?? 5 }} {{ __('seats') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-calendar fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->year ? $car->year : ($car->condition ? ucfirst(__($car->condition)) : '2024') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-car fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->carType?->name ?? 'SUVs' }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                            <path d="M18 20V6a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v14"></path>
                                            <path d="M2 20h20"></path>
                                            <circle cx="14" cy="12" r="1.5" fill="currentColor"></circle>
                                        </svg>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->doors ?? 4 }} {{ __('Doors') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-primary">
                                            <path d="M3 10h2V8h2V6h4v2h2v2h2"></path>
                                            <path d="M7 10v8h10v-8"></path>
                                            <line x1="10" y1="14" x2="14" y2="14"></line>
                                            <path d="M17 12h4v4h-4"></path>
                                            <path d="M1 12h2v4H1z"></path>
                                        </svg>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->engine_capacity ?? '2.5L' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-collapse-expand">
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOverview" aria-expanded="false" aria-controls="collapseOverview">
                                <h6>Overview</h6>
                                <svg width="12" height="7" viewBox="0 0 12 7" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                                </svg>
                            </button>
                            <div class="collapse show" id="collapseOverview">
                                <div class="card card-body">
                                    <p>{{ $car->description ?? 'No detailed description available for this vehicle.' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseItinerary" aria-expanded="false" aria-controls="collapseItinerary">
                                <h6>Features & Amenities</h6>
                                <svg width="12" height="7" viewBox="0 0 12 7" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                                </svg>
                            </button>
                            <div class="collapse" id="collapseItinerary">
                                <div class="card card-body">
                                    <ul class="list-checked-green">
                                        @forelse($car->amenities as $amenity)
                                            <li>{{ $amenity->name }}</li>
                                        @empty
                                            <li>Bluetooth Connectivity</li>
                                            <li>Rear View Camera</li>
                                            <li>Leather Seats</li>
                                            <li>Navigation System</li>
                                        @endforelse
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQuestion" aria-expanded="false" aria-controls="collapseQuestion">
                                <h6>Question Answers</h6>
                                <svg width="12" height="7" viewBox="0 0 12 7" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                                </svg>
                            </button>
                            <div class="collapse" id="collapseQuestion">
                                <div class="card card-body">
                                    <div class="list-questions">
                                        <div class="item-question">
                                            <div class="head-question">
                                                <p class="text-md-bold neutral-1000">Is The High Roller suitable for all ages?</p>
                                            </div>
                                            <div class="content-question">
                                                <p class="text-sm-medium neutral-800">Absolutely! The High Roller offers a family-friendly experience suitable for visitors of all ages. Children must be accompanied by an adult.</p>
                                            </div>
                                        </div>
                                        <div class="item-question active">
                                            <div class="head-question">
                                                <p class="text-md-bold neutral-1000">Can I bring food or drinks aboard The High Roller?</p>
                                            </div>
                                            <div class="content-question">
                                                <p class="text-sm-medium neutral-800">Outside food and beverages are not permitted on The High Roller. However, there are nearby dining options at The LINQ Promenade where you can enjoy a meal before or after your ride.</p>
                                            </div>
                                        </div>
                                        <div class="item-question">
                                            <div class="head-question">
                                                <p class="text-md-bold neutral-1000">Is The High Roller wheelchair accessible?</p>
                                            </div>
                                            <div class="content-question">
                                                <p class="text-sm-medium neutral-800">es, The High Roller cabins are wheelchair accessible, making it possible for everyone to enjoy the breathtaking views of Las Vegas.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- Review System & Add Review (Disabled)
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReviews" aria-expanded="false" aria-controls="collapseReviews">
                                <h6>Rate Reviews</h6>
                                <svg width="12" height="7" viewBox="0 0 12 7" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                                </svg>
                            </button>
                            <div class="collapse" id="collapseReviews">
                                <div class="card card-body">
                                    <div class="head-reviews">
                                        <div class="review-left">
                                            <div class="review-info-inner">
                                                <h6 class="neutral-1000">4.95 / 5</h6>
                                                <p class="text-sm-medium neutral-400">(672 reviews)</p>
                                                <div class="review-rate">
                                                    
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="review-right">
                                            <div class="review-progress">
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Price</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 90%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-rv-score">
                                                        <p class="text-sm-bold">4.8</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Service</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 95%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-rv-score">
                                                        <p class="text-sm-bold">4.9</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Safety</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 90%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-rv-score">
                                                        <p class="text-sm-bold">4.8</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Entertainment</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 80%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-rv-score">
                                                        <p class="text-sm-bold">4.0</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Accessibility</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 90%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-rv-score">
                                                        <p class="text-sm-bold">4.8</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Support</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 90%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-rv-score">
                                                        <p class="text-sm-bold">4.8</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-reviews">
                                        <div class="item-review">
                                            <div class="head-review">
                                                <div class="author-review">
                                                    <img src="/assets/imgs/page/tour-detail/author.png" alt="Travila">
                                                    <div class="author-info">
                                                        <p class="text-lg-bold">Sophia Miller</p>
                                                        <p class="text-sm-medium neutral-500">March 2024</p>
                                                    </div>
                                                </div>
                                                <div class="rate-review">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                </div>
                                            </div>
                                            <div class="content-review">
                                                <p class="text-sm-medium neutral-800">The views from The High Roller were absolutely stunning! It's a fantastic way to see the Strip and the surrounding area. The cabins are spacious and comfortable, and the audio commentary adds an extra layer of enjoyment. Highly recommend!</p>
                                            </div>
                                        </div>
                                        <div class="item-review">
                                            <div class="head-review">
                                                <div class="author-review">
                                                    <img src="/assets/imgs/page/tour-detail/author2.png" alt="Travila">
                                                    <div class="author-info">
                                                        <p class="text-lg-bold">David Johnson</p>
                                                        <p class="text-sm-medium neutral-500">February 2024</p>
                                                    </div>
                                                </div>
                                                <div class="rate-review">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                </div>
                                            </div>
                                            <div class="content-review">
                                                <p class="text-sm-medium neutral-800">We had a fantastic time on The High Roller. The views were amazing, and the ride was very smooth. It's a great way to see Las Vegas from a different perspective. The staff were friendly and helpful. Definitely worth it! The High Roller was one of the highlights of our Las Vegas trip.</p>
                                            </div>
                                        </div>
                                        <div class="item-review">
                                            <div class="head-review">
                                                <div class="author-review">
                                                    <img src="/assets/imgs/page/tour-detail/author3.png" alt="Travila">
                                                    <div class="author-info">
                                                        <p class="text-lg-bold">Emily Brown</p>
                                                        <p class="text-sm-medium neutral-500">January 2024</p>
                                                    </div>
                                                </div>
                                                <div class="rate-review">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                    <img src="/assets/imgs/page/tour-detail/star.svg" alt="Travila">
                                                </div>
                                            </div>
                                            <div class="content-review">
                                                <p class="text-sm-medium neutral-800">Took my family on The High Roller, and we all loved it! The kids were amazed by the views, and the adults enjoyed the experience just as much. It's suitable for all ages and definitely a highlight of our trip to Vegas. Don't miss your chance to see Las Vegas from a whole new perspective and create memories that will last a lifetime!</p>
                                            </div>
                                        </div>
                                    </div>
                                    <nav class="box-pagination">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                <a class="page-link page-prev" href="#">
                                                    <span class="icon-prev">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link active" href="#">1</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">2</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">3</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="#">...</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link page-next" href="#">
                                                    <span class="icon-next">
                                                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M5.99984 1.33325L10.6665 5.99992M10.6665 5.99992L5.99984 10.6666M10.6665 5.99992H1.33317" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </span>
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAddReview" aria-expanded="false" aria-controls="collapseAddReview">
                                <h6>Add a review</h6>
                                <svg width="12" height="7" viewBox="0 0 12 7" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1L6 6L11 1" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                                </svg>
                            </button>
                            <div class="collapse" id="collapseAddReview">
                                <div class="card card-body">
                                    <div class="box-type-reviews">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="box-type-review">
                                                    <p class="text-sm-bold text-type-rv">Price</p>
                                                    <p class="rate-type-review">
                                                        
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                    </p>
                                                </div>
                                                <div class="box-type-review">
                                                    <p class="text-sm-bold text-type-rv">Service</p>
                                                    <p class="rate-type-review">
                                                        
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="box-type-review">
                                                    <p class="text-sm-bold text-type-rv">Safety</p>
                                                    <p class="rate-type-review">
                                                        
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                    </p>
                                                </div>
                                                <div class="box-type-review">
                                                    <p class="text-sm-bold text-type-rv">Entertainment</p>
                                                    <p class="rate-type-review">
                                                        
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="box-type-review">
                                                    <p class="text-sm-bold text-type-rv">Accessibility</p>
                                                    <p class="rate-type-review">
                                                        
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                    </p>
                                                </div>
                                                <div class="box-type-review">
                                                    <p class="text-sm-bold text-type-rv">Support</p>
                                                    <p class="rate-type-review">
                                                        
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                        <img src="/assets/imgs/page/tour-detail/star-big.svg" alt="Travila">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-form-reviews">
                                        <h6 class="text-md-bold neutral-1000 mb-15">Leave feedback</h6>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Your name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Email address">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Your comment"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <button class="btn btn-black-lg-square">
                                                    Submit review
                                                    <svg width="16" height="16" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke="" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-banner">
                        <div class="p-4 background-body border rounded-3">
                            <p class="text-xl-bold neutral-1000 mb-4">{{ __('Get Started') }}</p>
                            <button type="button" 
                                    class="btn btn-primary w-100 rounded-3 py-3 mb-3 d-flex align-items-center justify-content-center" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#leadModal"
                                    data-car-id="{{ $car->id }}"
                                    data-car-name="{{ $car->name }}"
                                    data-car-price="{{ $currencySymbol }}{{ number_format($car->price) }} {{ $currencyCode }}"
                                    data-subject-title="{{ __('Schedule Test Drive') }}"
                                    data-subject-message="{{ __('Hello, I would like to schedule a test drive for this vehicle (:car). Please contact me to coordinate a date and time.', ['car' => $car->name]) }}">
                                <span class="me-2">{{ __('Schedule Test Drive') }}</span>
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 15L15.5 8L8.5 1M15.5 8L1.5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                            <button type="button" 
                                    class="btn btn-book bg-2 w-100 rounded-3 py-3 d-flex align-items-center justify-content-center" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#leadModal"
                                    data-car-id="{{ $car->id }}"
                                    data-car-name="{{ $car->name }}"
                                    data-car-price="{{ $currencySymbol }}{{ number_format($car->price) }} {{ $currencyCode }}"
                                    data-subject-title="{{ __('Make An Offer Price') }}"
                                    data-subject-message="{{ __('Hello, I would like to make an offer for this vehicle (:car). My proposed price is: :symbol', ['car' => $car->name, 'symbol' => $currencySymbol]) }}">
                                <span class="me-2">{{ __('Make An Offer Price') }}</span>
                                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.5 15L15.5 8L8.5 1M15.5 8L1.5 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="booking-form">
                        <div class="head-booking-form">
                            <p class="text-xl-bold neutral-1000">{{ __('Inquire About This Car') }}</p>
                        </div>
                        <div class="content-booking-form">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('inquiries.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">{{ __('Your Name') }}</label>
                                    <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">{{ __('Your Email') }}</label>
                                    <input type="email" name="email" class="form-control" placeholder="john@example.com">
                                </div>
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">{{ __('Phone Number') }}</label>
                                    <input type="text" name="phone" class="form-control" placeholder="+1 234 567 890" required>
                                </div>
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">{{ __('Message') }}</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="{{ __('I am interested in this vehicle...') }}" required></textarea>
                                </div>
                                <div class="box-button-book mt-4">
                                    <button type="submit" class="btn btn-book border-0 w-100">
                                        {{ __('Send Inquiry') }}
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8 15L15 8L8 1M15 8L1 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-left border-1 background-card">
                        <h6 class="text-xl-bold neutral-1000">Listed by</h6>
                        <div class="box-sidebar-content">
                            <div class="box-agent-support border-bottom pb-3 mb-3">
                                <div class="card-author">
                                    <div class="me-2">
                                        <img src="/assets/imgs/template/icons/car-1.png" alt="Carento">
                                    </div>
                                    <div class="card-author-info">
                                        <p class="text-lg-bold neutral-1000">Emily Rose</p>
                                        <p class="text-sm-medium neutral-500">Las Vegas, USA</p>
                                    </div>
                                </div>
                            </div>
                            <div class="box-info-contact">
                                <p class="text-md-medium mobile-phone neutral-1000">
                                    <span class="text-md-bold">Mobile:</span> 1-222-333-4444
                                </p>
                                <p class="text-md-medium email neutral-1000">
                                    <span class="text-md-bold">Email:</span> emily-rose@gmail.com
                                </p>
                                <p class="text-md-medium whatsapp neutral-1000">
                                    <span class="text-md-bold">WhatsApp:</span> 1-222-333-4444
                                </p>
                                <p class="text-md-medium fax neutral-1000">
                                    <span class="text-md-bold">Fax:</span> 1-222-333-4444
                                </p>
                            </div>
                            <div class="box-link-bottom">
                                <a class="btn btn-primary py-3 w-100 rounded-3" href="#">
                                    All items by this dealer
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8 15L15 8L8 1M15 8L1 8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if(isset($relatedCars) && $relatedCars->isNotEmpty())
        <div class="container mt-5">
            <h3 class="text-xl-bold neutral-1000 mb-4">Related Cars</h3>
            <div class="row">
                @foreach($relatedCars as $relatedCar)
                    <div class="col-lg-3 col-md-6 mb-4">
                        @include('partials.car-card', ['car' => $relatedCar])
                    </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="background-100 pt-55 pb-55 mt-100">
            <div class="container">
                <div class="carouselTicker carouselTicker-left box-list-brand-car justify-content-center  wow fadeIn">
                    <ul class="carouselTicker__list">
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/lexus.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/lexus-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/mer.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/mer-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bugatti.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/bugatti-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/jaguar.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/jaguar-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/honda.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/honda-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/chevrolet.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/chevrolet-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/acura.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/acura-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bmw.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/bmw-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/toyota.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/toyota-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/lexus.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/lexus-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/mer.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/mer-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bugatti.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/bugatti-w.png" alt="Carento">
                            </div>
                        </li>
                    </ul>
                    <ul class="carouselTicker__list">
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/lexus.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/lexus-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/mer.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/mer-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bugatti.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/bugatti-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/jaguar.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/jaguar-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/honda.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/honda-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/chevrolet.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/chevrolet-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/acura.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/acura-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bmw.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/bmw-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/toyota.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/toyota-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/lexus.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/lexus-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/mer.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/mer-w.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bugatti.png" alt="Carento">
                                <img class="dark-mode" src="/assets/imgs/page/homepage2/bugatti-w.png" alt="Carento">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('scripts')
<script>
function shareVehicle(btn) {
    var shareUrl = window.location.href;
    var shareTitle = document.title;

    if (navigator.share && window.isSecureContext) {
        navigator.share({
            title: shareTitle,
            url: shareUrl
        }).then(function() {
            showShareSuccess(btn);
        }).catch(function(err) {
            if (!err || err.name !== 'AbortError') {
                copyUrlToClipboard(shareUrl, btn);
            }
        });
    } else {
        copyUrlToClipboard(shareUrl, btn);
    }
}

function copyUrlToClipboard(text, btn) {
    if (navigator.clipboard && window.isSecureContext) {
        navigator.clipboard.writeText(text).then(function() {
            showShareSuccess(btn);
        }).catch(function() {
            fallbackCopy(text, btn);
        });
    } else {
        fallbackCopy(text, btn);
    }
}

function fallbackCopy(text, btn) {
    try {
        var tempInput = document.createElement("input");
        tempInput.type = "text";
        tempInput.value = text;
        tempInput.style.position = "fixed";
        tempInput.style.left = "-9999px";
        tempInput.style.top = "0";
        document.body.appendChild(tempInput);
        tempInput.focus();
        tempInput.select();
        tempInput.setSelectionRange(0, 99999);
        var successful = document.execCommand("copy");
        document.body.removeChild(tempInput);
        if (successful) {
            showShareSuccess(btn);
            return;
        }
    } catch (e) {}

    prompt("{{ __('Copy vehicle link:') }}", text);
}

function showShareSuccess(btn) {
    if (!btn) return;
    var span = btn.querySelector('.share-btn-text');
    var originalText = span ? span.textContent : btn.textContent;
    
    if (span) {
        span.textContent = '{{ __('Copied!') }}';
    }
    btn.style.backgroundColor = '#10b981';
    btn.style.borderColor = '#10b981';
    btn.style.color = '#ffffff';

    setTimeout(function() {
        if (span) {
            span.textContent = originalText;
        }
        btn.style.backgroundColor = '';
        btn.style.borderColor = '';
        btn.style.color = '';
    }, 2200);
}
</script>
@endpush
