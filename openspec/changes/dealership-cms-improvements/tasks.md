## 1. Translation Dictionary & Configuration

- [x] 1.1 Update `lang/es.json` with all missing dictionary keys for widgets, dashboard stats, table columns, action buttons, public car detail labels, and new statuses/conditions. Verify by validating json syntax with `php -r "json_decode(file_get_contents('lang/es.json'), true);"`
- [x] 1.2 Update `.env` and `config/app.php` to ensure `APP_LOCALE=es` is the active default locale. Verify with `php artisan config:clear`.

## 2. Admin Dashboard & Widget Localization

- [x] 2.1 Update `DealershipStatsOverview.php` with localized Spanish titles, descriptions, and Pesos (`$`) formatting without US$ tags. Verify by rendering the stats overview.
- [x] 2.2 Update `InquiriesTrendChart.php` and `CarsByCategoryChart.php` with Spanish chart headings, dataset labels, and tooltips. Verify chart output.
- [x] 2.3 Update `LatestInquiriesTableWidget.php` with explicit Spanish column labels (`Nombre del Comprador`, `Vehículo de Interés`, `Teléfono`, `Estado`, `Fecha`) and updated badge colors. Verify table rendering.

## 3. Filament Resource Table Columns & Forms Localization

- [x] 3.1 Update `CarResource.php` with explicit Spanish labels for all table columns (Nombre, Marca, Año, Condición, Estado, Precio, Kilometraje, Transmisión, Destacado), remove `US$` currency string, update form tabs to Spanish ("Galería de Fotos", "Precios y Financiamiento"), and add slug helper guidance. Verify table and form rendering in admin.
- [x] 3.2 Update `ServiceResource.php` and `BlogPostResource.php` with explicit Spanish table column labels (Título, Ícono, Imagen, Activo, Autor, Fecha de Publicación, Editar) and form field translations (Extracto, Contenido, Identificador URL). Verify column headers.
- [x] 3.3 Update `FaqResource.php`, `TeamMemberResource.php`, `WhyUsFeatureResource.php`, and `SettingResource.php` with explicit Spanish column labels and form translations. Verify column headers in all lists.
- [x] 3.4 Update `AmenityResource.php`, `BrandResource.php`, `CarTypeResource.php`, `FuelTypeResource.php`, `LocationResource.php`, and `ReviewResource.php` to ensure all table columns have explicit Spanish labels. Verify table headers.

## 4. Vehicle Statuses, Conditions & Inquiry Lifecycle Expansion

- [x] 4.1 Update `CarResource.php` status options (9 dealership states) and condition options (4 states) with localized labels and matching badge color mappings. Verify select dropdowns and table badges.
- [x] 4.2 Update `CarsListController.php` and `cars-list.blade.php` to support the new condition states (including `refurbished`) in search filters and tab counts. Verify inventory filtering.
- [x] 4.3 Update `InquiryResource.php` to support statuses `pending` (*Pendiente*), `received` (*Recibido*), `read` / `seen` (*Leído / Visto*), `contacted` (*Contactado*), and `closed` (*Cerrado*). Verify inquiry status select and list table.

## 5. Terminology Simplification & Settings

- [x] 5.1 Update `ManageHomepageSettings.php` and `ManageSettings.php` to replace all references to "Hero" with user-friendly Spanish terms ("Sección Principal", "Banner Principal del Encabezado", "Frase Destacada"). Verify settings tabs and input labels.
- [x] 5.2 Verify logo upload fields, previews, and fallbacks in `ManageSettings.php` and `app/helpers.php` to ensure light/dark logo uploads work smoothly.

## 6. Public Vehicle Details & Price Cleanup

- [x] 6.1 Update `resources/views/cars-details.blade.php` to remove the hardcoded `USD` currency indicator next to the vehicle price. Verify price display on vehicle detail view.
- [x] 6.2 Update `resources/views/cars-details.blade.php` to translate "Related Cars" (*Vehículos Relacionados*), "See All Photos" (*Ver Todas las Fotos*), and "Video Clips" (*Ver Video*). Verify details page rendering.

## 7. Cache Clear & Verification

- [x] 7.1 Clear application, view, and config caches using `php artisan cache:clear`, `php artisan view:clear`, `php artisan config:clear`.
- [x] 7.2 Run end-to-end verification across the admin dashboard, resources, settings pages, and frontend car pages to ensure zero raw English strings remain and all new statuses work as expected.
