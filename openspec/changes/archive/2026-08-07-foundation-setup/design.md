## Context

Setting up the core foundational packages required for turning the static template into a dynamic application.

## Goals / Non-Goals

**Goals:**
- Install Filament V3 and Spatie Media Library without dependency conflicts.
- Initialize the Filament Admin panel provider.
- Publish and run necessary foundation database migrations.
- Verify everything works with baseline testing commands.

**Non-Goals:**
- Creating custom models, Filament resources, or refactoring Blade frontend views (which will be done in subsequent specs).

## Decisions

### Package Selection
- **Filament V3**: Standard Laravel admin panel solution.
- **Spatie Media Library**: Industry standard for file and image management.
