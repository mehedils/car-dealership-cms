## 1. CSS Background SVG Icon Migration in main.css

- [x] 1.1 Migrate form input background SVGs (`.username-icon`, `.email-icon`, `.phone-icon`, `.pass-icon`) in `public/assets/css/main.css` to CSS `mask-image` rules with `--bs-neutral-500` / `--bs-primary` fill
- [x] 1.2 Migrate custom checkbox `.cb-container input:checked ~ .checkmark` checkmark SVG rules in `public/assets/css/main.css` to UIcons font pseudo-element `::after` (`\f143`)
- [x] 1.3 Migrate badge icons (`.card-rating .rating`, `.card-badge`, `.card-facitlities`) in `public/assets/css/main.css` to UIcons / CSS `mask-image`

## 2. Blade Views Cleanup & Verification

- [x] 2.1 Update remaining Blade view background icon container elements to UIcons `<i class="fi fi-rr-*"></i>`
- [x] 2.2 Re-cache Blade views (`php artisan view:cache`) and test site-wide color responsiveness
