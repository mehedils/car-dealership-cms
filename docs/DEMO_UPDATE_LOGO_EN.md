# Update Guide: Dealership Logo & Brand Identity

This guide demonstrates how to manage and update the dealership's official logos and browser favicon from the administrative control panel.

---

## 1. Where It Is Displayed on the Website (Frontend)

The dealership logo is used in three strategic locations:
1. **Top Header**: In the main navigation bar visible across all pages.
2. **Footer**: High-contrast white version displayed over dark background.
3. **Browser Tab (Favicon)**: Square icon that identifies the site in browser tabs and bookmarks.

![Official Logo in Header](screenshots/frontend-header-logo.png)

---

## 2. Where It Is Updated in the Admin Panel

* **Navigation Path**:
  - In English: **Settings** ➔ **Site Settings** ➔ Tab **"Logo & Branding"**
  - In Spanish: **Configuración** ➔ **Ajustes del Sitio** ➔ Pestaña **"Logo e Identidad"**
* **Direct URLs**:
  - Local Dev: `http://127.0.0.1:8000/admin/manage-settings`
  - Production: `https://project11.client.winrysoft.com/admin/manage-settings`

![Logo Configuration Panel in Filament](screenshots/admin-site-settings-branding.png)

---

## 3. Technical Specifications & Field Key Reference

| Admin Field | DB Key | Recommended Format | Optimal Dimensions | Website Location |
| :--- | :--- | :--- | :--- | :--- |
| **Dark Logo (For Light Backgrounds)** | `site_logo_dark` | PNG or SVG with transparent background | **200 × 50 px** (~4:1 Ratio) | Main sticky header |
| **White / Light Logo (For Dark Backgrounds)** | `site_logo_light` | White PNG or SVG with transparent background | **200 × 50 px** (~4:1 Ratio) | Footer and dark navigation overlays |
| **Favicon Icon** | `site_favicon` | PNG, ICO, or SVG | **32 × 32 px** or **64 × 64 px** (1:1 Ratio) | Browser tabs and mobile bookmarks |

---

## 4. Step-by-Step Instructions to Change the Logo

1. Log in to the administrative panel (`/admin`).
2. In the left sidebar navigation, click on **Site Settings** (under the *Settings* group).
3. Ensure you are on the first tab: **Logo & Branding**.
4. If an existing logo is already uploaded, click the **×** button on the preview thumbnail to remove it.
5. Drag and drop your new logo file into the upload box, or click to browse from your computer.
6. Scroll down and click the green **Save Changes** button.
7. Refresh the public website page (`Ctrl + F5`) to see the updated logo applied immediately.

---

## 5. Audit Findings: Strengths & Limitations

### Strengths (Positives)
* **Real-time Synchronization**: Updating the logo instantly refreshes both the public customer-facing frontend and the Filament Admin Panel sidebar branding.
* **Robust File Persistence**: Uploaded assets are safely saved to the public storage disk (`storage/settings/`) and cleanly mapped in the `settings` database table.
* **Instant In-Panel Preview**: The Filament file uploader renders an interactive preview before and after saving.

### Limitations / Technical Constraints (Shortcomings)
* **CSS Fixed Height Constraint**:
  - The header and footer enforce a fixed CSS height restriction (`max-height: 40px` or `48px`).
  - **Impact**: If a square (e.g., 500×500 px) or tall vertical logo is uploaded, the browser scales it down to 40px height, making it appear tiny. A horizontal landscape logo with an approximate 4:1 aspect ratio should always be used.
* **SEO Alt Attribute Fallback**:
  - The `alt=""` attribute on `<img>` tags defaults to the `site_name` setting (e.g., "BYD Grupo Del Rincón"). There is currently no dedicated field for custom SEO image alt text.
* **Default Template Fallbacks**:
  - If the logo fields are emptied or deleted, the Blade templates automatically fall back to the default vendor SVG assets (`assets/imgs/template/logo-d.svg`).
