## Why

The Filament administrative panel currently displays two separate navigation entries under the "Settings" group: "Site Settings" (`ManageSettings` page) and "Settings" (`SettingResource`). All 31 configuration keys in the database are already comprehensively managed with dedicated visual components (file uploaders with previews, color pickers, and repeaters) inside "Site Settings". The legacy `SettingResource` exposes a redundant, raw key-value table that requires typing raw JSON strings and file paths, confusing administrators and risking configuration corruption.

## What Changes

- Remove redundant `SettingResource` from the Filament sidebar navigation (or remove the resource) so only the unified, full-featured `ManageSettings` page appears.
- Ensure the settings navigation item is clearly labeled and positioned as the single source of truth for application configuration.
- Update automated tests to assert the consolidated settings interface without failing on `SettingResource` navigation dependencies.

## Capabilities

### Modified Capabilities
- `static-settings-management`: Update the settings management interface specification to establish `ManageSettings` as the single, exclusive administrative UI for site configuration, removing redundant raw key-value resource views from navigation.

## Impact

- **Filament Admin Navigation**: The redundant "Settings" CRUD resource item is removed from the sidebar navigation, leaving the clean, tabbed "Site Settings" dashboard.
- **Affected Code**: `app/Filament/Resources/SettingResource.php`, `tests/Feature/AdminThemeBrandingTest.php`.
- **User Experience**: Eliminates confusion and prevents accidental corruption of JSON and asset path settings by non-technical administrators.
