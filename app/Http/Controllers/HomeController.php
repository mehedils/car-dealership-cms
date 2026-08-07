<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\Car;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Location;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\WhyUsFeature;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('home', [
            'brands'        => Brand::all(),
            'carTypes'      => CarType::withCount('cars')->get(),
            'locations'     => Location::all(),
            'fuelTypes'     => FuelType::all(),
            'featuredCars'  => Car::where('is_featured', true)->with(['media', 'brand', 'carType', 'fuelType', 'location'])->take(8)->get(),
            'latestCars'    => Car::latest()->with(['media', 'brand', 'carType', 'fuelType', 'location'])->take(8)->get(),
            'services'      => Service::where('is_active', true)->get(),
            'whyUsFeatures' => WhyUsFeature::orderBy('sort_order')->get(),
            'testimonials'  => Testimonial::all(),
            'blogPosts'     => BlogPost::latest()->take(3)->get(),
        ]);
    }
}
