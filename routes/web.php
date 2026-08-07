<?php

use App\Http\Controllers\CarsListController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/cars-list-1', CarsListController::class);

Route::get('/cars-details-3', function () {
    return view('cars-details');
});

Route::get('/dealer-listing', function () {
    return view('dealer-listing');
});

Route::get('/dealer-details', function () {
    return view('dealer-details');
});
