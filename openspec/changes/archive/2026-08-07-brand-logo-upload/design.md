## Context

The `Brand` resource currently uses a `TextInput` for the `logo` field. This expects users to manually enter a string representing the file path, which is not user-friendly. Since the underlying database column is a `string` (which is standard for storing image paths in Laravel), we simply need to update the UI component to handle file uploads natively.

## Goals / Non-Goals

**Goals:**
- Replace the `TextInput` in `BrandResource` with Filament's native `FileUpload` component.
- Store uploaded images in the `brands` directory.
- Display the uploaded logo as an image in the `BrandResource` table.

**Non-Goals:**
- Migrating the database schema (the `string` column is already correct).
- Using Spatie Media Library for this specific field (the native string-based `FileUpload` is sufficient and matches the existing schema).

## Decisions

- **File Storage:** We will use Filament's native `FileUpload` component configured with `->image()` and `->directory('brands')`. This leverages Laravel's default `public` disk storage natively.

## Risks / Trade-offs

- **[Storage Configuration]** → The `storage:link` command must be run on the server for the public disk to be accessible via URL. This is standard Laravel behavior.
