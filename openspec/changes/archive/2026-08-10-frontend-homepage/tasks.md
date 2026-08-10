## 1. Controller & Route Setup

- [x] 1.1 Create `HomeController` to fetch `brands`, `carTypes`, `locations`, `featuredCars`, `latestCars`, `services`, `whyUsFeatures`, `testimonials`, and `blogPosts`.
- [x] 1.2 Update `routes/web.php` to point `/` to `HomeController`.

## 2. Template Refactoring & Renaming

- [x] 2.1 Rename `resources/views/sections/hero-1.blade.php` to `hero.blade.php`.
- [x] 2.2 Rename `resources/views/sections/search-1.blade.php` to `search.blade.php`.
- [x] 2.3 Rename `resources/views/sections/cars-listing-1.blade.php` to `cars-featured.blade.php`.
- [x] 2.4 Rename `resources/views/sections/cars-listing-2.blade.php` to `cars-latest.blade.php`.
- [x] 2.5 Rename `resources/views/sections/cta-1.blade.php` to `cta.blade.php`.
- [x] 2.6 Update `resources/views/home.blade.php` to reference the clean section names.

## 3. Dynamic Section Integration

- [x] 3.1 Update `search.blade.php` to populate filter select options from `$brands`, `$carTypes`, and `$locations`.
- [x] 3.2 Update `brand.blade.php` to iterate over `$brands`.
- [x] 3.3 Update `cars-featured.blade.php` to iterate over `$featuredCars` with Spatie Media Library images.
- [x] 3.4 Update `categories.blade.php` to iterate over `$carTypes`.
- [x] 3.5 Update `why-us.blade.php` to iterate over `$whyUsFeatures`.
- [x] 3.6 Update `cars-latest.blade.php` to iterate over `$latestCars`.
- [x] 3.7 Update `services.blade.php` to iterate over `$services`.
- [x] 3.8 Update `testimonials.blade.php` to iterate over `$testimonials`.
- [x] 3.9 Update `blog.blade.php` to iterate over `$blogPosts`.
