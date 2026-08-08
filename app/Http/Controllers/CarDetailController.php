<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarDetailController extends Controller
{
    public function show(string $slug)
    {
        $car = Car::with(['brand', 'carType', 'fuelType', 'location', 'amenities', 'reviews', 'media'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedCars = Car::with(['brand', 'carType', 'fuelType', 'location', 'media'])
            ->where('id', '!=', $car->id)
            ->where(function ($query) use ($car) {
                $query->where('brand_id', $car->brand_id)
                      ->orWhere('car_type_id', $car->car_type_id);
            })
            ->take(4)
            ->get();

        return view('cars-details', compact('car', 'relatedCars'));
    }
}
