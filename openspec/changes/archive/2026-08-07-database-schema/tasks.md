## 1. Inventory Taxonomies

- [x] 1.1 Create `Brand` model and migration (`name`, `slug`, `logo`)
- [x] 1.2 Create `CarType` model and migration (`name`, `slug`, `image`)
- [x] 1.3 Create `FuelType` model and migration (`name`, `slug`)
- [x] 1.4 Create `Location` model and migration (`name`, `address`)
- [x] 1.5 Create `Amenity` model and migration (`name`, `icon`)

## 2. Core Car Model & Pivot

- [x] 2.1 Create `Car` model and migration (fk relationships, core specs, boolean flags, price, and `included_in_price` text field)
- [x] 2.2 Create `amenity_car` pivot migration (with cascade deletes)
- [x] 2.3 Implement Eloquent relationships on `Car` model (`belongsTo` for taxonomies, `belongsToMany` for `Amenity`, implement `HasMedia` interface)

## 3. Customer Interactions

- [x] 3.1 Create `Inquiry` model and migration (`car_id`, `name`, `email`, `phone`, `message`, `status`)
- [x] 3.2 Create `Review` model and migration (`car_id`, `user_name`, `user_email`, `rating`, `comment`, `is_approved`)
- [x] 3.3 Add `reviews` and `inquiries` relationships to `Car` model

## 4. Template Content Models

- [x] 4.1 Create `Service` model and migration (`title`, `slug`, `description`, `icon`, `image`, `is_active`)
- [x] 4.2 Create `WhyUsFeature` model and migration (`title`, `description`, `icon`, `sort_order`)
- [x] 4.3 Create `Testimonial` model and migration (`author_name`, `author_role`, `author_avatar`, `content`, `rating`)
- [x] 4.4 Create `BlogPost` model and migration (`title`, `slug`, `excerpt`, `content`, `image`, `author_name`, `published_at`)
- [x] 4.5 Create `Faq` model and migration (`question`, `answer`, `sort_order`)
- [x] 4.6 Create `TeamMember` model and migration (`name`, `role`, `title`, `email`, `phone`, `photo_path`, `bio`)

## 5. Settings & Verification

- [x] 5.1 Create `Setting` model and migration (`key` unique, `value` text)
- [x] 5.2 Run `php artisan migrate` to execute all created migrations and verify no schema errors exist
