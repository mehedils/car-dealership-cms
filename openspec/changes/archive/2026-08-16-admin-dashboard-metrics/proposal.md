## Why

Currently, the Filament admin dashboard displays only default placeholder widgets (`AccountWidget` and `FilamentInfoWidget`), without providing any operational insights or dealership metrics. Transforming the dashboard into a tailored dealership showcase command center allows managers to monitor showroom inventory, total portfolio valuation, prospective buyer inquiries, and category distribution at a single glance.

## What Changes

- **Dealership Stats Overview Widget**: Introduces a multi-card KPI widget showing:
  - Total Showroom Vehicles (with featured vehicle subtext)
  - Total Inventory Valuation (sum of listed vehicle prices formatted with the site currency symbol)
  - Buyer Inquiries / Leads (total inquiries + new/unread indicator)
  - Average Vehicle Listing Price
- **Buyer Inquiries Trend Chart Widget**: Visualizes monthly prospective buyer inquiries over time using a line/bar chart.
- **Showroom Inventory Distribution Chart Widget**: Visualizes the breakdown of showroom inventory by car body type (*SUVs, Sedans, Coupes, Trucks, etc.*) using a doughnut chart.
- **Latest Buyer Inquiries Table Widget**: Displays the 5 most recent customer inquiries with buyer contact details, inquired vehicle, date, and status.
- **Admin Dashboard Cleanup**: Unregisters the generic `FilamentInfoWidget` to keep the dashboard focused and clean.

## Capabilities

### New Capabilities
- `admin-dashboard-metrics`: Interactive dashboard widgets providing dealership showcase KPIs, visual inquiry trends, vehicle distribution analytics, and latest buyer leads.

### Modified Capabilities
<!-- None -->

## Impact

- **Affected Code**: `app/Filament/Widgets/*`, `app/Providers/Filament/AdminPanelProvider.php`
- **Models / Dependencies**: `App\Models\Car`, `App\Models\Inquiry`, `App\Models\CarType`, `App\Models\Setting`
- **UI / Experience**: Administrative Dashboard at `/admin`
