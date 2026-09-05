# Complete Website Administration Manual: Car Dealership CMS

Welcome to the comprehensive operating and administrative manual for the car dealership website. This guide provides detailed step-by-step instructions, actual screen captures, field keys, and technical specifications for managing every element of the website using the administrative control panel (Filament Admin).

---

## Table of Contents

1. [Access and General Navigation](#1-access-and-general-navigation)
2. [Brand Identity, Logos & Theme Colors](#2-brand-identity-logos--theme-colors)
3. [Top Header Bar & Rotating Announcements](#3-top-header-bar--rotating-announcements)
4. [Homepage Management (Home Editor)](#4-homepage-management-home-editor)
   - [Section Visibility Controls](#41-section-visibility-controls)
   - [Hero Banner Section](#42-hero-banner-section)
   - [Promotional CTA Banner with Video](#43-promotional-cta-banner-with-video)
   - [Section Titles & Headings](#44-section-titles--headings)
5. [Brand Showcase & Manufacturers](#5-brand-showcase--manufacturers)
6. [Vehicle Inventory (Cars Catalog)](#6-vehicle-inventory-cars-catalog)
   - [Catalog List & Filter System](#61-catalog-list--filter-system)
   - [Creating or Editing a Vehicle](#62-creating-or-editing-a-vehicle)
   - [Customizing the Public Inventory Page Banner](#63-customizing-the-public-inventory-page-banner)
7. [Why Choose Us / Value Proposition Features](#7-why-choose-us--value-proposition-features)
8. [Dealership Services](#8-dealership-services)
9. [Sales & Advisory Team ("About Us")](#9-sales--advisory-team-about-us)
10. [Contact Information & Footer Configuration](#10-contact-information--footer-configuration)
11. [Centralized Leads & Inquiries Inbox](#11-centralized-leads--inquiries-inbox)
12. [Best Practices for Content Editors](#12-best-practices-for-content-editors)

---

## 1. Access and General Navigation

### 1.1 Access URLs
* **Production Environment**: `https://project11.client.winrysoft.com/admin`
* **Local Development**: `http://127.0.0.1:8000/admin`
* **Default Administrative Credentials**:
  - **Email**: `admin@admin.com`
  - **Password**: *(Supplied by your system administrator)*

### 1.2 Administrative Sidebar Layout
The administrative panel organizes all management functions into three logical sidebar groups:
1. **Content**:
   - *Home Editor*: Toggle homepage sections, hero banners, and marketing text.
   - *Cars*: Complete inventory catalog of new, certified, and pre-owned vehicles.
   - *Brands*: Automotive manufacturer logos and brand links.
   - *Why Us Features*: Dealership advantages and guarantees.
   - *Services*: Aftersales, maintenance, and trade-in service offerings.
   - *Team Members*: Sales consultants and executive staff profiles.
   - *Blog Posts*: Dealership news, events, and automotive articles.
2. **Inquiries / Customers**:
   - *Inquiries*: Centralized inbox for callback requests, test drives, and quote forms.
3. **Settings**:
   - *Site Settings*: Brand assets, contact details, social media, colors, and footer copy.

---

## 2. Brand Identity, Logos & Theme Colors

Allows modifying the official brand logos, browser tab favicon, and primary theme colors across the site.

### Frontend View
* **Website**: Main dark logo on the top sticky header, and contrast light logo on the dark footer.

![Header with Dealership Logo](screenshots/01-frontend-header-topbar.png)

### Admin Location
* **Navigation Path**:
  - In English: **Settings** ➔ **Site Settings** ➔ Tab **"Logo & Branding"**
  - In Spanish: **Configuración** ➔ **Ajustes del Sitio** ➔ Pestaña **"Logo e Identidad"**
* **Direct URL**: `/admin/manage-settings`

![Logo Configuration in Admin Panel](screenshots/01-admin-settings-branding.png)

### Field Reference & Recommendations
| Field Name | Database Key | Recommended Format | Optimal Dimensions | Usage Location |
| :--- | :--- | :--- | :--- | :--- |
| **Dark Logo (For Light Backgrounds)** | `site_logo_dark` | Transparent PNG or SVG | **200 × 50 px** (~4:1 Ratio) | Sticky top navigation bar |
| **White / Light Logo (For Dark Backgrounds)** | `site_logo_light` | White transparent PNG or SVG | **200 × 50 px** (~4:1 Ratio) | Dark footer section |
| **Favicon Icon** | `site_favicon` | PNG, ICO, or SVG | **32 × 32 px** or **64 × 64 px** | Browser tabs and mobile bookmarks |

> [!TIP]
> Always upload horizontal landscape logos (approximately 4:1 aspect ratio). If a square or tall vertical logo is uploaded, the browser scales it down to the CSS cap of 40px height, making it appear illegibly small.

---

## 3. Top Header Bar & Rotating Announcements

The top bar displays direct communication channels and an automated dynamic ticker for marketing promotions, discount campaigns, and seasonal offers.

### Admin Location
* **Navigation Path**: **Settings** ➔ **Site Settings** ➔ Tabs **"Topbar Announcements"** and **"General"**.
* **Direct URL**: `/admin/manage-settings`

### Key Features
1. **Direct Phone & Email**:
   - Configured in the *General* or *Contact Info* tabs.
   - Updates the clickable `tel:` and `mailto:` links on the left side of the top bar.
2. **Rotating Promotional Announcements (Ticker)**:
   - In the *Topbar Announcements* tab, click **"Add to Announcements"** to create multiple promotional messages.
   - Each entry contains:
     - **Announcement Text**: E.g., *"More than 800+ certified vehicles ready for immediate delivery!"*.
     - **Button Text**: E.g., *"Explore Inventory"*.
     - **Button Link URL**: E.g., `/cars`.
   - When two or more messages exist, the ticker automatically rotates every 4 seconds with a smooth fade animation.

---

## 4. Homepage Management (Home Editor)

The **Home Editor** gives you total control over the homepage structure, promotional messaging, and layout without writing any code.

* **Navigation Path**: **Content** ➔ **Home Editor** (Spanish: *Contenido ➔ Home Editor*).
* **Direct URL**: `/admin/manage-homepage-settings`

![Home Editor in Filament](screenshots/02-admin-home-editor.png)

### 4.1 Section Visibility Controls
Under the **"Section Visibility"** tab, toggle individual switches to enable or disable any block on the homepage:
- [x] Hero Banner Section
- [x] Search / Callback Form
- [x] Brands Showcase Section
- [x] Featured Vehicles Carousel
- [x] CTA Promo Video Banner
- [x] Vehicle Categories by Type
- [x] Why Choose Us Section
- [x] Latest Arrivals Section
- [x] Services Section
- [x] Blog / News Section

### 4.2 Hero Banner Section
Controls the primary above-the-fold banner on the homepage.

![Frontend Hero Banner](screenshots/02-frontend-hero.png)

* **Tab**: **Hero Section**.
* **Fields**:
  - **Hero Background Image**: High-resolution image (Recommended: **1920 × 892 px** or **3838 × 1784 px** in JPG/WebP). A 60% dark overlay is automatically applied to guarantee text legibility.
  - **Hero Small Tagline**: Small pill badge text (e.g., *"Find Your Perfect Car"*).
  - **Hero Main Title**: Main heading supporting line breaks for bold emphasis.
  - **Bullet Points 1, 2, and 3**: The three green-checked value highlights displayed directly below the headline.

### 4.3 Promotional CTA Banner with Video
Strategic mid-page section encouraging visitors to sell or trade in their vehicles.
* **Tab**: **CTA Banner**.
* **Fields**:
  - **Badge Label**: E.g., *"Best Dealership Trade-In Value"*.
  - **Banner Heading**: Primary call-to-action title.
  - **Description Copy**: Informative paragraph detailing customer guarantees.
  - **Video Popup URL**: YouTube link (e.g., `https://www.youtube.com/watch?v=...`) that opens in a lightbox when visitors click the play button.
  - **Banner Media / Video Image**: High-definition showroom or vehicle graphic.
  - **Feature Bullet List (1 through 6)**: Value propositions arranged in two clean columns with check icons.

### 4.4 Section Titles & Headings
Use the **Featured Vehicles**, **Categories**, **Why Choose Us**, **Latest Arrivals**, **Services**, and **Blog & News** tabs to customize the titles and descriptive subtitles of each homepage section.

---

## 5. Brand Showcase & Manufacturers

Manages the infinite scrolling brand ticker on the homepage (BYD, Toyota, Honda, BMW, etc.).

### Frontend View
![Brand Showcase Ticker](screenshots/03-frontend-brands.png)

### Admin Location
* **Navigation Path**: **Content** ➔ **Brands** (Spanish: *Contenido ➔ Marcas*).
* **Direct URL**: `/admin/brands`

![Brands Management in Filament](screenshots/03-admin-brands.png)

### Creating or Updating a Brand
1. Click the **New Brand** button in the top right.
2. Fill in the fields:
   - **Name**: Manufacturer name (e.g., *BYD*, *Nissan*).
   - **Slug**: Generated automatically from the name.
   - **Logo**: Transparent SVG or PNG image (optimal size: **120 × 40 px** in monochrome or neutral tones).
   - **Is Active**: Toggle switch to publish or hide the brand from the frontend ticker.
3. Click **Create**. Clicking any brand logo in the frontend carousel automatically navigates visitors to the inventory page pre-filtered for that brand.

---

## 6. Vehicle Inventory (Cars Catalog)

This is the core module of the dealership platform. It handles the complete inventory lifecycle: vehicle listings, pricing, financing estimates, specs, galleries, and publishing flags.

### 6.1 Catalog List & Filter System
* **Navigation Path**: **Content** ➔ **Cars** (Spanish: *Contenido ➔ Autos*).
* **Direct URL**: `/admin/cars`

![Cars Management List](screenshots/04-admin-cars-list.png)

From the inventory table you can:
- Instantly view thumbnail photos, brand, model, price, year, and condition (New, Certified, Used).
- Toggle **Active** (*Is Active*) and **Featured** (*Is Featured*) with a single click.
- Search by vehicle name, model, or VIN, and sort by price, mileage, or creation date.

### 6.2 Creating or Editing a Vehicle
Click **New Car** or click the **Edit** action on an existing vehicle row.

![Vehicle Edit Form](screenshots/04-admin-car-edit.png)

#### Form Tabs:
1. **General Information**:
   - **Name**: E.g., *2025 BYD Seal AWD Performance*.
   - **Brand** & **Car Type**: Dropdowns linked to master tables.
   - **Condition**: *New*, *Certified Pre-Owned*, *Used*, or *Refurbished*.
   - **Price**: Total vehicle sales price in the configured currency.
   - **Estimated Monthly Payment**: Reference amount shown on the financing badge (e.g., *From \$4,999/month*).
   - **Year**, **Mileage**, **Transmission** (Automatic, Manual), and **Fuel Type** (Electric, Hybrid, Gasoline, Diesel).
2. **Media Gallery**:
   - **Primary Image**: Hero thumbnail in high resolution (recommended ratio: **16:9** or **4:3**, e.g., **1200 × 800 px**).
   - **Additional Photos Gallery**: Multi-file uploader for interior, dashboard, wheels, and engine photos. Supports drag-and-drop reordering.
3. **Technical Specs & Amenities**:
   - Engine displacement, horsepower (HP), seating capacity, doors, exterior and interior colors.
   - Amenity checkboxes (Apple CarPlay, Panoramic Sunroof, Heated Seats, Reverse Camera, Leather Interior, etc.).
4. **Publishing Options**:
   - **Is Active**: If unchecked, the vehicle is hidden from searches and inventory.
   - **Is Featured**: If checked, the vehicle appears in the homepage's Featured Vehicles slider.

### 6.3 Customizing the Public Inventory Page Banner
The dedicated inventory catalog page (`/cars`) includes its own customizable header banner.

![Public Cars Catalog](screenshots/04-frontend-inventory.png)

* **Admin Location**: **Settings** ➔ **Site Settings** ➔ Tab **"Inventory Page"**.
* **Fields**:
  - **Hero Background Banner Image**: Showroom or dealership lot photograph.
  - **Hero Badge Tag**: E.g., *"New & Certified Pre-Owned Vehicle Inventory"*.
  - **Hero Title**: E.g., *"Find Your Next Vehicle Today"*.
  - **Hero Subtitle Copy**: Reassuring copy highlighting warranties and financing options.

---

## 7. Why Choose Us / Value Proposition Features

A four-card section highlighting key dealership advantages (e.g., 150-point inspection, flexible financing, 24/7 roadside assistance, official manufacturer warranty).

### Frontend View
![Why Choose Us Section](screenshots/05-frontend-why-us.png)

### Admin Location
* **Navigation Path**: **Content** ➔ **Why Us Features** (Spanish: *Contenido ➔ Beneficios*).
* **Direct URL**: `/admin/why-us-features`

![Why Us Features in Admin](screenshots/05-admin-why-us.png)

### Field Details
- **Title**: Brief, punchy title (e.g., *150-Point Multi-Point Inspection*).
- **Description**: 2 to 3 lines clearly explaining the customer benefit.
- **Icon / Step Number**: Visual icon or step identifier (1, 2, 3, 4).
- **Sort Order**: Numerical sort value determining column order from left to right.

---

## 8. Dealership Services

Manages the catalog of dealership maintenance, trade-in, and protection packages displayed on `/services` and on the homepage.

### Frontend View
![Services Page](screenshots/06-frontend-services.png)

### Admin Location
* **Navigation Path**: **Content** ➔ **Services** (Spanish: *Contenido ➔ Servicios*).
* **Direct URL**: `/admin/services`

![Services Management in Filament](screenshots/06-admin-services.png)

### Field Details
- **Title**: Service package name (e.g., *Preventive Maintenance & Warranty*).
- **Description**: Detailed summary of work performed by certified mechanics.
- **Service Image**: Thumbnail photograph in 4:3 proportion (e.g., **800 × 600 px**).
- **Icon**: Graphical badge icon identifier.
- **Is Active**: Publishing toggle switch.

Each service card on the frontend features an **"Inquire About This Service"** button, which automatically triggers the lead modal and routes customer requests directly to the administrative inbox.

---

## 9. Sales & Advisory Team ("About Us")

Introduces sales executives, finance managers, and dealership leadership on the `/about` page.

### Frontend View
![About Us Page Team Section](screenshots/07-frontend-about.png)

### Admin Location
* **Navigation Path**: **Content** ➔ **Team Members** (Spanish: *Contenido ➔ Equipo*).
* **Direct URL**: `/admin/team-members`

![Team Members in Filament](screenshots/07-admin-team.png)

### Field Details
- **Full Name**: E.g., *Roberto Gómez*.
- **Role / Designation**: E.g., *Senior Sales Executive*, *Finance Specialist*.
- **Profile Photo**: Professional portrait in 3:4 aspect ratio (e.g., **600 × 800 px** in JPG/WebP).
- **Email & Direct Phone**: Contact details for direct client routing.
- **Sort Order**: Numerical index determining the member's position in the grid.

---

## 10. Contact Information & Footer Configuration

Centralizes all customer service phone numbers, physical locations, business hours, and copyright declarations.

### Frontend View
![Website Footer](screenshots/08-frontend-footer.png)

### Admin Location
* **Navigation Path**: **Settings** ➔ **Site Settings** ➔ Tabs **"Contact Info"**, **"Social Links"**, and **"Footer"**.
* **Direct URL**: `/admin/manage-settings`

![Contact Settings in Filament](screenshots/08-admin-settings-contact.png)

### Key Fields & Placeholders
| Tab | Admin Field | Database Key | Description |
| :--- | :--- | :--- | :--- |
| **Contact Info** | **Contact Phone** | `contact_phone` | Customer hotline rendered with automated `tel:` link. |
| **Contact Info** | **Contact Email** | `contact_email` | Main inbox for customer quotes rendered with `mailto:` link. |
| **Contact Info** | **Business Hours** | `contact_hours` | Operating schedule (e.g., *Mon - Sat: 9:00 AM - 7:00 PM*). |
| **Contact Info** | **Contact Address** | `contact_address` | Showroom address displayed on footer and `/contact` page. |
| **Contact Info** | **Google Map Embed URL** | `google_map_embed` | Embed iframe link for the interactive map. |
| **Social Links** | **Facebook / Instagram / X** | `social_*` | Official social media URLs (leave empty or `#` to hide). |
| **Footer** | **Copyright Notice** | `footer_copyright` | Legal notice supporting dynamic `{year}` and `{site_name}` placeholders. |

---

## 11. Centralized Leads & Inquiries Inbox

Every contact touchpoint on the website routes directly to this unified sales inbox:
1. **Schedule Test Drive** forms from individual vehicle detail pages.
2. **"Send Inquiry"** modal buttons in the sticky header and service cards.
3. **Contact Us** message form on `/contact`.
4. **Newsletter Subscription** forms in the footer.

### Frontend View
![Contact Form and Lead Generation](screenshots/09-frontend-contact.png)

### Admin Location
* **Navigation Path**: **Inquiries** ➔ **Inquiries** (Spanish: *Clientes ➔ Consultas*).
* **Direct URL**: `/admin/inquiries`

![Inquiries Inbox in Filament](screenshots/09-admin-inquiries.png)

### Logged Customer Data
- **Customer Name**: Full name of the prospect.
- **Phone Number**: Mandatory telephone field for rapid sales callbacks or WhatsApp contact.
- **Email Address**: Customer email for digital quotes and vehicle specs.
- **Associated Vehicle**: Direct link to the specific inventory car if the inquiry was sent from a car detail page.
- **Message Content**: Notes on financing preferences, trade-in questions, or test drive times.
- **Timestamp**: Exact date and time the lead was generated.

---

## 12. Best Practices for Content Editors

1. **Asset Compression & Formats**:
   - Use **WebP** or compressed **JPG** for vehicle photos, hero backgrounds, and staff portraits.
   - Use **SVG** or transparent **PNG** for dealership and manufacturer logos.
2. **Uniform Aspect Ratios**:
   - Maintain a uniform **16:9** or **4:3** aspect ratio across all vehicle primary photos to ensure inventory cards align neatly in the grid.
3. **Cache Invalidation**:
   - The application automatically purges cache entries upon saving settings. If changes do not reflect immediately in your browser, perform a hard refresh (`Ctrl + F5` on Windows/Linux or `Cmd + Shift + R` on macOS).
