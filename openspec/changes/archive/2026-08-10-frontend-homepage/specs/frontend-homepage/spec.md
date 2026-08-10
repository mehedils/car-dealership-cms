## ADDED Requirements

### Requirement: Dynamic Homepage Data Rendering
The application SHALL render homepage sections dynamically using data retrieved from the database via `HomeController`.

#### Scenario: User visits the homepage
- **WHEN** a visitor navigates to `/`
- **THEN** the page displays dynamic Brands, Featured Cars, Latest Cars, Car Types, Services, Why Us Features, Testimonials, and Blog Posts from database models.

### Requirement: Clean Section Template Naming
The section Blade view partials in `resources/views/sections/` SHALL use clean, semantic names (such as `hero`, `search`, `cars-featured`, `cars-latest`, `cta`) without template number suffixes (`-1`, `-2`, `-3`).

#### Scenario: Developer inspects template inclusions
- **WHEN** developer reviews `resources/views/home.blade.php`
- **THEN** all `@include('sections.*')` statements reference semantic section names.
