## Why

The client submitted a comprehensive change request ([change-request.pdf](file:///home/mehedi/Code/fiverr/car-dealership-cms/change-request.pdf)) detailing issues with incomplete Spanish translations across the Filament admin panel and frontend, confusing developer jargon ("Hero", "Slug"), limited vehicle statuses/conditions, and unwanted "US$" / "USD" currency indicators for their Mexican dealership running on Pesos ($/MXN). 

This change addresses all requested fixes in one unified update: completing 100% Spanish localization, introducing user-friendly terminology, expanding the vehicle status lifecycle to 9 distinct states, updating vehicle conditions to 4 options, refining inquiry statuses, cleaning up price displays, and providing guidance and verification for logo customization.

## What Changes

- **Complete Filament Admin Localization**:
  - Add explicit localized labels (`->label(__('...'))`) across table columns in all 15 Filament resources (`CarResource`, `ServiceResource`, `BlogPostResource`, `FaqResource`, `TeamMemberResource`, `WhyUsFeatureResource`, `SettingResource`, etc.) so no raw English column headers appear.
  - Localize all form tabs and fields, replacing English defaults (e.g. "Images" ➔ "Galería de Fotos", "Pricing & Inclusions" ➔ "Precios y Financiamiento").
  - Add missing translation keys to `lang/es.json`.
- **Dashboard & Widget Localization**:
  - Fully translate all KPI statistics cards, sub-labels, and chart titles/datasets in `DealershipStatsOverview`, `InquiriesTrendChart`, `CarsByCategoryChart`, and `LatestInquiriesTableWidget`.
- **Terminology Simplification ("Hero" & "Slug")**:
  - Replace confusing developer jargon ("Hero") across Home Editor and Site Settings with clear, user-friendly Spanish terms ("Sección Principal", "Banner Principal del Encabezado", "Frase Destacada").
  - Add clear Spanish labels and explanations for "Slug" ("Identificador URL / Enlace permanente") with automated generation helper text.
- **Expanded Vehicle Lifecycle & Conditions**:
  - Expand Car Status options to 9 comprehensive dealership states: Available (*Disponible*), Set Aside / Reserved (*Apartado / Reservado*), In Negotiation (*En Negociación*), Sold (*Vendido*), Delivered (*Entregado*), Not Available (*No Disponible*), In Maintenance / Shop (*En Mantenimiento / Taller*), In Transit (*En Tránsito*), Demo / Test Drive (*Demo / Prueba de Manejo*).
  - Expand Car Condition options to 4 states: New (*Nuevo*), Certified Pre-Owned (*Seminuevo Certificado*), Used (*Usado*), Refurbished (*Reacondicionado*).
  - Update vehicle list filters, counts, and badge color mappings to support these new options.
- **Inquiry Status Management**:
  - Update Inquiry statuses in admin tables and widgets to support "Read" / "Seen" (*Leído / Visto*), "Pending" (*Pendiente*), "Received" (*Recibido*), "Contacted" (*Contactado*), and "Closed" (*Cerrado*).
- **Currency & Public Details Cleanup**:
  - Remove hardcoded "USD" and "US$" tags in car cards, tables, and vehicle detail views (`cars-details.blade.php`).
  - Translate public vehicle detail strings ("Related Cars" ➔ "Vehículos Relacionados", "See All Photos" ➔ "Ver Todas las Fotos", "Video Clips" ➔ "Ver Video").
  - Set default currency symbol to `$` (Pesos) and ensure proper formatting across the app.

## Capabilities

### Modified Capabilities
- `spanish-localization`: Update requirements for comprehensive column header translations across all Filament resources, user-friendly replacements for "Hero" and "Slug", and full widget localization.
- `database-models`: Update car status enum/options (9 dealership states), car condition options (4 states), and inquiry statuses.
- `admin-dashboard-metrics`: Update metrics and charts to reflect Spanish labels, proper Pesos formatting, and localized widget headings.
- `car-details-page`: Update price display to remove hardcoded "USD" and localize related cars and photo/video actions.

## Impact

- **Admin Panel**: All Filament resources, widgets, settings pages, and table columns will render in clean Spanish.
- **Database/Models**: `Car` and `Inquiry` models and resource options will support the expanded status/condition lists.
- **Frontend Views**: Public vehicle details, inventory filters, and cards will display clean currency formatting without "USD" and 100% Spanish text.
- **Environment**: Default locale set to `es` (`APP_LOCALE=es`).
