## Context

The dealership requirements specify removing testimonials from both the frontend layout and the Filament admin interface. The database table (`testimonials`), seeders, and `Testimonial` Eloquent model must remain intact in the repository.

See `proposal.md` for motivation and scope.

## Goals / Non-Goals

**Goals:**
- Eliminate testimonials section from the homepage (`resources/views/home.blade.php`).
- Prevent querying testimonials in `HomeController@index` to optimize query count.
- Remove testimonials from Filament navigation and from `ManageHomepageSettings` tabs/visibility toggles.
- Keep the `testimonials` table, migrations, and `App\Models\Testimonial` model in the database intact.
- Update automated tests (`tests/Feature/HomePageTest.php`) to assert the page renders cleanly without requiring testimonials.

**Non-Goals:**
- Dropping the `testimonials` table or creating database rollback migrations.
- Deleting the `App\Models\Testimonial` Eloquent model class.

## Decisions

1. **Frontend Exclusion**:
   - In `resources/views/home.blade.php`, remove the `@includeWhen(..., 'sections.testimonials')` line.
   - In `app/Http/Controllers/HomeController.php`, remove `'testimonials' => Testimonial::where('is_active', true)->get()` from the view parameters.
2. **Filament Admin Exclusion**:
   - In `app/Filament/Resources/TestimonialResource.php`, set `shouldRegisterNavigation(): bool => false` (or delete the Filament resource if never needed in UI) while preserving the model. Setting `shouldRegisterNavigation(): bool => false` cleanly hides it from the sidebar.
   - In `app/Filament/Pages/ManageHomepageSettings.php`:
     - Remove the `home_section_testimonials_enabled` toggle from the Section Visibility tab.
     - Remove the `Testimonials Section` content tab.
3. **Database & Model Preservation**:
   - Do not alter `database/migrations/2026_08_07_162503_create_testimonials_table.php` or `app/Models/Testimonial.php`.

## Risks / Trade-offs

- [Test Failures] → `tests/Feature/HomePageTest.php` checks for `'testimonials'` in `$response->assertViewHasAll([...])`. Update the test assertions to remove `'testimonials'` from required view data.
