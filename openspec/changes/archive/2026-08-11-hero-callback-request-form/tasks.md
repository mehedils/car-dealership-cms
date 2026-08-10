## 1. Controller & Data Preparation

- [x] 1.1 Update `HomeController` to query active vehicles and pass `$cars` data to the `home` view
- [x] 1.2 Verify `InquiryController` endpoint handling for hero form submission

## 2. Hero Search Partial Transformation

- [x] 2.1 Update `resources/views/sections/search.blade.php` to render a horizontal layout with fields: Vehicle Model Dropdown, Name, Phone/WhatsApp, and Submit Button
- [x] 2.2 Add sticky live search filter input inside the Bootstrap dropdown menu in `sections/search.blade.php`
- [x] 2.3 Implement Vanilla JS client-side filtering logic for typing inside the car dropdown search input

## 3. Verification & Testing

- [x] 3.1 Test typing into the dropdown search box to verify instant filtering of vehicle options
- [x] 3.2 Submit test callback requests and verify records created in the `inquiries` database table
