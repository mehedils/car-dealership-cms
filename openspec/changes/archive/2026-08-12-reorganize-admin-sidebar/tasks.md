## 1. Filament Navigation Group Configuration

- [x] 1.1 Update `AdminPanelProvider.php` to define explicit `$panel->navigationGroups()` in order: `Inventory`, `Leads`, `Content`, `Settings`.

## 2. Resource & Page Label / Sorting Updates

- [x] 2.1 Update `CarResource.php`, `BrandResource.php`, `CarTypeResource.php`, `FuelTypeResource.php`, `AmenityResource.php`, and `LocationResource.php` with short labels (`Categories`, `Fuels`, `Features`) and explicit `$navigationSort` (1-6) under `Inventory`.
- [x] 2.2 Update `InquiryResource.php` and `ReviewResource.php` to move to `Leads` group with short labels (`Leads`, `Reviews`) and `$navigationSort` (1-2).
- [x] 2.3 Update `ManageHomepageSettings.php`, `ServiceResource.php`, `BlogPostResource.php`, `FaqResource.php`, `TestimonialResource.php`, `TeamMemberResource.php`, and `WhyUsFeatureResource.php` with short labels (`Home Editor`, `Blog`, `FAQs`, `Team`, `Highlights`) and `$navigationSort` (1-7) under `Content`.
- [x] 2.4 Update `ManageSettings.php` with label `Site Settings` and `$navigationSort` (1) under `Settings`.

## 3. Spanish Dictionary & Verification

- [x] 3.1 Update `lang/es.json` with Spanish mappings for all short labels (`Tipos`, `Combustibles`, `Comodidades`, `Consultas`, `Inicio`, `Blog`, `Preguntas`, `Equipo`, `Beneficios`, `Ajustes`).
- [x] 3.2 Clear caches and verify clean UI layout in both English and Spanish locales.
