## 1. Navigation Consolidation

- [x] 1.1 Unregister `SettingResource` from sidebar navigation by adding `protected static bool $shouldRegisterNavigation = false;` in `app/Filament/Resources/SettingResource.php` and verify it no longer appears in the navigation menu.
- [x] 1.2 Verify `ManageSettings` remains the sole, full-featured administrative entry point under Settings.

## 2. Testing and Validation

- [x] 2.1 Add automated test in `tests/Feature/AdminThemeBrandingTest.php` asserting that `SettingResource` is excluded from navigation while `ManageSettings` mounts successfully.
- [x] 2.2 Run the entire application test suite with `php artisan test` and verify all tests pass without regressions.
