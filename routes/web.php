<?php

use App\Http\Controllers\CarDetailController;
use App\Http\Controllers\CarsListController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InquiryController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/cars-list-1', CarsListController::class);
Route::get('/cars/{slug}', [CarDetailController::class, 'show'])->name('cars.show');

Route::post('/inquiries', [InquiryController::class, 'store'])->name('inquiries.store');

Route::get('/dealer-listing', function () {
    return view('dealer-listing');
});

Route::get('/dealer-details', function () {
    return view('dealer-details');
});

Route::get('/contact', function () {
    return view('contact');
});


