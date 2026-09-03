<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Location;
use Illuminate\Http\Request;

class CarsListController extends Controller
{
    public function __invoke(Request $request)
    {
        // Dynamic Boundaries from DB
        $priceBoundMin = (int) floor(Car::min('price') ?? 10000);
        $priceBoundMax = (int) ceil(Car::max('price') ?? 100000);
        $yearBoundMin = (int) (Car::min('year') ?? 2015);
        $yearBoundMax = (int) (Car::max('year') ?? (int) date('Y') + 1);
        $mileageBoundMax = (int) (Car::max('mileage') ?? 120000);

        // Requested Inputs
        $priceMin = $request->filled('price_min') ? (int) $request->input('price_min') : $priceBoundMin;
        $priceMax = $request->filled('price_max') ? (int) $request->input('price_max') : $priceBoundMax;
        $yearMin = $request->filled('year_min') ? (int) $request->input('year_min') : $yearBoundMin;
        $yearMax = $request->filled('year_max') ? (int) $request->input('year_max') : $yearBoundMax;
        $mileageMax = $request->filled('mileage_max') ? (int) $request->input('mileage_max') : null;

        $condition = $request->input('condition', 'all');
        $selectedBrandIds = array_filter((array) $request->input('brand_id', []));
        $selectedModels = array_filter((array) $request->input('model', []));
        $selectedCarTypes = array_filter((array) $request->input('car_type_id', []));
        $selectedFuelTypes = array_filter((array) $request->input('fuel_type_id', []));
        $selectedTransmissions = array_filter((array) $request->input('transmission', []));

        $sort = $request->input('sort', 'latest');
        $perPage = (int) $request->input('per_page', 12);
        if (! in_array($perPage, [9, 12, 18, 24])) {
            $perPage = 12;
        }

        // Query Builder
        $query = Car::query()->with(['brand', 'carType', 'fuelType', 'location', 'media']);

        // Condition Filter
        if ($condition && $condition !== 'all') {
            if (is_array($condition)) {
                $query->whereIn('condition', $condition);
            } else {
                $query->where('condition', $condition);
            }
        }

        // Brand Filter
        if (! empty($selectedBrandIds)) {
            $query->whereIn('brand_id', $selectedBrandIds);
        }

        // Model Filter
        if (! empty($selectedModels)) {
            $query->whereIn('model', $selectedModels);
        }

        // Year Filter
        if ($request->filled('year_min')) {
            $query->where('year', '>=', $yearMin);
        }
        if ($request->filled('year_max')) {
            $query->where('year', '<=', $yearMax);
        }

        // Price Filter
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $priceMin);
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $priceMax);
        }

        // Mileage Filter
        if ($request->filled('mileage_max') && $mileageMax !== null) {
            $query->where('mileage', '<=', $mileageMax);
        }

        // Car Type / Body Type Filter
        if (! empty($selectedCarTypes)) {
            $query->whereIn('car_type_id', $selectedCarTypes);
        }

        // Fuel Type Filter
        if (! empty($selectedFuelTypes)) {
            $query->whereIn('fuel_type_id', $selectedFuelTypes);
        }

        // Transmission Filter
        if (! empty($selectedTransmissions)) {
            $query->whereIn('transmission', $selectedTransmissions);
        }

        // Sorting
        match ($sort) {
            'price_asc' => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'year_desc' => $query->orderBy('year', 'desc')->orderBy('created_at', 'desc'),
            'mileage_asc' => $query->orderBy('mileage', 'asc'),
            'name' => $query->orderBy('name', 'asc'),
            default => $query->latest(),
        };

        // Paginated results using Laravel's LengthAwarePaginator
        $paginatedCars = $query->paginate($perPage)->withQueryString();

        // Taxonomy Data & Cascading Model Mapping
        $brands = Brand::orderBy('name')->get();
        $brandModelsMap = Car::whereNotNull('model')
            ->select('brand_id', 'model')
            ->distinct()
            ->get()
            ->groupBy('brand_id')
            ->map(fn ($group) => $group->pluck('model')->unique()->values());

        $allModels = Car::whereNotNull('model')
            ->select('model')
            ->distinct()
            ->orderBy('model')
            ->pluck('model');

        $carTypes = CarType::withCount('cars')->get();
        $fuelTypes = FuelType::withCount('cars')->get();
        $transmissions = Car::whereNotNull('transmission')
            ->select('transmission')
            ->distinct()
            ->pluck('transmission');

        // Condition counts
        $conditionCounts = [
            'all' => Car::count(),
            'new' => Car::where('condition', 'new')->count(),
            'certified' => Car::where('condition', 'certified')->count(),
            'used' => Car::where('condition', 'used')->count(),
            'refurbished' => Car::where('condition', 'refurbished')->count(),
        ];

        return view('cars-list', compact(
            'paginatedCars',
            'brands',
            'brandModelsMap',
            'allModels',
            'carTypes',
            'fuelTypes',
            'transmissions',
            'conditionCounts',
            'condition',
            'selectedBrandIds',
            'selectedModels',
            'selectedCarTypes',
            'selectedFuelTypes',
            'selectedTransmissions',
            'sort',
            'perPage',
            'priceMin',
            'priceMax',
            'priceBoundMin',
            'priceBoundMax',
            'yearMin',
            'yearMax',
            'yearBoundMin',
            'yearBoundMax',
            'mileageMax',
            'mileageBoundMax'
        ));
    }
}
