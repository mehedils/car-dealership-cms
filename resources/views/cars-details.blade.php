@extends('layouts.app')
@section('title', 'Carento - Car Details')
@section('content')
<div>
    <section class="box-section box-breadcrumb background-body">
        <div class="container">
            <ul class="breadcrumbs">
                <li>
                    <a href="/">Home</a>
                    <span class="arrow-right">
                        <i class="fi fi-rr-angle-small-right"></i>
                    </span>
                </li>
                <li>
                    <a href="/cars-list-1">Cars Rental</a>
                    <span class="arrow-right">
                        <i class="fi fi-rr-angle-small-right"></i>
                    </span>
                </li>
                <li>
                    <span class="text-breadcrumb">{{ $car->name }} </span>
                </li>
            </ul>
        </div>
    </section>
    <section class="box-section box-content-tour-detail background-body pt-0">
        <div class="container">
            <div class="tour-header">
                <div class="tour-rate">
                    <div class="rate-element">
                        <span class="rating">
                            4.96 <span class="text-sm-medium neutral-500">(672 reviews)</span>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="tour-title-main">
                            <h4 class="neutral-1000">{{ $car->name }}</h4>
                        </div>
                    </div>
                </div>
                <div class="tour-metas">
                    <div class="tour-meta-left">
                        <p class="text-md-medium neutral-1000 mr-20 tour-location">
                            <i class="fi fi-rr-marker text-dark me-1"></i>
                            {{ $car->location?->name ?? 'Las Vegas, USA' }}
                        </p>
                        <a class="text-md-medium neutral-1000 mr-30" href="#">
                            Show on map
                        </a>
                        <p class="text-md-medium neutral-1000 tour-code mr-15">
                            <i class="fi fi-rr-document text-dark me-1"></i>
                            Fleet Code:
                        </p>
                        <a class="text-md-medium neutral-1000" href="#">
                            LVA-4125
                        </a>
                    </div>
                    <div class="tour-meta-right">
                        <a class="btn btn-share" href="#">
                            <i class="fi fi-rr-share me-1"></i>
                            Share
                        </a>
                        <a class="btn btn-wishlish" href="#">
                            <i class="fi fi-rr-heart me-1"></i>
                            Wishlish
                        </a>
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
                                    <i class="fi fi-rr-apps me-1"></i>
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
                                        <p class="text-md-medium neutral-1000">{{ $car->mileage ?? '56,500' }} mi</p>
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
                                        <p class="text-md-medium neutral-1000">{{ $car->seats ?? 7 }} seats</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-box fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">3 Large bags</p>
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
                                        <i class="fi fi-rr-door-closed fs-4 text-primary"></i>
                                    </div>
                                    <div class="feature-info">
                                        <p class="text-md-medium neutral-1000">{{ $car->doors ?? 4 }} Doors</p>
                                    </div>
                                </div>
                            </div>
                            <div class="item-feature-car w-md-25">
                                <div class="item-feature-car-inner">
                                    <div class="feature-image">
                                        <i class="fi fi-rr-engine fs-4 text-primary"></i>
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
                                <i class="fi fi-rr-angle-small-down fs-5"></i>
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
                                <i class="fi fi-rr-angle-small-down fs-5"></i>
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
                                <i class="fi fi-rr-angle-small-down fs-5"></i>
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
                        <div class="group-collapse-expand">
                            <button class="btn btn-collapse" type="button" data-bs-toggle="collapse" data-bs-target="#collapseReviews" aria-expanded="false" aria-controls="collapseReviews">
                                <h6>Rate Reviews</h6>
                                <i class="fi fi-rr-angle-small-down fs-5"></i>
                            </button>
                            <div class="collapse" id="collapseReviews">
                                <div class="card card-body">
                                    <div class="head-reviews">
                                        <div class="review-left">
                                            <div class="review-info-inner">
                                                <h6 class="neutral-1000">4.95 / 5</h6>
                                                <p class="text-sm-medium neutral-400">(672 reviews)</p>
                                                <div class="review-rate text-warning">
                                                    <i class="fi fi-rr-star"></i>
                                                    <i class="fi fi-rr-star"></i>
                                                    <i class="fi fi-rr-star"></i>
                                                    <i class="fi fi-rr-star"></i>
                                                    <i class="fi fi-rr-star"></i>
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
                                                            <div class="progress-bar" style="width: 90%">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-avarage">
                                                        <p>4.8/5</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Service</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 90%">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-avarage">
                                                        <p>4.2/5</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Safety</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 95%">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-avarage">
                                                        <p>4.9/5</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Entertainment</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 85%">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-avarage">
                                                        <p>4.7/5</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Accessibility</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 100%">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="text-avarage">
                                                        <p>5/5</p>
                                                    </div>
                                                </div>
                                                <div class="item-review-progress">
                                                    <div class="text-rv-progress">
                                                        <p class="text-sm-bold">Support</p>
                                                    </div>
                                                    <div class="bar-rv-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar" style="width: 100%"></div>
                                                        </div>
                                                    </div>
                                                    <div class="text-avarage">
                                                        <p>5/5</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-reviews">
                                        <div class="item-review">
                                            <div class="head-review">
                                                <div class="author-review">
                                                    
                                                    <img src="/assets/imgs/page/tour-detail/avatar.png" alt="Travila">
                                                    <div class="author-info">
                                                        <p class="text-lg-bold">Sarah Johnson</p>
                                                        <p class="text-sm-medium neutral-500">December 4, 2024 at 3:12 pm</p>
                                                    </div>
                                                </div>
                                                <div class="rate-review text-warning">
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                 </div>
                                             </div>
                                             <div class="content-review">
                                                 <p class="text-sm-medium neutral-800">The views from The High Roller were absolutely stunning! It's a fantastic way to see the Strip and the surrounding area. The cabins are spacious and comfortable, and the audio commentary adds an extra layer of enjoyment. Highly recommend!</p>
                                             </div>
                                         </div>
                                         <div class="item-review">
                                             <div class="head-review">
                                                 <div class="author-review">
                                                     <img src="/assets/imgs/page/tour-detail/avatar.png" alt="Travila">
                                                     <div class="author-info">
                                                         <p class="text-lg-bold">Sarah Johnson</p>
                                                         <p class="text-sm-medium neutral-500">December 4, 2024 at 3:12 pm</p>
                                                     </div>
                                                 </div>
                                                 <div class="rate-review text-warning">
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                 </div>
                                             </div>
                                             <div class="content-review">
                                                 <p class="text-sm-medium neutral-800">The views from The High Roller were absolutely stunning! It's a fantastic way to see the Strip and the surrounding area. The cabins are spacious and comfortable, and the audio commentary adds an extra layer of enjoyment. Highly recommend!</p>
                                             </div>
                                         </div>
                                         <div class="item-review">
                                             <div class="head-review">
                                                 <div class="author-review">
                                                     <img src="/assets/imgs/page/tour-detail/avatar.png" alt="Travila">
                                                     <div class="author-info">
                                                         <p class="text-lg-bold">Sarah Johnson</p>
                                                         <p class="text-sm-medium neutral-500">December 4, 2024 at 3:12 pm</p>
                                                     </div>
                                                 </div>
                                                 <div class="rate-review text-warning">
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                     <i class="fi fi-rr-star"></i>
                                                 </div>
                                             </div>
                                             <div class="content-review">
                                                 <p class="text-sm-medium neutral-800">The views from The High Roller were absolutely stunning! It's a fantastic way to see the Strip and the surrounding area. The cabins are spacious and comfortable, and the audio commentary adds an extra layer of enjoyment. Highly recommend!</p>
                                             </div>
                                         </div>
                                     </div>
                                     <nav aria-label="Page navigation example">
                                         <ul class="pagination">
                                             <li class="page-item">
                                                 <a class="page-link" href="#" aria-label="Previous">
                                                     <span aria-hidden="true">
                                                         <i class="fi fi-rr-angle-small-left"></i>
                                                     </span>
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#">
                                                     1
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link active" href="#">
                                                     2
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#">
                                                     3
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#">
                                                     4
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#">
                                                     5
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#">
                                                     ...
                                                 </a>
                                             </li>
                                             <li class="page-item">
                                                 <a class="page-link" href="#" aria-label="Next">
                                                     <span aria-hidden="true">
                                                         <i class="fi fi-rr-angle-small-right"></i>
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
                                 <i class="fi fi-rr-angle-small-down fs-5"></i>
                             </button>
                             <div class="collapse" id="collapseAddReview">
                                 <div class="card card-body">
                                     <div class="box-type-reviews">
                                         <div class="row">
                                             <div class="col-lg-4">
                                                 <div class="box-type-review">
                                                     <p class="text-sm-bold text-type-rv">Price</p>
                                                     <p class="rate-type-review text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                     </p>
                                                 </div>
                                                 <div class="box-type-review">
                                                     <p class="text-sm-bold text-type-rv">Service</p>
                                                     <p class="rate-type-review text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                     </p>
                                                 </div>
                                             </div>
                                             <div class="col-lg-4">
                                                 <div class="box-type-review">
                                                     <p class="text-sm-bold text-type-rv">Safety</p>
                                                     <p class="rate-type-review text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                     </p>
                                                 </div>
                                                 <div class="box-type-review">
                                                     <p class="text-sm-bold text-type-rv">Entertainment</p>
                                                     <p class="rate-type-review text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                     </p>
                                                 </div>
                                             </div>
                                             <div class="col-lg-4">
                                                 <div class="box-type-review">
                                                     <p class="text-sm-bold text-type-rv">Accessibility</p>
                                                     <p class="rate-type-review text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                     </p>
                                                 </div>
                                                 <div class="box-type-review">
                                                     <p class="text-sm-bold text-type-rv">Support</p>
                                                     <p class="rate-type-review text-warning">
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
                                                         <i class="fi fi-rr-star"></i>
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
                                                     <i class="fi fi-rr-arrow-right ms-2"></i>
                                                 </button>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="sidebar-banner">
                        <div class="p-4 background-body border rounded-3">
                            <p class="text-xl-bold neutral-1000 mb-4">Get Started</p>
                            <a href="#" class="btn btn-primary w-100 rounded-3 py-3 mb-3">
                                Schedule Test Drive
                                <i class="fi fi-rr-arrow-right ms-2"></i>
                            </a>
                            <a href="#" class="btn btn-book bg-2">
                                Make An Offer Price
                                <i class="fi fi-rr-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                    <div class="booking-form">
                        <div class="head-booking-form">
                            <p class="text-xl-bold neutral-1000">Inquire About This Car</p>
                        </div>
                        <div class="content-booking-form">
                            @if(session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <form action="{{ route('inquiries.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="car_id" value="{{ $car->id }}">
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">Your Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">Your Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="john@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">Phone Number</label>
                                    <input type="text" name="phone" class="form-control" placeholder="+1 234 567 890" required>
                                </div>
                                <div class="mb-3">
                                    <label class="text-md-bold neutral-1000 mb-1 d-block">Message</label>
                                    <textarea name="message" class="form-control" rows="4" placeholder="I'm interested in this car..." required></textarea>
                                </div>
                                <div class="box-button-book mt-4">
                                    <button type="submit" class="btn btn-book border-0 w-100">
                                        Send Inquiry
                                        <i class="fi fi-rr-arrow-right ms-2"></i>
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
                                    <i class="fi fi-rr-arrow-right ms-2"></i>
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
