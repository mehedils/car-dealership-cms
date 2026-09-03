@extends('layouts.app')

@section('title', setting('inventory_hero_title', __('Vehicle Inventory')) . ' - ' . setting('site_name', 'Carento'))

@section('content')
<div>
    <!-- Page Header & Hero Section (Editable via CMS) -->
    <div class="page-header-2 pt-30 background-body">
        <div class="custom-container position-relative mx-auto">
            <div class="bg-overlay rounded-12 overflow-hidden">
                <img class="w-100 h-100 img-fluid img-banner" src="{{ setting('inventory_hero_bg_image') ? asset('storage/' . setting('inventory_hero_bg_image')) : asset('assets/imgs/page-header/banner6.png') }}" alt="{{ setting('inventory_hero_title', __('Vehicle Inventory')) }}">
            </div>
            <div class="container position-absolute z-1 top-50 start-50 pb-70 translate-middle text-center">
                <span class="text-sm-bold bg-2 px-4 py-3 rounded-12 d-inline-block">{{ setting('inventory_hero_badge', __('New & Used Vehicle Inventory')) }}</span>
                <h2 class="text-white mt-4">{{ setting('inventory_hero_title', __('Find Your Next Vehicle')) }}</h2>
                <span class="text-white text-lg-medium d-block mt-2">{{ setting('inventory_hero_subtitle', __('Verified dealership inventory with multi-point inspection and flexible financing.')) }}</span>
            </div>
        </div>
    </div>

    <!-- Main Dealership Search Engine Bar -->
    <section class="box-section box-search-advance-home10 background-body pt-20">
        <div class="container">
            <div class="box-search-advance background-card shadow-sm rounded-16 p-4">
                <form method="GET" action="{{ route('cars.index') }}" id="mainSearchForm">
                    <!-- Condition Filter Tabs -->
                    <div class="box-top-search border-bottom pb-3 mb-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <div class="left-top-search d-flex gap-2 flex-wrap">
                            <a class="btn-condition-tab {{ $condition === 'all' || empty($condition) ? 'active' : '' }}" 
                               href="{{ url('/cars') }}?{{ http_build_query(array_merge(request()->except(['condition', 'page']), ['condition' => 'all'])) }}">
                                {{ __('All Vehicles') }} <span class="badge">{{ $conditionCounts['all'] ?? 0 }}</span>
                            </a>
                            <a class="btn-condition-tab {{ $condition === 'new' ? 'active' : '' }}" 
                               href="{{ url('/cars') }}?{{ http_build_query(array_merge(request()->except(['condition', 'page']), ['condition' => 'new'])) }}">
                                {{ __('New') }} <span class="badge">{{ $conditionCounts['new'] ?? 0 }}</span>
                            </a>
                            <a class="btn-condition-tab {{ $condition === 'certified' ? 'active' : '' }}" 
                               href="{{ url('/cars') }}?{{ http_build_query(array_merge(request()->except(['condition', 'page']), ['condition' => 'certified'])) }}">
                                {{ __('Certified') }} <span class="badge">{{ $conditionCounts['certified'] ?? 0 }}</span>
                            </a>
                            <a class="btn-condition-tab {{ $condition === 'used' ? 'active' : '' }}" 
                               href="{{ url('/cars') }}?{{ http_build_query(array_merge(request()->except(['condition', 'page']), ['condition' => 'used'])) }}">
                                {{ __('Used') }} <span class="badge">{{ $conditionCounts['used'] ?? 0 }}</span>
                            </a>
                            <a class="btn-condition-tab {{ $condition === 'refurbished' ? 'active' : '' }}" 
                               href="{{ url('/cars') }}?{{ http_build_query(array_merge(request()->except(['condition', 'page']), ['condition' => 'refurbished'])) }}">
                                {{ __('Refurbished') }} <span class="badge">{{ $conditionCounts['refurbished'] ?? 0 }}</span>
                            </a>
                        </div>
                        <input type="hidden" name="condition" value="{{ $condition }}">
                        
                        <div class="right-top-search">
                            <a class="text-xs-bold text-primary text-decoration-none" href="{{ route('cars.index') }}">
                                <i class="fi fi-rr-refresh me-1"></i> {{ __('Reset All Filters') }}
                            </a>
                        </div>
                    </div>

                    <!-- Dealership Sales Filter Inputs Grid -->
                    <div class="row g-3 align-items-end">
                        <!-- Make / Brand Select -->
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <label class="form-label text-xs-bold text-muted text-uppercase mb-1">{{ __('Make / Brand') }}</label>
                            <select name="brand_id[]" id="searchSelectBrand" class="form-select form-control rounded-8 text-sm">
                                <option value="">{{ __('All Makes') }}</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" @selected(in_array($brand->id, (array)$selectedBrandIds))>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Model Select (Cascading) -->
                        <div class="col-xl-3 col-lg-3 col-md-6">
                            <label class="form-label text-xs-bold text-muted text-uppercase mb-1">{{ __('Model') }}</label>
                            <select name="model[]" id="searchSelectModel" class="form-select form-control rounded-8 text-sm">
                                <option value="">{{ __('All Models') }}</option>
                                @foreach($allModels as $mod)
                                    <option value="{{ $mod }}" @selected(in_array($mod, (array)$selectedModels))>{{ $mod }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Body Type -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <label class="form-label text-xs-bold text-muted text-uppercase mb-1">{{ __('Body Type') }}</label>
                            <select name="car_type_id[]" class="form-select form-control rounded-8 text-sm">
                                <option value="">{{ __('All Body Types') }}</option>
                                @foreach($carTypes as $type)
                                    <option value="{{ $type->id }}" @selected(in_array($type->id, (array)$selectedCarTypes))>{{ $type->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Transmission -->
                        <div class="col-xl-2 col-lg-3 col-md-6">
                            <label class="form-label text-xs-bold text-muted text-uppercase mb-1">{{ __('Transmission') }}</label>
                            <select name="transmission[]" class="form-select form-control rounded-8 text-sm">
                                <option value="">{{ __('All Transmissions') }}</option>
                                @foreach($transmissions as $trans)
                                    <option value="{{ $trans }}" @selected(in_array($trans, (array)$selectedTransmissions))>{{ $trans }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="col-xl-2 col-lg-12 col-md-12">
                            <button type="submit" class="btn btn-brand-2 w-100 py-2 d-flex align-items-center justify-content-center text-sm-bold rounded-8">
                                <i class="fi fi-rr-search me-2"></i>
                                <span>{{ __('Search') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Main Inventory Content (Sidebar + Vehicle Grid) -->
    <section class="box-section block-content-tourlist background-body pt-30 pb-60">
        <div class="container">
            <form method="GET" action="{{ route('cars.index') }}" data-auto-submit id="inventorySidebarForm" class="box-content-main">
                <!-- Keep condition from top tabs -->
                <input type="hidden" name="condition" value="{{ $condition }}">

                <!-- Right Side: Toolbar, Cards Grid, Pagination -->
                <div class="content-right">
                    <!-- Results Toolbar & Sorting -->
                    <div class="box-filters mb-25 pb-3 border-bottom">
                        <div class="row align-items-center">
                            <div class="col-xl-6 col-md-6 mb-10 text-md-start text-center">
                                <div class="box-view-type d-flex align-items-center gap-2 justify-content-md-start justify-content-center">
                                    <span class="text-sm-bold neutral-800 number-found">
                                        @if($paginatedCars->total() > 0)
                                            {{ __('Showing') }} <span class="text-primary">{{ $paginatedCars->firstItem() }} - {{ $paginatedCars->lastItem() }}</span> {{ __('of') }} <span class="text-primary">{{ $paginatedCars->total() }}</span> {{ __('vehicles') }}
                                        @else
                                            {{ __('Showing 0 vehicles') }}
                                        @endif
                                    </span>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6 mb-10 text-md-end text-center">
                                <div class="box-item-sort d-flex align-items-center justify-content-md-end justify-content-center gap-3 flex-wrap">
                                    @if(request()->hasAny(['brand_id', 'model', 'car_type_id', 'fuel_type_id', 'transmission', 'price_min', 'price_max', 'year_min', 'year_max', 'mileage_max']))
                                        <a class="btn-clear-active-filters" href="{{ route('cars.index') }}">
                                            <i class="fi fi-rr-cross-small"></i>{{ __('Clear Filters') }}
                                        </a>
                                    @endif
                                    <div class="item-sort border rounded-8 px-2 py-1 bg-white">
                                        <span class="text-xs text-muted me-1">{{ __('Show') }}:</span>
                                        <select name="per_page" class="border-0 bg-transparent text-xs-bold neutral-1000 py-1">
                                            <option value="9" @selected($perPage === 9)>9</option>
                                            <option value="12" @selected($perPage === 12)>12</option>
                                            <option value="18" @selected($perPage === 18)>18</option>
                                            <option value="24" @selected($perPage === 24)>24</option>
                                        </select>
                                    </div>
                                    <div class="item-sort border rounded-8 px-2 py-1 bg-white">
                                        <span class="text-xs text-muted me-1">{{ __('Sort') }}:</span>
                                        <select name="sort" class="border-0 bg-transparent text-xs-bold neutral-1000 py-1">
                                            <option value="latest" @selected($sort === 'latest')>{{ __('Recently Added') }}</option>
                                            <option value="price_asc" @selected($sort === 'price_asc')>{{ __('Price: Low to High') }}</option>
                                            <option value="price_desc" @selected($sort === 'price_desc')>{{ __('Price: High to Low') }}</option>
                                            <option value="year_desc" @selected($sort === 'year_desc')>{{ __('Year: Newest First') }}</option>
                                            <option value="mileage_asc" @selected($sort === 'mileage_asc')>{{ __('Mileage: Low to High') }}</option>
                                            <option value="name" @selected($sort === 'name')>{{ __('Name') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Vehicle Grid or Empty State -->
                    @if($paginatedCars->count() > 0)
                        <div class="box-grid-tours">
                            <div class="row g-4">
                                @foreach ($paginatedCars as $car)
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                        @include('partials.car-card', ['car' => $car])
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Dynamic Pagination -->
                        <div class="mt-40 d-flex justify-content-center">
                            {{ $paginatedCars->links('pagination::bootstrap-5') }}
                        </div>
                    @else
                        <!-- Clean Empty State Component -->
                        <div class="empty-inventory-state text-center py-60 px-4 background-card rounded-16 border my-30">
                            <div class="empty-state-icon mb-3">
                                <div class="icon-circle bg-light d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 80px; height: 80px;">
                                    <i class="fi fi-rr-search-alt text-brand-2 fs-1"></i>
                                </div>
                            </div>
                            <h4 class="neutral-1000 heading-4 mb-2">{{ __('No vehicles found with these criteria') }}</h4>
                            <p class="neutral-500 text-md-medium max-w-500 mx-auto mb-4">
                                {{ __('We could not find any vehicles matching your selected filters. Try broadening your criteria or let us locate the exact car you want.') }}
                            </p>
                            <div class="d-flex gap-3 justify-content-center flex-wrap">
                                <a href="{{ route('cars.index') }}" class="btn btn-outline-secondary px-4 py-2 text-sm-bold rounded-8">
                                    <i class="fi fi-rr-refresh me-2"></i>{{ __('Clear Filters') }}
                                </a>
                                <button type="button" class="btn btn-brand-2 px-4 py-2 text-sm-bold rounded-8" data-bs-toggle="modal" data-bs-target="#leadModal">
                                    <i class="fi fi-rr-paper-plane me-2"></i>{{ __('Request Custom Vehicle Search') }}
                                </button>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Left Side: Refinement Filters -->
                <div class="content-left order-lg-first">
                    <div class="sidebar-left border-1 background-body p-3 rounded-16">
                        <div class="box-filters-sidebar">
                            <!-- Sidebar Header -->
                            <div class="d-flex align-items-center justify-content-between pb-3 mb-3 border-bottom">
                                <h5 class="text-md-bold neutral-1000 mb-0">{{ __('Filter Inventory') }}</h5>
                                <a href="{{ route('cars.index') }}" class="text-xs-bold text-muted text-decoration-underline">{{ __('Reset') }}</a>
                            </div>

                            <!-- Price Range Slider -->
                            <div class="block-filter border-bottom pb-3 mb-3">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Price Range') }}</h6>
                                <div class="box-collapse scrollFilter">
                                    <div class="price-range-slider">
                                        <div class="price-range-track-active"></div>
                                        <input type="range" min="{{ $priceBoundMin }}" max="{{ $priceBoundMax }}" step="500" value="{{ $priceMin }}" data-role="min" name="price_min">
                                        <input type="range" min="{{ $priceBoundMin }}" max="{{ $priceBoundMax }}" step="500" value="{{ $priceMax }}" data-role="max" name="price_max">
                                    </div>
                                    <div class="box-price-value d-flex align-items-center justify-content-between pt-2">
                                        <span class="text-sm-bold neutral-1000">$<span class="price-min-value">{{ number_format($priceMin) }}</span></span>
                                        <span class="text-xs-medium text-muted">{{ __('to') }}</span>
                                        <span class="text-sm-bold neutral-1000">$<span class="price-max-value">{{ number_format($priceMax) }}</span></span>
                                    </div>
                                </div>
                            </div>

                            <!-- Year Range Inputs -->
                            <div class="block-filter border-bottom pb-3 mb-3">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Year') }}</h6>
                                <div class="box-collapse scrollFilter">
                                    <div class="d-flex gap-2 align-items-center">
                                        <input type="number" name="year_min" class="form-control form-control-sm text-xs rounded-8 text-center" 
                                               min="{{ $yearBoundMin }}" max="{{ $yearBoundMax }}" value="{{ $yearMin }}" placeholder="Min">
                                        <span class="text-muted text-xs">-</span>
                                        <input type="number" name="year_max" class="form-control form-control-sm text-xs rounded-8 text-center" 
                                               min="{{ $yearBoundMin }}" max="{{ $yearBoundMax }}" value="{{ $yearMax }}" placeholder="Max">
                                    </div>
                                </div>
                            </div>

                            <!-- Mileage Max Filter -->
                            <div class="block-filter border-bottom pb-3 mb-3">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Max Mileage') }}</h6>
                                <div class="box-collapse scrollFilter">
                                    <div class="d-flex align-items-center gap-2">
                                        <input type="range" class="form-range" name="mileage_max" min="0" max="{{ $mileageBoundMax }}" step="5000" 
                                               value="{{ $mileageMax ?? $mileageBoundMax }}" id="sidebarMileageSlider"
                                               oninput="document.getElementById('mileageValueLabel').innerText = Number(this.value).toLocaleString() + ' km'">
                                    </div>
                                    <div class="d-flex justify-content-between text-xs text-muted mt-1">
                                        <span>0 km</span>
                                        <span class="text-sm-bold text-dark" id="mileageValueLabel">{{ $mileageMax ? number_format($mileageMax) . ' km' : __('Any') }}</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Make / Brand Checkboxes -->
                            <div class="block-filter border-bottom pb-3 mb-3">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Make / Brand') }}</h6>
                                <div class="box-collapse scrollFilter max-h-180 overflow-auto">
                                    <ul class="list-filter-checkbox list-unstyled mb-0">
                                        @foreach ($brands as $b)
                                            <li class="d-flex align-items-center justify-content-between py-1">
                                                <label class="cb-container text-xs-medium neutral-800 mb-0 cursor-pointer">
                                                    <input type="checkbox" name="brand_id[]" value="{{ $b->id }}" @checked(in_array($b->id, (array)$selectedBrandIds))>
                                                    <span class="text-sm-medium ms-1">{{ $b->name }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="badge bg-light text-muted rounded-pill text-xs">{{ $b->cars()->count() }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Body Type Checkboxes -->
                            <div class="block-filter border-bottom pb-3 mb-3">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Body Type') }}</h6>
                                <div class="box-collapse scrollFilter max-h-180 overflow-auto">
                                    <ul class="list-filter-checkbox list-unstyled mb-0">
                                        @foreach ($carTypes as $type)
                                            <li class="d-flex align-items-center justify-content-between py-1">
                                                <label class="cb-container text-xs-medium neutral-800 mb-0 cursor-pointer">
                                                    <input type="checkbox" name="car_type_id[]" value="{{ $type->id }}" @checked(in_array($type->id, (array)$selectedCarTypes))>
                                                    <span class="text-sm-medium ms-1">{{ $type->name }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="badge bg-light text-muted rounded-pill text-xs">{{ $type->cars_count ?? 0 }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Fuel Type Checkboxes -->
                            <div class="block-filter border-bottom pb-3 mb-3">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Fuel Type') }}</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox list-unstyled mb-0">
                                        @foreach ($fuelTypes as $fuel)
                                            <li class="d-flex align-items-center justify-content-between py-1">
                                                <label class="cb-container text-xs-medium neutral-800 mb-0 cursor-pointer">
                                                    <input type="checkbox" name="fuel_type_id[]" value="{{ $fuel->id }}" @checked(in_array($fuel->id, (array)$selectedFuelTypes))>
                                                    <span class="text-sm-medium ms-1">{{ $fuel->name }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <span class="badge bg-light text-muted rounded-pill text-xs">{{ $fuel->cars_count ?? 0 }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <!-- Transmission Checkboxes -->
                            <div class="block-filter pb-2">
                                <h6 class="text-sm-bold item-collapse neutral-1000 mb-2">{{ __('Transmission') }}</h6>
                                <div class="box-collapse scrollFilter">
                                    <ul class="list-filter-checkbox list-unstyled mb-0">
                                        @foreach ($transmissions as $t)
                                            <li class="d-flex align-items-center justify-content-between py-1">
                                                <label class="cb-container text-xs-medium neutral-800 mb-0 cursor-pointer">
                                                    <input type="checkbox" name="transmission[]" value="{{ $t }}" @checked(in_array($t, (array)$selectedTransmissions))>
                                                    <span class="text-sm-medium ms-1">{{ $t }}</span>
                                                    <span class="checkmark"></span>
                                                </label>
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
    </section>
</div>

<!-- Inline JavaScript for Cascading Make/Model and Lead Modal Pre-fill -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Brand -> Models Cascading Map
    const brandModelsMap = @json($brandModelsMap);
    const brandSelect = document.getElementById('searchSelectBrand');
    const modelSelect = document.getElementById('searchSelectModel');

    if (brandSelect && modelSelect) {
        brandSelect.addEventListener('change', function () {
            const selectedBrandId = this.value;
            const currentSelectedModel = "{{ $selectedModels[0] ?? '' }}";
            
            // Clear current models
            modelSelect.innerHTML = '<option value="">{{ __('All Models') }}</option>';

            if (selectedBrandId && brandModelsMap[selectedBrandId]) {
                brandModelsMap[selectedBrandId].forEach(function (mod) {
                    const opt = document.createElement('option');
                    opt.value = mod;
                    opt.textContent = mod;
                    if (mod === currentSelectedModel) {
                        opt.selected = true;
                    }
                    modelSelect.appendChild(opt);
                });
            } else {
                // Populate all models if no specific brand is selected
                @foreach($allModels as $m)
                    var opt = document.createElement('option');
                    opt.value = "{{ $m }}";
                    opt.textContent = "{{ $m }}";
                    modelSelect.appendChild(opt);
                @endforeach
            }
        });
    }

    // Lead Modal Trigger Pre-fill
    document.querySelectorAll('.btn-trigger-lead-modal').forEach(function (btn) {
        btn.addEventListener('click', function () {
            const carId = this.getAttribute('data-car-id');
            const carName = this.getAttribute('data-car-name');
            const carPrice = this.getAttribute('data-car-price');

            const modalCarId = document.getElementById('modalCarId');
            const modalVehicleContext = document.getElementById('modalVehicleContext');
            const modalVehicleName = document.getElementById('modalVehicleName');
            const modalLeadMessage = document.getElementById('modalLeadMessage');

            if (modalCarId) modalCarId.value = carId || '';
            if (modalVehicleName) modalVehicleName.innerText = carName + (carPrice ? ' (' + carPrice + ')' : '');
            if (modalVehicleContext) modalVehicleContext.classList.remove('d-none');
            if (modalLeadMessage && carName) {
                modalLeadMessage.value = '{{ __('Hello, I am interested in') }}: ' + carName + '. {{ __('Please contact me regarding pricing, financing, and a test drive.') }}';
            }
        });
    });
});
</script>
@endsection
