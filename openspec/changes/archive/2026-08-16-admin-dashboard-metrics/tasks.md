## 1. Implement Dealership Showcase Widgets

- [x] 1.1 Create `DealershipStatsOverview` widget in `app/Filament/Widgets/DealershipStatsOverview.php` with showroom inventory, valuation, buyer inquiries, and average price cards
- [x] 1.2 Create `InquiriesTrendChart` widget in `app/Filament/Widgets/InquiriesTrendChart.php` tracking monthly inquiry volume
- [x] 1.3 Create `CarsByCategoryChart` widget in `app/Filament/Widgets/CarsByCategoryChart.php` displaying vehicle body type distribution
- [x] 1.4 Create `LatestInquiriesTableWidget` in `app/Filament/Widgets/LatestInquiriesTableWidget.php` displaying the 5 most recent buyer leads

## 2. Dashboard Integration & Verification

- [x] 2.1 Update `AdminPanelProvider.php` to clean up generic placeholder widgets and configure dashboard widget layout
- [x] 2.2 Add automated feature tests in `tests/Feature/AdminDashboardMetricsTest.php` to verify widget queries, aggregations, and dashboard rendering
- [x] 2.3 Run full test suite and verify PHP syntax across all widgets
