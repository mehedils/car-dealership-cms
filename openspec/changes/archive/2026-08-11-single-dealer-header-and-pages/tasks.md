## 1. Routes & Navigation URLs

- [x] 1.1 Update `routes/web.php` to define `/cars`, `/services`, and `/about` routes, adding a 301 redirect from `/cars-list-1` to `/cars`.
- [x] 1.2 Replace references to `/cars-list-1` with `/cars` across view templates (`header.blade.php`, `mobile-menu.blade.php`, `footer.blade.php`, `topbar.blade.php`, and section partials).

## 2. Navigation Header & Mobile Menu Refactoring

- [x] 2.1 Refactor `resources/views/partials/header.blade.php` to include direct links (Home, Cars, Services, About Us, Contact Us) and remove Dealers and Car Details dropdowns.
- [x] 2.2 Refactor `resources/views/partials/mobile-menu.blade.php` to match the single-dealer direct link menu structure.
- [x] 2.3 Remove the offcanvas drawer trigger `#btn-offcanvas` and include a prominent "Inquire Now" CTA button triggering `#leadModal`.

## 3. Global Lead Collection Modal

- [x] 3.1 Create `resources/views/partials/lead-modal.blade.php` with form fields (`name`, `phone`, `email`, `message`) submitting to `route('inquiries.store')`.
- [x] 3.2 Include `lead-modal.blade.php` in `resources/views/layouts/app.blade.php` for site-wide availability.

## 4. Dedicated Services & About Us Pages

- [x] 4.1 Create `resources/views/services.blade.php` rendering dealership services from `Service::all()` with hero banner, service cards, and CTA.
- [x] 4.2 Create `resources/views/about.blade.php` rendering dealership background, `WhyUsFeature::all()`, `TeamMember::all()`, and testimonials.
