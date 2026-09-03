## MODIFIED Requirements

### Requirement: Showroom Key Metric Overview Cards
The Filament Admin Dashboard SHALL render a `StatsOverviewWidget` displaying key dealership showcase metrics including total showroom cars, total inventory valuation, buyer inquiries, and average vehicle listing price, fully translated to Spanish and formatted with the active currency symbol (Pesos).

#### Scenario: Showroom inventory and valuation calculation
- **WHEN** an administrator visits the dashboard at `/admin`
- **THEN** the stats widget displays the count of total cars (with featured count), the formatted aggregate value of all listed vehicles (using `$`, without hardcoded US$), and the average price per vehicle in Spanish

#### Scenario: Buyer inquiries lead count
- **WHEN** customer leads/inquiries exist in the system
- **THEN** the stats widget displays the total number of inquiries and highlights pending/new inquiries in Spanish

### Requirement: Buyer Inquiries Trend Chart
The Filament Admin Dashboard SHALL display an `InquiriesTrendChartWidget` showing monthly buyer inquiry counts across recent months with localized Spanish titles and dataset labels.

#### Scenario: Visualizing inquiry volume
- **WHEN** an administrator views the dashboard
- **THEN** the inquiry trend chart renders a monthly line/bar chart displaying *Consultas de Compradores (Últimos 6 Meses)* and *Consultas Recibidas*

### Requirement: Showroom Inventory Category Distribution Chart
The Filament Admin Dashboard SHALL display a `CarsByCategoryChartWidget` showing a breakdown of vehicles grouped by their car type / body style with localized Spanish headings.

#### Scenario: Visualizing car type distribution
- **WHEN** vehicles are associated with car types (e.g. SUV, Sedan, Coupe)
- **THEN** the chart renders a doughnut chart displaying the proportion of showroom inventory across each body type under the heading *Inventario por Tipo de Carrocería*

### Requirement: Latest Buyer Inquiries Action Table
The Filament Admin Dashboard SHALL display a `LatestInquiriesTableWidget` showing the 5 most recent customer inquiries with localized Spanish column headers and status badges.

#### Scenario: Reviewing latest buyer leads
- **WHEN** an administrator views the dashboard
- **THEN** a table renders the latest buyer inquiries with customer name, vehicle name, contact details, submission date, and status badges in Spanish
