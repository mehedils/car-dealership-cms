## Context

In the current application, models with icons (`Amenity`, `Service`, `WhyUsFeature`) store an icon identifier string in their `icon` column. In the Filament admin, `\Guava\FilamentIconPicker\Forms\IconPicker::make('icon')` is used, which queries `BladeUI\Icons\Factory`. Since only `blade-heroicons` is installed, only ~290 generic UI icons appear. Furthermore, when an icon does not exist in any library, administrators cannot upload a custom image. On the public frontend, icons are rendered inconsistently (partly Flaticon font classes, partly ad-hoc string checks).

## Goals / Non-Goals

**Goals:**
- Provide an expanded library of 5,500+ vector icons by installing `ryangjchandler/blade-tabler-icons`, giving administrators access to comprehensive automotive, transport, and equipment icons.
- Add dual-source selection in Filament admin (`AmenityResource`, `ServiceResource`, `WhyUsFeatureResource`): pick from library or upload a custom SVG/PNG.
- Implement a reusable `<x-app-icon :icon="$icon" />` Blade component that automatically handles uploaded image paths, Blade vector components, and font classes.
- Ensure 100% backward compatibility with existing database records.

**Non-Goals:**
- Modifying static vehicle specification icons on car cards (e.g. mileage, fuel, transmission), which already function efficiently as theme font icons.
- Changing database schema types (the `icon` string column cleanly stores either an icon key like `tabler-steering-wheel` or an uploaded file path like `icons/sunroof.svg`).

## Decisions

### Decision 1: Use `ryangjchandler/blade-tabler-icons` for the Vector Library
- **Rationale**: Tabler Icons is MIT-licensed, modern, and has 5,500+ icons with dedicated automotive, transport, and tools categories (`tabler-car`, `tabler-car-turbine`, `tabler-steering-wheel`, `tabler-gas-station`, `tabler-engine`, `tabler-air-conditioning`, `tabler-gauge`, `tabler-dashboard`, `tabler-armchair`, `tabler-wrench`, `tabler-shield-check`, etc.). It integrates directly into `Guava\FilamentIconPicker` via `BladeUI\Icons\Factory`.
- **Alternatives considered**:
  - *FontAwesome*: Heavier package, requires solid/regular set disambiguation.
  - *Lucide Icons*: Excellent modern style but fewer specialized automotive concepts than Tabler.

### Decision 2: Dual-Input Form UI (Toggle / Radio Switcher)
- **Rationale**: In `AmenityResource`, `ServiceResource`, and `WhyUsFeatureResource`, use a radio button or toggle to switch between:
  1. `Pick from Library`: Displays `IconPicker::make('icon_library')->sets(['tabler-icons', 'heroicons'])->searchable()`
  2. `Upload Custom Icon`: Displays `FileUpload::make('icon_upload')->image()->directory('icons')->preserveFilenames()`
- On save, the form mutator assigns the chosen value to the model's `icon` attribute.
- **Alternatives considered**:
  - *Two side-by-side optional fields without a toggle*: Confuses administrators as to which field takes priority when both are filled.

### Decision 3: Reusable `<x-app-icon>` Blade Component
- **Rationale**: Centralizes all frontend icon rendering logic in one place:
  ```blade
  @props(['icon', 'class' => '', 'alt' => ''])

  @if(empty($icon))
      {{-- No icon rendered --}}
  @elseif(str_starts_with($icon, 'icons/') || str_contains($icon, '/') || str_ends_with($icon, '.svg') || str_ends_with($icon, '.png') || str_ends_with($icon, '.webp'))
      <img src="{{ asset('storage/' . $icon) }}" alt="{{ $alt }}" class="{{ $class }}" style="object-fit: contain;">
  @elseif(str_starts_with($icon, 'fi ') || str_starts_with($icon, 'fi-'))
      <i class="{{ $icon }} {{ $class }}"></i>
  @else
      <x-dynamic-component :component="$icon" class="{{ $class }}" />
  @endif
  ```
- **Alternatives considered**:
  - *Ad-hoc `@if` checks across every blade file*: Duplicates logic in `why-us.blade.php`, `services.blade.php`, and `cars-details.blade.php` and causes maintenance drift.

## Risks / Trade-offs

- **[Risk]** Blade icon packs might add asset bundle overhead.
  - **Mitigation**: Blade Icons renders SVGs server-side via PHP on demand. It adds 0 KB to compiled CSS/JS bundles.
- **[Risk]** Uploaded custom icons might have inconsistent sizing or colors.
  - **Mitigation**: The `<x-app-icon>` component enforces consistent container dimensions (e.g. `w-6 h-6` or custom CSS classes) so layout grids remain perfectly aligned.
- **[Risk]** Existing records with `fi fi-rr-*` or `heroicon-*` might break.
  - **Mitigation**: The smart `<x-app-icon>` component specifically detects and supports legacy font classes and existing Heroicons values.
