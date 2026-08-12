## Context

The Filament v3 admin panel features 15 Resource files and 2 Page files. Currently, item labels vary significantly in character length and lack explicit `$navigationSort` properties, causing alphabetical sorting within group lists.

## Goals / Non-Goals

**Goals:**
- Reorganize all sidebar navigation groups into 4 clear categories: `Inventory`, `Leads`, `Content`, `Settings`.
- Assign concise 1-2 word names for all model labels and page labels (e.g. *Categories*, *Fuels*, *Features*, *Leads*, *Highlights*).
- Define explicit `$navigationSort` on every resource and page to guarantee top-to-bottom logical ordering.
- Provide matching dictionary keys in `lang/es.json` for 100% Spanish translation parity.

**Non-Goals:**
- Modifying resource form schemas, database migrations, or Blade frontend layouts.

## Decisions

1. **Navigation Group Ordering in `AdminPanelProvider.php`**:
   - Explicitly define `$panel->navigationGroups()` in the order: `Inventory`, `Leads`, `Content`, `Settings`.

2. **Short 1-2 Word Labels**:
   - `CarTypeResource` → `Categories` (*Tipos*)
   - `FuelTypeResource` → `Fuels` (*Combustibles*)
   - `AmenityResource` → `Features` (*Comodidades*)
   - `InquiryResource` → `Leads` (*Consultas*) in group `Leads`
   - `ReviewResource` → `Reviews` (*Reseñas*) in group `Leads`
   - `BlogPostResource` → `Blog` (*Blog*)
   - `FaqResource` → `FAQs` (*Preguntas*)
   - `TeamMemberResource` → `Team` (*Equipo*)
   - `WhyUsFeatureResource` → `Highlights` (*Beneficios*)
   - `ManageHomepageSettings` → `Home Editor` (*Inicio*)
   - `ManageSettings` → `Site Settings` (*Ajustes*)

3. **Explicit Navigation Item Sort Ranks**:
   - **Inventory Group**:
     - Cars: 1
     - Brands: 2
     - Categories: 3
     - Fuels: 4
     - Features: 5
     - Locations: 6
   - **Leads Group**:
     - Leads: 1
     - Reviews: 2
   - **Content Group**:
     - Home Editor: 1
     - Services: 2
     - Blog: 3
     - FAQs: 4
     - Testimonials: 5
     - Team: 6
     - Highlights: 7
   - **Settings Group**:
     - Site Settings: 1

## Risks / Trade-offs

- [Risk] User might expect full resource names (e.g. "Car Types" instead of "Categories").
  - *Mitigation*: Short names remain crystal clear in context of their group headers.
