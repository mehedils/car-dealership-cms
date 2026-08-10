## MODIFIED Requirements

### Requirement: Clean Section Template Naming
The section Blade view partials in `resources/views/sections/` SHALL use clean, semantic names (such as `hero`, `search`, `cars-featured`, `cars-latest`, `cta`) without template number suffixes (`-1`, `-2`, `-3`).

#### Scenario: Developer inspects template inclusions
- **WHEN** developer reviews `resources/views/home.blade.php`
- **THEN** all `@include('sections.*')` statements reference semantic section names.

## ADDED Requirements

### Requirement: Hero Callback Request Form with Searchable Dropdown
The home page hero search partial (`resources/views/sections/search.blade.php`) SHALL render a horizontal callback and test drive inquiry form featuring a searchable vehicle dropdown, name input, phone/WhatsApp input, and submit button.

#### Scenario: Visitor searches for a vehicle in the hero dropdown
- **WHEN** a visitor clicks or types into the vehicle dropdown search box in `sections.search`
- **THEN** the dropdown options filter dynamically in real time matching the typed vehicle brand or model.

#### Scenario: Visitor submits a callback request
- **WHEN** a visitor fills in their vehicle choice, name, and phone number and submits the hero form
- **THEN** the form posts data to `InquiryController@store` (`POST /inquiries`) and displays a success feedback message.
