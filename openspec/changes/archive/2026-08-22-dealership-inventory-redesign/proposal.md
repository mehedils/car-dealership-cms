## Why

The current `/cars` inventory listing page is built around a generic car rental template with static mock data from `config/cars.php`, irrelevant rental input fields (pickup/return locations, rental dates), and missing dealership sales essentials (condition tabs, make/model cascading, year/mileage/price sliders, vehicle badges, financing estimates, and sales CTAs). Redesigning `/cars` into a dedicated dealership inventory search engine connects the page directly to the Eloquent database, streamlines vehicle discovery, removes secondary distractions like duplicate carousels, and enhances lead generation triggers.

## What Changes

- **Page Header & Hero Section**:
  - Replace generic rental copy ("Search and find your best car rental", "for sale and for rent near you") with dealership copy ("Inventario de Vehículos Nuevos y Usados", "Encuentra el auto que estás buscando").
  - Make the header background image and copy editable via CMS Settings with a showroom graphic default fallback.
- **Main Sales Search Engine & Filter Bar**:
  - Strip rental pickup/return location dropdowns and date pickers.
  - Connect search and sidebar filters directly to database models via Eloquent.
  - Add dealership sales filters: Condición (Todos / Nuevos / Usados / Certificados), Marca & Modelo cascading dropdowns, Año (Year range), Rango de Precio (Price slider), Kilometraje (Mileage max/range), Tipo de Carrocería (Body Type), Transmisión (Automática / Manual), and Combustible (Fuel Type).
  - Add missing schema fields (`year`, `model`, `condition`, `status`) to `cars` table and update Filament `CarResource` and seeders.
- **Inventory Grid & Vehicle Cards**:
  - Reorganize card specs to prioritize dealership buyers: Total Price, Year, Mileage (km), Transmission, Fuel Type.
  - Remove/hide passenger capacity ("2 Asientos") and luggage capacity tags.
  - Prominently display total price along with an estimated monthly financing badge ("Desde $X/mes" or "Financiamiento disponible").
  - Add status badges over vehicle thumbnail images: Nuevo, Usado, Certificado / Garantizado, Reservado, Vendido.
  - Replace generic details button with primary buying triggers: "Ver Detalles" and "Solicitar Cotización / Agendar Cita" (which opens the lead modal prefilled with vehicle context).
- **Sorting, Layout Controls & Pagination**:
  - Add dealership sorting options: Precio (Menor a Mayor / Mayor a Menor), Año (Más Reciente), Kilometraje (Menor a Mayor), Recientemente Agregados.
  - Update results counter to dynamic dealership text ("Mostrando 12 de 45 vehículos").
  - Add a styled empty state with CTA ("No encontramos vehículos con estos criterios. [Limpiar Filtros] o [Contáctanos para buscarlo por ti]").
- **Secondary Section Cleanup**:
  - Remove the duplicate "Our Vehicle Fleet" header and the duplicate bottom brand ticker carousel from `/cars` to focus on vehicle browsing.

## Capabilities

### New Capabilities
- `dealership-inventory-search-and-grid`: Covers dealership sales search engine, cascading make/model filtering, dynamic year/price/mileage bounds, vehicle card badge and spec display, sales CTAs, sorting, empty states, and CMS-editable inventory header.

### Modified Capabilities
- `database-models`: Adds `year`, `model`, `condition`, and `status` attributes to the `Car` model, migration, seeder, and Filament admin resource.

## Impact

- **Database & Models**: New migration for `cars` table (`year`, `model`, `condition`, `status`); updated `Car` model and `DatabaseSeeder`.
- **Backend Controllers**: `CarsListController` completely refactored to query Eloquent with dynamic request filtering, bounds, and pagination.
- **Filament Admin**: Updated `CarResource` form and table to edit `year`, `model`, `condition`, `status`; added inventory header settings in `ManageSettings`.
- **Frontend Views**: Updated `resources/views/cars-list.blade.php`, `resources/views/partials/car-card.blade.php`, and `resources/views/partials/lead-modal.blade.php`.
- **Translations**: Added Spanish and English dictionary entries in `lang/es.json` for all new filters, badges, and empty states.
