## 1. Setup & Environment Configuration

- [x] 1.1 Create `lang/es.json` with Spanish dictionary keys for Admin and Frontend
- [x] 1.2 Verify `config/app.php` reads `APP_LOCALE` properly and update `.env` to support locale switching

## 2. Filament Admin Resources Localization

- [x] 2.1 Update `CarResource.php`, `BrandResource.php`, and `CarTypeResource.php` to wrap labels, tabs, and navigation groups in `__('...')`
- [x] 2.2 Update `FuelTypeResource.php`, `AmenityResource.php`, and `LocationResource.php` to wrap labels, tabs, and navigation groups in `__('...')`
- [x] 2.3 Update `ServiceResource.php`, `FaqResource.php`, `BlogPostResource.php`, and `InquiryResource.php` to wrap labels, tabs, and navigation groups in `__('...')`
- [x] 2.4 Update `ReviewResource.php`, `SettingResource.php`, `TeamMemberResource.php`, `TestimonialResource.php`, and `WhyUsFeatureResource.php` to wrap labels, tabs, and navigation groups in `__('...')`

## 3. Frontend Blade Views Localization

- [x] 3.1 Update layout and partial views (`header`, `footer`, `navigation`, `topbar`) to wrap text in `__('...')`
- [x] 3.2 Update main page views (`home`, `cars-list`, `cars-details`, `about`, `services`, `contact`, `dealer-listing`, `dealer-details`) to wrap UI text in `__('...')`
- [x] 3.3 Update component and section Blade files (car cards, filter sections, contact forms) to wrap static strings in `__('...')`

## 4. Database Seeders & Validation

- [x] 4.1 Update `DatabaseSeeder.php` to populate default taxonomies (Car Types, Fuel Types, Amenities, Locations, FAQs) in Spanish
- [x] 4.2 Run test verification with `APP_LOCALE=es` and verify both frontend site and admin panel display 100% in Spanish
