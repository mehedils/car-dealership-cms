## Context

See `proposal.md` for background motivation. Currently, `/cars` is served by `CarsListController` reading an unmaintained `config/cars.php` static array. The template contains hardcoded rental UI elements (pick-up / drop-off cities, travel dates, passenger counts) and duplicate carousel tickers. The database `cars` table requires sales-specific columns (`year`, `model`, `condition`, `status`) to power dedicated dealership filtering.

## Goals / Non-Goals

**Goals:**
- Connect `/cars` entirely to Eloquent with dynamic SQL filtering, sorting, pagination, and range bounds.
- Provide a clean sales search engine with condition tabs, cascading Make & Model dropdowns, price/year/mileage sliders, and taxonomy filters.
- Redesign vehicle cards with color-coded status badges, prominent pricing, monthly financing estimate, and dual CTAs ("Ver Detalles", "Solicitar Cotización").
- Allow CMS customization of the inventory page hero banner and copy via Filament `ManageSettings`.
- Provide an empty state with filter reset and vehicle sourcing lead triggers.
- Remove duplicate secondary sections (fleet headings, brand ticker) from `/cars`.
- Maintain complete English and Spanish (`lang/es.json`) localization.

**Non-Goals:**
- Online payment gateway processing / checkout (dealership workflow relies on lead inquiries, quote requests, and appointment booking).
- Multi-dealer tenancy (the system is designed for single dealership / multi-branch dealership network).

## Decisions

### 1. Database Schema Extension on `cars` Table
* **Choice**: Add `year` (smallInteger), `model` (string), `condition` (string/enum: `new`, `used`, `certified`), and `status` (string/enum: `available`, `reserved`, `sold`) directly to the `cars` table via a new migration.
* **Rationale**: Fast query execution, simple indexability, and clean integration with Filament's existing `CarResource`.
* **Alternatives considered**: Creating a separate `car_models` table. Direct column storage was chosen for ease of content management and flexible naming without rigid foreign key overhead.

### 2. Cascading Make & Model Filtering
* **Choice**: Render available models as data-mapped options or dynamically populate the Model `<select>` based on the selected Brand via lightweight client-side JavaScript.
* **Rationale**: Instant UI responsiveness without full-page reloads or external heavy JavaScript frameworks. When a user selects "Toyota", only models present in the database for "Toyota" are enabled/displayed.

### 3. Dynamic Financing Estimation Formula
* **Choice**: Display an estimated monthly payment (e.g. "Desde $350/mes") calculated dynamically using a standard 48-month term at ~20% down, while allowing an optional custom `monthly_payment` field on `cars` if overridden in Filament.
* **Rationale**: Dealership buyers expect quick affordability indicators without entering full credit applications upfront.

### 4. Interactive Lead Modal Integration
* **Choice**: Connect the secondary vehicle card CTA ("Solicitar Cotización / Agendar Cita") to trigger the existing `#leadModal`, dynamically passing vehicle context (ID, title, price) into hidden fields and modal header.
* **Rationale**: Reuses existing inquiry submission workflow (`inquiries.store`) and ensures high lead capture rate directly from the inventory grid.

### 5. Hero Banner Configuration in Filament Settings
* **Choice**: Add an "Inventory Page" section in Filament's `ManageSettings` with keys `inventory_hero_bg_image`, `inventory_hero_badge`, `inventory_hero_title`, and `inventory_hero_subtitle`.
* **Rationale**: Consistent with the application's existing `Setting` key-value architecture and `setting(...)` helper.

## Risks / Trade-offs

- **[Existing Database Records Lack New Attributes]** → Migration provides sensible defaults (`year` default to current/previous year, `condition` default to `used`, `status` default to `available`), and `DatabaseSeeder` is updated to generate realistic dealership models, years (2018–2025), and conditions.
- **[Empty Query Boundaries]** → Controller safeguards against empty database state using fallback defaults for min/max prices ($5,000 to $150,000) and years (2015 to current year).
