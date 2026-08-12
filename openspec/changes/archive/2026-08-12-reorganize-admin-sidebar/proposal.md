## Why

The current Filament admin panel sidebar has inconsistent label lengths (varying from 4 characters up to 36 characters), creating awkward text wrapping and cut-off labels. Additionally, critical resources like Customer Inquiries are hidden under generic groups while items inside groups lack logical sorting order. Reorganizing the sidebar with concise, 1-2 word uniform labels (e.g. *Categories*, *Fuels*, *Features*, *Leads*, *Highlights*) improves navigation speed, UI symmetry, and scannability for dealership administrators.

## What Changes

- Reorganize resources and pages into 4 clean, logical navigation groups: **Inventory**, **Leads**, **Content**, and **Settings**.
- Update navigation group names and model labels to uniform, concise 1-2 word names in both English and Spanish dictionaries.
- Promote `Inquiries` to a dedicated, high-priority **Leads** navigation group.
- Assign explicit `$navigationSort` values across all 15 Filament resources and 2 Filament pages to ensure logical hierarchy (e.g. *Cars* as #1 in Inventory).
- Clean up redundant filler words (*Types*, *Members*, *Features*, *Settings*) from sidebar menu items.

## Capabilities

### New Capabilities
- `admin-sidebar-organization`: Standardizes Filament admin navigation group hierarchy, uniform label lengths, explicit sorting, and multi-language dictionary keys.

### Modified Capabilities
*(None)*

## Impact

- **Affected Code**: `app/Filament/Resources/*.php` (15 resources), `app/Filament/Pages/*.php` (2 pages), `app/Providers/Filament/AdminPanelProvider.php`, and `lang/es.json`.
- **User Impact**: Vastly improved sidebar aesthetics, zero line wrapping, and faster navigation for admin users.
