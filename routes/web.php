<?php

use App\Http\Controllers\CarDetailController;
use App\Http\Controllers\CarsListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\WhyUsFeature;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

// Cars / Inventory
Route::get('/cars', CarsListController::class)->name('cars.index');
Route::get('/cars-list-1', function () {
    return redirect('/cars', 301);
});
Route::get('/cars/{slug}', [CarDetailController::class, 'show'])->name('cars.show');

// Dedicated Services Page
Route::get('/services', function () {
    $services = Service::all();
    return view('services', compact('services'));
})->name('services');

// Dedicated About Us Page
Route::get('/about', function () {
    $whyUsFeatures = WhyUsFeature::all();
    $teamMembers = TeamMember::all();
    $testimonials = Testimonial::all();
    return view('about', compact('whyUsFeatures', 'teamMembers', 'testimonials'));
})->name('about');

Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');



