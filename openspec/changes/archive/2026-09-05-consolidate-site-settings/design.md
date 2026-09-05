## Context

See `proposal.md` for motivation. The admin panel currently registers two navigation entries under the "Settings" group:
- `ManageSettings` (Filament Page): A tabbed configuration dashboard containing custom UI inputs (image uploaders, color pickers, repeaters) for all 31 database setting keys.
- `SettingResource` (Filament Resource): A raw key-value table interface with create and delete disabled, but exposing raw string/JSON editing.

## Goals / Non-Goals

**Goals:**
- Eliminate the redundant `SettingResource` from the sidebar navigation menu.
- Ensure `ManageSettings` is the sole, authoritative settings interface in the admin panel.
- Maintain full test coverage and clean UI navigation without breaking underlying settings persistence.

**Non-Goals:**
- Modifying the underlying `settings` database schema or existing key definitions.
- Changing front-end `setting()` helper behavior.

## Decisions

### Decision 1: Unregister `SettingResource` from Navigation via `$shouldRegisterNavigation`
- **Choice**: Add `protected static bool $shouldRegisterNavigation = false;` in `App\Filament\Resources\SettingResource`.
- **Rationale**: This cleanly removes the item from the sidebar navigation menu without unnecessarily destroying the underlying Filament resource class. It avoids breaking direct references while achieving the exact desired user-facing outcome: only one unified Settings item appears in the sidebar.
- **Alternative Considered**: Completely deleting `SettingResource.php` and its directory. While possible, unregistering navigation is standard Filament practice and keeps code changes minimal and safe.

### Decision 2: Streamline Navigation Label and Group
- **Choice**: Keep `ManageSettings` in the `Settings` navigation group (or as a primary navigation item) labeled `Site Settings` (or `Settings`), ensuring clear discoverability.

## Risks / Trade-offs

- **[Risk]**: Tests asserting navigation links might expect two items in the Settings group.
  - **Mitigation**: Update test assertions to verify that only `Site Settings` appears in navigation, and that accessing `ManageSettings` provides complete configuration coverage.
