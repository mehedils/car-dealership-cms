## 1. UI Updates

- [x] 1.1 Update `BrandResource.php` form to use `FileUpload::make('logo')->image()->directory('brands')`.
- [x] 1.2 Update `BrandResource.php` table to use `ImageColumn::make('logo')`.

## 2. Server Configuration

- [x] 2.1 Run `php artisan storage:link` to ensure uploaded files in the public disk are accessible via the web.
