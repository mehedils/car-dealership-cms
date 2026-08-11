<div class="card-journey-small background-card hover-up">
    <div class="card-image">
        <a href="{{ is_object($car) && isset($car->slug) ? route('cars.show', $car->slug) : url('/cars/' . ($car['slug'] ?? '')) }}">
            @if(is_object($car) && method_exists($car, 'getFirstMediaUrl') && $car->getFirstMediaUrl('gallery'))
                <img src="{{ $car->getFirstMediaUrl('gallery') }}" alt="{{ $car->name }}" style="height: 220px; object-fit: cover; width: 100%;">
            @else
                <img src="{{ asset('assets/imgs/cars-details/car-1.jpg') }}" alt="{{ is_object($car) ? $car->name : ($car['name'] ?? 'Car') }}" style="height: 220px; object-fit: cover; width: 100%;">
            @endif
        </a>
    </div>
    <div class="card-info p-4 pt-30">
        <div class="card-rating">
            <div class="card-left"></div>
            <div class="card-right">
                <span class="rating text-xs-medium rounded-pill">
                    {{ is_object($car) ? $car->rating : ($car['rating'] ?? '5.0') }}
                    <span class="text-xs-medium neutral-500">({{ is_object($car) ? $car->reviews_count ?? 5 : 5 }} reviews)</span>
                </span>
            </div>
        </div>
        <div class="card-title">
            <a class="text-lg-bold neutral-1000 text-truncate d-block" href="{{ is_object($car) && isset($car->slug) ? route('cars.show', $car->slug) : url('/cars/' . ($car['slug'] ?? '')) }}">
                {{ is_object($car) ? $car->name : ($car['name'] ?? '') }}
            </a>
        </div>
        <div class="card-program">
            <div class="card-location">
                <p class="text-location text-sm-medium neutral-500 d-flex align-items-center">
                    <i class="fi fi-rr-marker text-primary me-1"></i>
                    {{ is_object($car) ? ($car->location?->name ?? 'New York') : ($car['location'] ?? '') }}
                </p>
            </div>
            <div class="card-facitlities">
                <p class="card-miles text-md-medium d-flex align-items-center"><i class="fi fi-rr-dashboard text-primary me-1"></i>{{ is_object($car) ? ($car->mileage ?? '20k') : '20k' }}</p>
                <p class="card-gear text-md-medium d-flex align-items-center"><i class="fi fi-rr-settings-sliders text-primary me-1"></i>{{ is_object($car) ? ($car->transmission ?? 'Auto') : 'Auto' }}</p>
                <p class="card-fuel text-md-medium d-flex align-items-center"><i class="fi fi-rr-gas-pump text-primary me-1"></i>{{ is_object($car) ? ($car->fuelType?->name ?? 'Petrol') : ($car['fuelType'] ?? '') }}</p>
                <p class="card-seat text-md-medium d-flex align-items-center"><i class="fi fi-rr-user text-primary me-1"></i>{{ is_object($car) ? ($car->seats ?? 5) : 5 }} seats</p>
            </div>
            <div class="endtime">
                <div class="card-price">
                    <h6 class="text-lg-bold neutral-1000">${{ is_object($car) ? number_format($car->price) : ($car['price'] ?? '0') }}</h6>
                </div>
                <div class="card-button">
                    <a class="btn btn-primary btn-sm px-3" href="{{ is_object($car) && isset($car->slug) ? route('cars.show', $car->slug) : url('/cars/' . ($car['slug'] ?? '')) }}">View</a>
                </div>
            </div>
        </div>
    </div>
</div>
