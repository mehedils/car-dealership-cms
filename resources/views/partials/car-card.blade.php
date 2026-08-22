@php
    $isObj = is_object($car);
    $carSlug = $isObj && isset($car->slug) ? $car->slug : ($car['slug'] ?? '');
    $carName = $isObj ? $car->name : ($car['name'] ?? 'Car');
    $carPrice = $isObj ? (float)$car->price : (float)($car['price'] ?? 0);
    $carYear = $isObj ? ($car->year ?? null) : ($car['year'] ?? null);
    $carMileage = $isObj ? ($car->mileage ?? 0) : ($car['mileage'] ?? 0);
    $carTransmission = $isObj ? ($car->transmission ?? 'Automática') : ($car['transmission'] ?? 'Automática');
    $carFuel = $isObj ? ($car->fuelType?->name ?? 'Gasolina') : ($car['fuelType'] ?? 'Gasolina');
    $carCondition = $isObj ? ($car->condition ?? 'used') : ($car['condition'] ?? 'used');
    $carStatus = $isObj ? ($car->status ?? 'available') : ($car['status'] ?? 'available');
    $monthlyEst = $isObj && method_exists($car, 'getEstimatedMonthlyPaymentAttribute') ? $car->estimated_monthly_payment : round(($carPrice * 0.8 * 1.12) / 48);
    $carUrl = route('cars.show', $carSlug);
@endphp

<div class="card-journey-small background-card hover-up position-relative d-flex flex-column h-100 rounded-16 overflow-hidden border">
    <div class="card-image position-relative">
        <!-- Status / Condition Badges -->
        <div class="position-absolute top-0 start-0 m-3 z-2 d-flex flex-column gap-1">
            @if($carStatus === 'sold')
                <span class="badge bg-secondary text-white px-3 py-2 rounded-pill text-xs-bold shadow-sm">{{ __('Sold') }}</span>
            @elseif($carStatus === 'reserved')
                <span class="badge bg-warning text-dark px-3 py-2 rounded-pill text-xs-bold shadow-sm">{{ __('Reserved') }}</span>
            @elseif($carCondition === 'new')
                <span class="badge bg-success text-white px-3 py-2 rounded-pill text-xs-bold shadow-sm">{{ __('New') }}</span>
            @elseif($carCondition === 'certified')
                <span class="badge bg-primary text-white px-3 py-2 rounded-pill text-xs-bold shadow-sm">{{ __('Certified') }}</span>
            @else
                <span class="badge bg-info text-white px-3 py-2 rounded-pill text-xs-bold shadow-sm">{{ __('Used') }}</span>
            @endif
        </div>

        <a href="{{ $carUrl }}">
            @if($isObj && method_exists($car, 'getFirstMediaUrl') && $car->getFirstMediaUrl('gallery'))
                <img src="{{ $car->getFirstMediaUrl('gallery') }}" alt="{{ $carName }}" style="height: 220px; object-fit: cover; width: 100%;">
            @else
                <img src="{{ asset('assets/imgs/cars-details/car-1.jpg') }}" alt="{{ $carName }}" style="height: 220px; object-fit: cover; width: 100%;">
            @endif
        </a>
    </div>

    <div class="card-info p-4 pt-3 d-flex flex-column flex-grow-1 justify-content-between">
        <div>
            <div class="card-title mb-2">
                <a class="text-lg-bold neutral-1000 text-truncate d-block" href="{{ $carUrl }}" title="{{ $carName }}">
                    {{ $carName }}
                </a>
            </div>

            <div class="card-location mb-3">
                <p class="text-location text-sm-medium neutral-500 d-flex align-items-center">
                    <i class="fi fi-rr-marker me-1 text-primary"></i>
                    <span>{{ $isObj ? ($car->location?->name ?? 'Sucursal Central') : ($car['location'] ?? 'Sucursal Central') }}</span>
                </p>
            </div>

            <!-- Vehicle Specs (Cleaned for dealership buyers) -->
            <div class="card-facitlities py-2 px-1 mb-3 bg-light rounded-8 d-flex justify-content-between text-center">
                @if($carYear)
                    <div class="spec-item px-1">
                        <span class="text-xs text-muted d-block">{{ __('Year') }}</span>
                        <strong class="text-xs-bold neutral-1000">{{ $carYear }}</strong>
                    </div>
                @endif
                <div class="spec-item px-1">
                    <span class="text-xs text-muted d-block">{{ __('Mileage') }}</span>
                    <strong class="text-xs-bold neutral-1000">{{ number_format((int)$carMileage) }} km</strong>
                </div>
                <div class="spec-item px-1">
                    <span class="text-xs text-muted d-block">{{ __('Gear') }}</span>
                    <strong class="text-xs-bold neutral-1000">{{ $carTransmission }}</strong>
                </div>
                <div class="spec-item px-1">
                    <span class="text-xs text-muted d-block">{{ __('Fuel') }}</span>
                    <strong class="text-xs-bold neutral-1000 text-truncate" style="max-width: 65px;">{{ $carFuel }}</strong>
                </div>
            </div>
        </div>

        <div>
            <!-- Pricing & Monthly Payment -->
            <div class="price-section mb-3 border-top pt-3 d-flex align-items-center justify-content-between flex-wrap">
                <div>
                    <span class="text-xs text-muted d-block">{{ __('Total Price') }}</span>
                    <h6 class="text-lg-bold neutral-1000 mb-0">${{ number_format($carPrice) }} <span class="text-xs-medium text-muted">USD</span></h6>
                </div>
                @if($monthlyEst > 0)
                    <div class="text-end">
                        <span class="badge bg-light text-dark border py-1 px-2 text-xs">
                            {{ __('From') }} <strong>${{ number_format($monthlyEst) }}</strong>/{{ __('mo') }}
                        </span>
                    </div>
                @endif
            </div>

            <!-- Primary CTAs -->
            <div class="card-button-group d-flex gap-2">
                <a class="btn btn-outline-secondary btn-sm flex-fill py-2 text-xs-bold d-flex align-items-center justify-content-center" href="{{ $carUrl }}">
                    <span>{{ __('View Details') }}</span>
                </a>
                <button type="button" 
                        class="btn btn-brand-2 btn-sm flex-fill py-2 text-xs-bold d-flex align-items-center justify-content-center btn-trigger-lead-modal" 
                        data-bs-toggle="modal" 
                        data-bs-target="#leadModal"
                        data-car-id="{{ $isObj ? $car->id : '' }}"
                        data-car-name="{{ $carName }}"
                        data-car-price="${{ number_format($carPrice) }}">
                    <i class="fi fi-rr-comment-alt me-1"></i>
                    <span>{{ __('Quote / Test Drive') }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
