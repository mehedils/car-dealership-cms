## 1. Database Schema & Models

- [x] 1.1 Create migration to add `year`, `model`, `condition`, and `status` columns to `cars` table and verify with `php artisan migrate`.
- [x] 1.2 Update `Car` model fillable attributes, casts, and update `DatabaseSeeder` with realistic dealership vehicle records.
- [x] 1.3 Update Filament `CarResource` form schema and table columns to manage `year`, `model`, `condition`, and `status`.

## 2. CMS Inventory Settings

- [x] 2.1 Add Inventory Page header settings (`inventory_hero_bg_image`, `inventory_hero_badge`, `inventory_hero_title`, `inventory_hero_subtitle`) to Filament `ManageSettings` and default seed settings.

## 3. Backend Inventory Query Controller

- [x] 3.1 Refactor `CarsListController` from static `config('cars')` to Eloquent queries supporting condition, brand, model, year range, price range, mileage, body type, transmission, and fuel type.
- [x] 3.2 Implement dynamic query boundaries (`minPrice`, `maxPrice`, `minYear`, `maxYear`), pagination, and dealership sorting options (`price_asc`, `price_desc`, `year_desc`, `mileage_asc`, `latest`).

## 4. Frontend Search Engine & Layout

- [x] 4.1 Update page header in `resources/views/cars-list.blade.php` to display dealership copy and CMS-configured background with showroom fallback.
- [x] 4.2 Replace rental search engine bar with sales filters (Condition tabs, cascading Make/Model dropdowns, Year, Price, Body Type, Transmission, Fuel Type).
- [x] 4.3 Reorganize sidebar filters with dealership sales criteria and synchronized dual-thumb range sliders.
- [x] 4.4 Remove duplicate fleet intro section and duplicate bottom brand carousel ticker from `resources/views/cars-list.blade.php`.

## 5. Vehicle Card Specs, Badges & CTAs

- [x] 5.1 Update `resources/views/partials/car-card.blade.php` to display Total Price, Year, Mileage, Transmission, and Fuel Type, while removing passenger seats and luggage counts.
- [x] 5.2 Add color-coded status badges (Nuevo, Usado, Certificado, Reservado, Vendido) and estimated monthly financing tag to vehicle cards.
- [x] 5.3 Implement dual card CTAs ("Ver Detalles" and "Solicitar Cotización / Agendar Cita") connecting with `#leadModal`.

## 6. Sorting, Empty State & Localization

- [x] 6.1 Update inventory toolbar with dealership sorting options and dynamic vehicle counter ("Mostrando 1 - 12 de 45 vehículos").
- [x] 6.2 Create empty state component with "Limpiar Filtros" and "Contáctanos para buscarlo por ti" lead generation trigger.
- [x] 6.3 Update `lang/es.json` with Spanish translations for all new dealership filters, badges, CTAs, and empty state messaging.

## 7. Verification & End-to-End Testing

- [x] 7.1 Verify inventory filtering, cascading dropdowns, sorting, pagination, empty states, and lead modal submission via browser/functional checks.
