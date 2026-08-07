## Context

The CMS includes multiple models (`Amenity`, `Service`, `WhyUsFeature`) that require an icon. Currently, these are implemented as simple `TextInput` fields, which requires users to manually input exact icon identifier strings. This provides poor user experience.

## Goals / Non-Goals

**Goals:**
- Replace the `TextInput` for icons with a visual, searchable icon picker.
- Use the `guava/filament-icon-picker` package.

**Non-Goals:**
- Custom icon set integration (we will use the default Heroicons provided by the picker).

## Decisions

- **Package Choice:** Use `guava/filament-icon-picker` as it natively integrates into Filament forms and provides excellent search and preview functionality for Heroicons out of the box.

## Risks / Trade-offs

- **[Dependency Overhead]** → Adds a third-party dependency. Mitigation: This package is widely used in the Filament ecosystem and is very lightweight.
