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
    <div class="card-info p-4 pt-3">
        <div class="card-title">
            <a class="text-lg-bold neutral-1000 text-truncate d-block" href="{{ is_object($car) && isset($car->slug) ? route('cars.show', $car->slug) : url('/cars/' . ($car['slug'] ?? '')) }}">
                {{ is_object($car) ? $car->name : ($car['name'] ?? '') }}
            </a>
        </div>
        <div class="card-program">
            <div class="card-location">
                <p class="text-location text-sm-medium neutral-500">
                    {{ is_object($car) ? ($car->location?->name ?? 'New York') : ($car['location'] ?? '') }}
                </p>
            </div>
            <div class="card-facitlities">
                <p class="card-miles text-md-medium">{{ is_object($car) ? (is_numeric($car->mileage) ? number_format((int)$car->mileage) . ' km' : ($car->mileage ?? '20k')) : ($car['mileage'] ?? '20k') }}</p>
                <p class="card-gear text-md-medium">{{ is_object($car) ? ($car->transmission ?? 'Auto') : ($car['transmission'] ?? 'Auto') }}</p>
                <p class="card-fuel text-md-medium">{{ is_object($car) ? ($car->fuelType?->name ?? 'Petrol') : ($car['fuelType'] ?? '') }}</p>
                <p class="card-seat text-md-medium">{{ is_object($car) ? ($car->seats ?? 5) : ($car['seats'] ?? 5) }} {{ __('Seats') }}</p>
            </div>
            <div class="endtime">
                @php
                    $currSym = setting('currency_symbol', '$');
                    $monthly = is_object($car) ? $car->estimated_monthly_payment : null;
                @endphp
                <div class="card-price d-flex flex-column align-items-start">
                    <h6 class="text-lg-bold neutral-1000 mb-0">{{ $currSym }}{{ is_object($car) ? number_format($car->price) : ($car['price'] ?? '0') }}</h6>
                    @if($monthly && $monthly > 0)
                        <span class="text-xs neutral-500 font-xs d-block mt-1" style="font-size: 11.5px; line-height: 1.2;">
                            {{ __('Desde :amount/mes', ['amount' => $currSym . number_format($monthly)]) }}
                        </span>
                    @endif
                </div>
                <div class="card-button">
                    <a class="btn btn-primary btn-sm px-3" href="{{ is_object($car) && isset($car->slug) ? route('cars.show', $car->slug) : url('/cars/' . ($car['slug'] ?? '')) }}">{{ __('View Details') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
