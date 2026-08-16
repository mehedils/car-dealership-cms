## Context

The Carento application functions as a digital showcase for a car dealership. The admin dashboard is currently showing generic Filament default widgets (`AccountWidget` and `FilamentInfoWidget`). We need to implement custom widgets tailored to dealership showroom inventory, valuation, category distribution, and prospective buyer lead management.

## Goals / Non-Goals

**Goals:**
- Provide four cohesive Filament dashboard widgets:
  1. `DealershipStatsOverview`: Showroom vehicle count, total valuation, inquiries count, average listing price.
  2. `InquiriesTrendChart`: Monthly buyer inquiry volume trend.
  3. `CarsByCategoryChart`: Showroom vehicle distribution by body type (doughnut chart).
  4. `LatestInquiriesTableWidget`: Recent prospective buyer inquiries table.
- Remove generic documentation placeholder widgets (`FilamentInfoWidget`).
- Ensure all queries are optimized and handle empty database states gracefully.

**Non-Goals:**
- Overhauling full car inquiry CRUD resources (handled in existing `InquiryResource`).
- Adding external CRM integrations.

## Decisions

### 1. Widget Structure & Layout Hierarchy
- **Decision**: Organize widgets using Filament 3's grid ordering:
  - Top (Sort 1, Column Span Full): `DealershipStatsOverview` (4 KPI cards).
  - Middle (Sort 2 & 3, Column Span 1/2 each on desktop): `InquiriesTrendChart` and `CarsByCategoryChart`.
  - Bottom (Sort 4, Column Span Full): `LatestInquiriesTableWidget`.
- **Rationale**: Gives dealership managers an instant pyramid of information: high-level numbers -> trend & distribution visual charts -> actionable buyer leads table.

### 2. Dealership Valuation Calculation & Formatting
- **Decision**: Dynamically format total showroom inventory valuation (e.g. `$1,450,000` / `$1.45M`) and average listing price using the site's `currency_symbol` setting.
- **Rationale**: Reflects accurate business value for a car dealership showcase rather than rental billing metrics.

### 3. Chart Data Grouping
- **Decision**: 
  - Inquiries chart groups by month for the current calendar year.
  - Category chart queries `CarType::withCount('cars')` with vibrant multi-color doughnut slices.
- **Rationale**: Native Filament Chart.js integration provides responsive animations and dark mode theme compatibility automatically.

## Risks / Trade-offs

- **[Risk] Performance on large inventory/lead datasets** → **Mitigation**: Use SQL aggregations (`count()`, `sum()`, `avg()`) and limited queries (`take(5)`) to keep dashboard load times under 50ms.
- **[Risk] Empty Database on Fresh Install** → **Mitigation**: Default null/empty fallbacks (0 counts, empty chart arrays) ensure widgets render cleanly even before seeding.
