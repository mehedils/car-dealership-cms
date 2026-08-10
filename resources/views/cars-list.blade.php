@extends('layouts.app')

@section('title', 'Carento - Cars List')

@section('content')
<div>
    <div class="page-header-2 pt-30 background-body">
        <div class="custom-container position-relative mx-auto">
            <div class="bg-overlay rounded-12 overflow-hidden">
                <img class="w-100 h-100 img-fluid img-banner" src="/assets/imgs/page-header/banner6.png" alt="Carento">
            </div>
            <div class="container position-absolute z-1 top-50 start-50 pb-70 translate-middle text-center">
                <span class="text-sm-bold bg-2 px-4 py-3 rounded-12">Find cars for sale and for rent near you</span>
                <h2 class="text-white mt-4">Find Your Perfect Car</h2>
                <span class="text-white text-lg-medium">Search and find your best car rental with easy way</span>
            </div>
        </div>
    </div>

    <section class="box-section box-search-advance-home10 background-body">
        <div class="container">
            <div class="box-search-advance background-card wow fadeIn">
                <div class="box-top-search">
                    <div class="left-top-search">
                        <a class="category-link text-sm-bold btn-click active" href="/cars-list-1">All cars</a>
                        <a class="category-link text-sm-bold btn-click" href="/cars-list-1">New cars</a>
                        <a class="category-link text-sm-bold btn-click" href="/cars-list-1">Used cars</a>
                    </div>
                    <div class="right-top-search d-none d-md-flex">
                        <a class="text-sm-medium need-some-help" href="#">Need help?</a>
                    </div>
                </div>
                <div class="box-bottom-search background-card">
                    <div class="item-search">
                        <label class="text-sm-bold neutral-500">Pick Up Location</label>
                        <div class="dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle btn-dropdown-search location-search" data-bs-toggle="dropdown" aria-expanded="false">New York, USA</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Paris, France</a></li>
                                <li><a class="dropdown-item" href="#">Tokyo, Japan</a></li>
                                <li><a class="dropdown-item" href="#">New York City, USA</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-search item-search-2">
                        <label class="text-sm-bold neutral-500">Drop Off Location</label>
                        <div class="dropdown">
                            <button type="button" class="btn btn-secondary dropdown-toggle btn-dropdown-search location-search" data-bs-toggle="dropdown" aria-expanded="false">Delaware, USA</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Paris, France</a></li>
                                <li><a class="dropdown-item" href="#">Tokyo, Japan</a></li>
                                <li><a class="dropdown-item" href="#">New York City, USA</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="item-search item-search-3">
                        <label class="text-sm-bold neutral-500">Pick Up Date &amp; Time</label>
                        <div class="box-calendar-date">
                            <input type="text" class="search-input datepicker datepicker-input" autocomplete="off" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                    <div class="item-search bd-none">
                        <label class="text-sm-bold neutral-500">Return Date &amp; Time</label>
                        <div class="box-calendar-date">
                            <input type="text" class="search-input datepicker datepicker-input" autocomplete="off" placeholder="dd/mm/yyyy">
                        </div>
                    </div>
                    <div class="item-search bd-none d-flex justify-content-end">
                        <a class="btn btn-brand-2 text-nowrap" href="/cars-list-1">
                            <i class="fi fi-rr-search me-2"></i>
                            Find a Vehicle
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-box pt-50 background-body">
        <div class="container">
            <div class="row align-items-end">
                <div class="col-md-9 mb-30 wow fadeInUp">
                    <h4 class="title-svg neutral-1000 mb-15">Our Vehicle Fleet</h4>
                    <p class="text-lg-medium text-bold neutral-500">Turning dreams into reality with versatile vehicles.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="box-section block-content-tourlist background-body">
        <div class="container">
            <form method="GET" action="/cars-list-1" data-auto-submit class="box-content-main pt-20">
                <div class="content-right">
                    <div class="box-filters mb-25 pb-5 border-bottom border-1">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-md-4 mb-10 text-lg-start text-center">
                                <div class="box-view-type">
                                    <a class="display-type display-grid active" href="/cars-list-1">
                                        <i class="fi fi-rr-apps fs-5"></i>
                                    </a>
                                    <a class="display-type display-list" href="/cars-list-1">
                                        <i class="fi fi-rr-list fs-5"></i>
                                    </a>
                                    <span class="text-sm-bold neutral-500 number-found">{{ ($page - 1) * $perPage + 1 }} - {{ min($page * $perPage, $total) }} of {{ $total }} tours found</span>
                                </div>
                            </div>
                            <div class="col-xl-8 col-md-8 mb-10 text-lg-end text-center">
                                <div class="box-item-sort">
                                    <a class="btn btn-clear text-xs-medium" href="/cars-list-1">Clear Filters</a>
                                    <div class="item-sort border-1">
                                        <span class="text-xs-medium neutral-500 mr-5">Show</span>
                                        <select name="per_page">
                                            <option value="10" @selected($perPage === 10)>10</option>
                                            <option value="15" @selected($perPage === 15)>15</option>
                                            <option value="20" @selected($perPage === 20)>20</option>
                                        </select>
                                    </div>
                                    <div class="item-sort border-1">
                                        <span class="text-xs-medium neutral-500 mr-5 d-block m-w-50px">Sort by:</span>
                                        <select name="sort">
                                            <option value="name" @selected($sort === 'name')>Name</option>
                                            <option value="price" @selected($sort === 'price')>Price</option>
                                            <option value="rating" @selected($sort === 'rating')>Rating</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box-grid-tours wow fadeIn">
                        <div class="row">
                            @foreach ($paginated as $car)
                                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                                    @include('partials.car-card', ['car' => $car])
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="{{ url('/cars-list-1') }}?{{ http_build_query(array_merge(request()->except(['page']), ['page' => max(1, $page - 1)])) }}">
                                    <svg width="12" height="12" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M6.00016 1.33325L1.3335 5.99992M1.3335 5.99992L6.00016 10.6666M1.3335 5.99992H10.6668" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                            @for ($i = 1; $i <= $totalPages; $i++)
                                <li class="page-item">
                                    <a class="page-link @if ($i === $page) active @endif" href="{{ url('/cars-list-1') }}?{{ http_build_query(array_merge(request()->except(['page']), ['page' => $i])) }}">{{ $i }}</a>
                                </li>
                            @endfor
                            <li class="page-item">
                                <a class="page-link" href="{{ url('/cars-list-1') }}?{{ http_build_query(array_merge(request()->except(['page']), ['page' => min($totalPages, $page + 1)])) }}">
                                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5.99967 10.6666L10.6663 5.99992L5.99968 1.33325M10.6663 5.99992L1.33301 5.99992" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="content-left order-lg-first">
                    <div class="sidebar-left border-1 background-body">
                        <div class="box-filters-sidebar">
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Show on map</h6>
                                <div class="box-collapse scrollFilter mb-15">
                                    <div class="pt-0">
                                        <div class="box-map-small">
                                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5249.611419370571!2d2.3406913487788334!3d48.86191519358772!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e66e18a5f84801%3A0x6eb5daa624bdebd2!2sLes%20Halles%2C%2075001%20Pa%20ri%2C%20Ph%C3%A1p!5e0!3m2!1svi!2s!4v1711728202093!5m2!1svi!2s" width="100%" height="160" style="border: 0" allowfullscreen loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-left border-1 background-body">
                        <div class="box-filters-sidebar">
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Filter Price</h6>
                                <div class="box-collapse scrollFilter">
                                    <div class="price-range-slider">
                                        <div class="price-range-track-active"></div>
                                        <input type="range" min="{{ $priceBoundMin }}" max="{{ $priceBoundMax }}" step="10" value="{{ $priceMin }}" data-role="min" name="price_min">
                                        <input type="range" min="{{ $priceBoundMin }}" max="{{ $priceBoundMax }}" step="10" value="{{ $priceMax }}" data-role="max" name="price_max">
                                    </div>
                                    <div class="box-price-value d-flex align-items-center justify-content-between pt-2">
                                        <span class="text-md-bold neutral-1000">$<span class="price-min-value">{{ $priceMin }}</span></span>
                                        <span class="text-sm-medium neutral-500">to</span>
                                        <span class="text-md-bold neutral-1000">$<span class="price-max-value">{{ $priceMax }}</span></span>
                                    </div>
                                </div>
                            </div>
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Car type</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($unique['carTypes'] as $type)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="car_type[]" value="{{ $type }}" @if (in_array($type, $carTypes)) checked @endif>
                                                    <span class="text-sm-medium">{{ $type }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $counts['carTypes'][$type] ?? 0 }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Amenities</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($unique['amenities'] as $amenity)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="amenities[]" value="{{ $amenity }}" @if (in_array($amenity, $amenities)) checked @endif>
                                                    <span class="text-sm-medium">{{ $amenity }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $counts['amenities'][$amenity] ?? 0 }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Fuel Type</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($unique['fuelTypes'] as $fuel)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="fuel_type[]" value="{{ $fuel }}" @if (in_array($fuel, $fuelTypes)) checked @endif>
                                                    <span class="text-sm-medium">{{ $fuel }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $counts['fuelTypes'][$fuel] ?? 0 }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Review Score</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($unique['ratings'] as $rating)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="rating[]" value="{{ $rating }}" @if (in_array($rating, $ratings)) checked @endif>
                                                    {{ $rating }} stars
                                                     <span class="text-sm-medium text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                     </span>
                                                    <span class="checkmark"></span>
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="block-filter border-1">
                                <h6 class="text-lg-bold item-collapse neutral-1000">Booking Location</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox">
                                        @foreach ($unique['locations'] as $location)
                                            <li>
                                                <label class="cb-container">
                                                    <input type="checkbox" name="location[]" value="{{ $location }}" @if (in_array($location, $locations)) checked @endif>
                                                    <span class="text-sm-medium">{{ $location }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="number-item">{{ $counts['locations'][$location] ?? 0 }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="background-100 pt-55 pb-55">
            <div class="container">
                <div class="carouselTicker carouselTicker-left box-list-brand-car justify-content-center wow fadeIn">
                    <ul class="carouselTicker__list">
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/lexus.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/mer.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bugatti.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/jaguar.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/honda.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/chevrolet.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/acura.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bmw.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/toyota.png" alt="Carento">
                            </div>
                        </li>
                    </ul>
                    <ul class="carouselTicker__list">
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/lexus.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/mer.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bugatti.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/jaguar.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/honda.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/chevrolet.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/acura.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/bmw.png" alt="Carento">
                            </div>
                        </li>
                        <li class="carouselTicker__item">
                            <div class="item-brand">
                                <img class="light-mode" src="/assets/imgs/page/homepage2/toyota.png" alt="Carento">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
