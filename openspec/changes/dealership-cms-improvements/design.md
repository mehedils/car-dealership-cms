## Context

See [proposal.md](proposal.md) for motivation. The application is built with Laravel 11, Filament v3, Livewire/Blade, and SQLite/MySQL. The project previously had foundational Spanish localization in `lang/es.json`, but several Filament tables relied on Filament's default headline fallback, widgets lacked Spanish dictionary entries, vehicle statuses were limited to 3 options, and technical developer terms ("Hero", "Slug") were exposed in settings forms.

## Goals / Non-Goals

**Goals:**
- Provide 100% Spanish coverage across all Filament resources, widgets, forms, tables, and public views.
- Replace developer jargon ("Hero", "Slug") with clear, intuitive Spanish terms.
- Expand car status options to 9 comprehensive dealership workflow states and car condition options to 4 states.
- Support "Read" / "Seen" (*Leído / Visto*), "Pending", and "Received" statuses for inquiries.
- Remove hardcoded "USD" / "US$" indicators from prices on public pages and admin tables.
- Ensure logo upload settings and fallbacks function smoothly across admin and frontend.

**Non-Goals:**
- Creating a multi-currency conversion engine (the dealership operates in Mexican Pesos with `$` symbol).
- Rewriting database migrations with strict ENUM types (the string columns seamlessly support the expanded statuses).

## Decisions

### 1. Explicit Column Labeling in Filament Resources
- **Decision**: Add explicit `->label(__('...'))` to every `TextColumn`, `ImageColumn`, and `IconColumn` across all 15 Filament resources.
- **Rationale**: Filament's default behavior formats the column attribute name with `Str::headline()`, producing English strings like "Is active", "Author name", "Sort order", "Updated at" when no label is provided. Explicit labeling guarantees that Laravel's translation engine translates every column header into Spanish.
- **Alternatives considered**: Relying on Filament table translation files (`filament-tables::table.columns.*`), which is brittle and doesn't cover custom resource attribute names.

### 2. Vehicle Status & Condition Keys and Badge Colors
- **Decision**: Maintain snake_case internal database keys while exposing localized Spanish names and distinct badge colors:
  - **Statuses**:
    - `available` ➔ *Disponible* (success / green)
    - `reserved` ➔ *Apartado / Reservado* (warning / amber)
    - `in_negotiation` ➔ *En Negociación* (info / blue)
    - `sold` ➔ *Vendido* (gray)
    - `delivered` ➔ *Entregado* (primary / emerald)
    - `not_available` ➔ *No Disponible* (danger / red)
    - `in_maintenance` ➔ *En Mantenimiento / Taller* (warning / orange)
    - `in_transit` ➔ *En Tránsito* (info / cyan)
    - `demo` ➔ *Demo / Prueba de Manejo* (purple / indigo)
  - **Conditions**:
    - `new` ➔ *Nuevo* (success)
    - `certified` ➔ *Seminuevo Certificado* (info)
    - `used` ➔ *Usado* (secondary)
    - `refurbished` ➔ *Reacondicionado* (warning)
- **Rationale**: String columns in SQLite/MySQL require no disruptive table migrations and allow instant compatibility with existing records.

### 3. Terminology Replacement ("Hero" & "Slug")
- **Decision**:
  - In `ManageHomepageSettings.php` and `ManageSettings.php`, replace "Hero Section" with "Sección Principal / Banner de Inicio", "Hero Background Image" with "Imagen de Fondo Principal", and "Hero Badge Tag" with "Etiqueta Superior".
  - In `CarResource.php`, `BlogPostResource.php`, and `ServiceResource.php`, label the slug field as "Identificador URL (Enlace web)" and add helper text: *"Se genera automáticamente a partir del nombre para la dirección web."*
- **Rationale**: Eliminates confusion for non-technical users while preserving the underlying functionality.

### 4. Clean Currency Formatting
- **Decision**:
  - In `CarResource.php`, format the price table column as `'$' . number_format($state)` instead of calling `->money()` which appends `US$` under certain locales.
  - In `cars-details.blade.php`, remove the `$currencyCode` ("USD") display tag next to the price.
- **Rationale**: Meets the client's explicit request to eliminate "US$" and "USD" tags while keeping clean numeric currency formatting.

### 5. Inquiry Lifecycle Update
- **Decision**: Update `InquiryResource` and `LatestInquiriesTableWidget` to support statuses `pending` (*Pendiente*), `received` (*Recibido*), `read` (*Leído / Visto*), `contacted` (*Contactado*), and `closed` (*Cerrado*).

## Risks / Trade-offs

- **[Risk] Existing car records might have legacy status values** ➔ Mitigation: Default fallback handles unrecognized states gracefully by displaying the state string or standard badge.
- **[Risk] Cache persistence in settings** ➔ Mitigation: Run `php artisan cache:clear` and `php artisan view:clear` upon updating language files and setting helpers.
