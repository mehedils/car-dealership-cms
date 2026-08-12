## ADDED Requirements

### Requirement: Global Locale Switching via APP_LOCALE
The system SHALL read `APP_LOCALE` from the environment configuration and set the application locale accordingly. When `APP_LOCALE=es`, the entire application (including frontend views and Filament admin panel) MUST display in Spanish. When `APP_LOCALE=en`, the application MUST display in English.

#### Scenario: Switching locale to Spanish
- **WHEN** `APP_LOCALE=es` is configured in `.env`
- **THEN** both the public website and Filament admin panel translate all UI strings to Spanish

#### Scenario: Switching locale to English
- **WHEN** `APP_LOCALE=en` is configured in `.env`
- **THEN** both the public website and Filament admin panel render in English

### Requirement: Centralized Translation Dictionary
The system SHALL maintain a central translation dictionary at `lang/es.json` mapping all English keys used in `__('...')` functions to their Spanish translations.

#### Scenario: Translation string lookup
- **WHEN** a Blade view or Filament Resource calls `__('Inventory')` with locale `es`
- **THEN** the system returns `"Inventario"` from `lang/es.json`

### Requirement: Filament Admin Panel Localization
All 15 Filament Admin Resources, navigation groups, page headers, tab titles, table columns, and form field labels SHALL use Laravel translation helpers to support Spanish localization when `APP_LOCALE=es`.

#### Scenario: Admin panel navigation rendering
- **WHEN** an admin user accesses the Filament admin panel with `APP_LOCALE=es`
- **THEN** navigation groups, resource titles, table headers, form tabs, and action buttons render in Spanish

### Requirement: Frontend Blade Template Localization
All Blade template files in `resources/views/` (pages, layouts, sections, and partial components) SHALL wrap static user-interface text in translation helpers `__('...')`.

#### Scenario: Public user browsing website
- **WHEN** a user visits any page on the public site with `APP_LOCALE=es`
- **THEN** all page headings, menu options, search filter labels, contact forms, and footer content display in Spanish

### Requirement: Spanish Taxonomy Database Seeders
Database seeders SHALL populate initial taxonomy data (Car Types, Fuel Types, Amenities, Locations, Services, FAQs) in Spanish when seeding the database for the client environment.

#### Scenario: Seeding database for Mexican client
- **WHEN** running `php artisan db:seed`
- **THEN** taxonomy records (such as *Sedán*, *Gasolina*, *Aire Acondicionado*) are stored in Spanish
