## Why

The dealership website requirements specify removing the Testimonials section from both the customer-facing frontend and the administrative dashboard, while preserving the underlying database schema and models for future use or historical record keeping.

## What Changes

- **Frontend Removal**:
  - Remove inclusion of the testimonials section partial (`resources/views/sections/testimonials.blade.php`) from `resources/views/home.blade.php`.
  - Remove eager loading and retrieval of `$testimonials` from `HomeController@index`.
  - Remove any testimonial references on secondary pages (e.g. `resources/views/about.blade.php` if present).
- **Admin Panel Removal**:
  - Remove `TestimonialResource` from the Filament navigation sidebar by setting `shouldRegisterNavigation() => false` or deleting the resource class while leaving the `Testimonial` Eloquent model intact.
  - Remove the Testimonials section visibility toggle and the Testimonials content tab from `ManageHomepageSettings`.
- **Database Preservation**:
  - Keep the `testimonials` database table, migrations, seeders, and `App\Models\Testimonial` model untouched.

## Capabilities

### Modified Capabilities
- `frontend-homepage`: Updates homepage rendering requirements to omit the testimonials section.
- `homepage-content-settings`: Removes testimonials section visibility toggle and settings tab from Filament Homepage Settings.
- `admin-sidebar-organization`: Removes testimonials resource from the Filament Admin Content navigation group.

## Impact

- `resources/views/home.blade.php`: Omission of testimonials section partial.
- `app/Http/Controllers/HomeController.php`: Omission of `$testimonials` query.
- `app/Filament/Pages/ManageHomepageSettings.php`: Removal of `home_section_testimonials_enabled` toggle and testimonials content tab.
- `app/Filament/Resources/TestimonialResource.php`: Hidden or removed from Filament navigation.
- `tests/Feature/HomePageTest.php`: Updated assertions to reflect removed homepage variable/section.
