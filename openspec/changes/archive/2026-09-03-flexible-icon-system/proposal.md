## Why

The current icon system in the Filament admin relies on `\Guava\FilamentIconPicker`, which only exposes the default Heroicons set (~290 generic UI icons). Heroicons lacks domain-specific automotive, mechanical, and commercial icons needed for car amenities (e.g. steering wheel, heated seats, sunroof, air conditioning, GPS), dealership services (e.g. oil change, wheel alignment, ceramic coating), and company highlights. Furthermore, when an icon is not available in any library, administrators currently have no recourse. 

To solve this completely, the CMS requires a dual-option icon system: administrators can either search and pick an icon from an expanded vector library (e.g., Tabler Icons with 5,500+ icons including dedicated automotive and transport sets) or directly upload their own custom SVG/PNG icon file.

## What Changes

- **Expanded Icon Library**: Install `ryangjchandler/blade-tabler-icons` to integrate 5,500+ vector icons into the existing `Guava\FilamentIconPicker`, giving administrators access to automotive, mechanical, and commercial symbols.
- **Dual-Source Admin UI**: Update `AmenityResource`, `ServiceResource`, and `WhyUsFeatureResource` forms to provide two selectable icon input methods:
  - **Option 1: Select from Library** (searchable visual picker for Tabler & Heroicons).
  - **Option 2: Upload Custom Icon** (drag-and-drop file upload for custom SVG, PNG, or WebP graphics).
- **Smart Frontend Icon Component / Helper**: Introduce a unified Blade icon renderer that seamlessly renders:
  - Custom uploaded images (`<img>` with responsive dimensions).
  - Blade vector icons (`<x-dynamic-component :component="$icon" />`).
  - Legacy Flaticon CSS classes (`<i class="fi fi-rr-..."></i>`).
- **Data Compatibility**: Maintain backward compatibility with existing seeded icons (`fi fi-rr-*`, `heroicon-*`) while storing uploaded file paths cleanly in storage.

## Capabilities

### New Capabilities
- `flexible-icon-system`: Dual-source icon selection in Filament admin (library picker + custom file upload) and unified smart rendering across public frontend views.

### Modified Capabilities
- `icon-theme-customization`: Extend icon rendering standards to support uploaded SVG/PNG image assets alongside font classes and Blade dynamic vector components.

## Impact

- **Composer Dependencies**: Adds `ryangjchandler/blade-tabler-icons` (`^2.0`).
- **Filament Resources**: Updates `AmenityResource`, `ServiceResource`, and `WhyUsFeatureResource` forms and tables.
- **Frontend Views**: Updates `resources/views/sections/why-us.blade.php`, `resources/views/cars-details.blade.php`, `resources/views/sections/services.blade.php`, and `resources/views/services.blade.php`.
- **Database**: Reuses existing `icon` column or pairs it with clean file storage handling without breaking existing data.
