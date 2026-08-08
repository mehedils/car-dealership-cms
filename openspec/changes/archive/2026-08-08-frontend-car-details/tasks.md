## 1. Controller & Route Setup

- [x] 1.1 Create `app/Http/Controllers/CarDetailController.php` to fetch car by slug with `brand`, `carType`, `fuelType`, `location`, `amenities`, `reviews`, `media`, and fetch related cars.
- [x] 1.2 Update `routes/web.php` to register `/cars/{car:slug}` route.

## 2. Inquiry Form Handling

- [x] 2.1 Create `app/Http/Controllers/InquiryController.php` to handle POST `/inquiries` and store records in `inquiries` table.
- [x] 2.2 Register POST `/inquiries` route in `routes/web.php`.

## 3. Template Refactoring & Dynamic Integration

- [x] 3.1 Update `cars-details.blade.php` header and breadcrumbs with dynamic car name, price, brand, and location.
- [x] 3.2 Update `cars-details.blade.php` gallery slider to iterate over Spatie Media Library images.
- [x] 3.3 Update `cars-details.blade.php` features grid with dynamic vehicle specifications (mileage, transmission, fuel, seats, doors, engine).
- [x] 3.4 Update `cars-details.blade.php` overview and amenities section with `$car->description` and `$car->amenities`.
- [x] 3.5 Update `cars-details.blade.php` sidebar inquiry form to submit to `/inquiries` with success flash message display.
- [x] 3.6 Update `cars-details.blade.php` related cars section to render `$relatedCars` using `@include('partials.car-card')`.
