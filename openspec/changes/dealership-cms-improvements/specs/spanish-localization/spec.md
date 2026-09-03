## MODIFIED Requirements

### Requirement: Centralized Translation Dictionary
The system SHALL maintain a central translation dictionary at `lang/es.json` mapping all English keys used in `__('...')` functions to their Spanish translations, covering all admin navigation, resource labels, table columns, form tabs, widgets, and user-facing terminology.

#### Scenario: Translation string lookup
- **WHEN** a Blade view or Filament Resource calls `__('Inventory')` with locale `es`
- **THEN** the system returns `"Inventario"` from `lang/es.json`

#### Scenario: Translating previously unmapped keys
- **WHEN** an admin or public user views widgets, table columns, or actions (e.g. `Showroom Inventory`, `Buyer Inquiries`, `Related Cars`, `See All Photos`)
- **THEN** the system resolves the respective Spanish translation from `lang/es.json` without displaying raw English fallback text

### Requirement: Filament Admin Panel Localization
All 15 Filament Admin Resources, navigation groups, page headers, tab titles, table columns, and form field labels SHALL use Laravel translation helpers to support Spanish localization when `APP_LOCALE=es`. All table columns MUST have explicit localized labels (`->label(__('...'))`) rather than relying on unlocalized property name conversions.

#### Scenario: Admin panel navigation rendering
- **WHEN** an admin user accesses the Filament admin panel with `APP_LOCALE=es`
- **THEN** navigation groups, resource titles, table headers, form tabs, and action buttons render in Spanish

#### Scenario: Table column header localization
- **WHEN** an administrator views any resource list table (e.g., Autos, Servicios, Blog, Preguntas, Equipo, Beneficios, Configuración)
- **THEN** all table column headers display translated Spanish labels (such as *Nombre*, *Marca*, *Año*, *Condición*, *Estado*, *Precio*, *Título*, *Ícono*, *Activo*, *Fecha de Publicación*)

### Requirement: User-Friendly Terminology Replacement
The system SHALL replace technical developer terms in admin settings and form interfaces with clear, intuitive Spanish terms. References to "Hero" SHALL be labeled as *Sección Principal* or *Banner del Encabezado*, and "Slug" SHALL be labeled as *Identificador URL (Enlace web)* with helper text indicating automatic generation.

#### Scenario: Viewing Home Editor and Site Settings
- **WHEN** an administrator navigates to the Home Editor or Site Settings pages
- **THEN** sections previously named "Hero" appear as *Sección Principal* or *Banner de Inicio* without technical jargon

#### Scenario: Creating or editing content with a slug field
- **WHEN** creating or editing a Car, Blog Post, or Service
- **THEN** the slug field is labeled *Identificador URL* (or *Enlace permanente*) with descriptive helper guidance
