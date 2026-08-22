# frontend-homepage Specification

## Purpose
Specification for the homepage sections, data rendering, section partial structures, and hero lead inquiry form.

## Requirements

### Requirement: Dynamic Homepage Data Rendering
The application SHALL render homepage sections dynamically using data retrieved from the database via `HomeController`, displaying structured dealership value proposition cards with thematic icons for the Why Choose Us section and omitting testimonials.

#### Scenario: User visits the homepage
- **WHEN** a visitor navigates to `/`
- **THEN** the page displays dynamic Brands, Featured Cars, Latest Cars, Car Types, Services, Why Us Features, and Blog Posts from database models.
- **AND** does NOT render customer testimonials.

#### Scenario: User views Why Choose Us section
- **WHEN** a visitor navigates to `/` and scrolls to the Why Choose Us section
- **THEN** the section displays four elevated value proposition cards featuring dealership icons (e.g. Certified Inspection, Financing, Transparent Pricing, Warranty), bold titles, and benefit descriptions.
- **AND** cards feature interactive hover elevation animations and theme-coordinated styling.

### Requirement: Clean Section Template Naming
The section Blade view partials in `resources/views/sections/` SHALL use clean, semantic names (such as `hero`, `search`, `cars-featured`, `cars-latest`, `cta`) without template number suffixes (`-1`, `-2`, `-3`).

#### Scenario: Developer inspects template inclusions
- **WHEN** developer reviews `resources/views/home.blade.php`
- **THEN** all `@include('sections.*')` statements reference semantic section names.

### Requirement: Hero Callback Request Form with Searchable Dropdown
The home page hero search partial (`resources/views/sections/search.blade.php`) SHALL render a horizontal callback and test drive inquiry form featuring a searchable vehicle dropdown, name input, phone/WhatsApp input, and submit button.

#### Scenario: Visitor searches for a vehicle in the hero dropdown
- **WHEN** a visitor clicks or types into the vehicle dropdown search box in `sections.search`
- **THEN** the dropdown options filter dynamically in real time matching the typed vehicle brand or model.

#### Scenario: Visitor submits a callback request
- **WHEN** a visitor fills in their vehicle choice, name, and phone number and submits the hero form
- **THEN** the form posts data to `InquiryController@store` (`POST /inquiries`) and displays a success feedback message.
