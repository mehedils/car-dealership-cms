## 1. Frontend Homepage & Controller

- [x] 1.1 Remove inclusion of `sections.testimonials` from `resources/views/home.blade.php` and verify the section is no longer rendered on `/`.
- [x] 1.2 Remove `$testimonials` query from `app/Http/Controllers/HomeController.php` and update `tests/Feature/HomePageTest.php` assertions.

## 2. Admin Panel & Homepage Settings

- [x] 2.1 Hide `TestimonialResource` from the Filament navigation sidebar in `app/Filament/Resources/TestimonialResource.php` (`shouldRegisterNavigation = false`) and verify it no longer appears in the sidebar.
- [x] 2.2 Remove `home_section_testimonials_enabled` toggle and `Testimonials Section` tab from `app/Filament/Pages/ManageHomepageSettings.php` and verify settings form renders without testimonials tab.

## 3. Verification & Testing

- [x] 3.1 Run `php artisan test` to verify all automated test assertions pass with testimonials removed from the frontend and admin.
