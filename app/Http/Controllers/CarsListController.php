<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarsListController extends Controller
{
    public function __invoke(Request $request)
    {
        $cars = config('cars');

        $priceBoundMin = (int) min(array_column($cars, 'price'));
        $priceBoundMax = (int) max(array_column($cars, 'price'));
        $priceMin = (int) $request->input('price_min', $priceBoundMin);
        $priceMax = (int) $request->input('price_max', $priceBoundMax);
        $carTypes = (array) $request->input('car_type', []);
        $amenities = (array) $request->input('amenities', []);
        $fuelTypes = (array) $request->input('fuel_type', []);
        $ratings = (array) $request->input('rating', []);
        $locations = (array) $request->input('location', []);
        $sort = $request->input('sort', 'name');
        $perPage = (int) $request->input('per_page', 10);
        $page = max(1, (int) $request->input('page', 1));

        if (! in_array($perPage, [10, 15, 20])) {
            $perPage = 10;
        }
        if (! in_array($sort, ['name', 'price', 'rating'])) {
            $sort = 'name';
        }

        $filtered = array_filter($cars, function ($car) use ($priceMin, $priceMax, $carTypes, $amenities, $fuelTypes, $ratings, $locations) {
            if ($car['price'] < $priceMin || $car['price'] > $priceMax) {
                return false;
            }
            if ($carTypes && ! in_array($car['carType'], $carTypes)) {
                return false;
            }
            if ($amenities && ! in_array($car['amenities'], $amenities)) {
                return false;
            }
            if ($fuelTypes && ! in_array($car['fuelType'], $fuelTypes)) {
                return false;
            }
            if ($ratings && ! in_array((string) $car['rating'], $ratings)) {
                return false;
            }
            if ($locations && ! in_array($car['location'], $locations)) {
                return false;
            }

            return true;
        });

        usort($filtered, function ($a, $b) use ($sort) {
            return match ($sort) {
                'price' => $a['price'] <=> $b['price'],
                'rating' => $b['rating'] <=> $a['rating'],
                default => strcmp($a['name'], $b['name']),
            };
        });

        $total = count($filtered);
        $totalPages = max(1, (int) ceil($total / $perPage));
        $page = min($page, $totalPages);
        $startIndex = ($page - 1) * $perPage;
        $paginated = array_slice(array_values($filtered), $startIndex, $perPage);

        $unique = [
            'carTypes' => array_values(array_unique(array_column($cars, 'carType'))),
            'amenities' => array_values(array_unique(array_column($cars, 'amenities'))),
            'fuelTypes' => array_values(array_unique(array_column($cars, 'fuelType'))),
            'ratings' => array_values(array_unique(array_map('strval', array_column($cars, 'rating')))),
            'locations' => array_values(array_unique(array_column($cars, 'location'))),
        ];
        sort($unique['ratings'], SORT_NUMERIC);
        usort($unique['locations'], 'strcmp');

        $counts = [
            'carTypes' => array_count_values(array_column($cars, 'carType')),
            'amenities' => array_count_values(array_column($cars, 'amenities')),
            'fuelTypes' => array_count_values(array_column($cars, 'fuelType')),
            'ratings' => array_count_values(array_map('strval', array_column($cars, 'rating'))),
            'locations' => array_count_values(array_column($cars, 'location')),
        ];

        return view('cars-list', compact(
            'paginated', 'total', 'totalPages', 'page', 'perPage', 'sort',
            'unique', 'counts', 'cars',
            'priceMin', 'priceMax', 'priceBoundMin', 'priceBoundMax',
            'carTypes', 'amenities', 'fuelTypes', 'ratings', 'locations'
        ));
    }
}
