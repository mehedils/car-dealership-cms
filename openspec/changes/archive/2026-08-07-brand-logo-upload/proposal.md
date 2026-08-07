## Why

Currently, the `Brand` resource in the Filament Admin Panel treats the `logo` field as a standard text input. To allow dealership owners to easily upload brand logo images natively from their computer, we must convert this field into a file upload component.

## What Changes

- Update the `BrandResource` form to use `FileUpload::make('logo')` instead of `TextInput::make('logo')`.
- Update the `BrandResource` table to display the image using `ImageColumn::make('logo')` instead of `TextColumn::make('logo')`.

## Capabilities

### New Capabilities
<!-- None -->

### Modified Capabilities
- `admin-panel`: Brand logo will be uploaded as an image rather than entered as text.

## Impact

- Modifies `app/Filament/Resources/BrandResource.php`.
- Uploaded logos will be saved to the `brands` directory within the storage disk.
