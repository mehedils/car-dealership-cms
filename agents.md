# Carento: Single-Dealer Digital Showroom

## 1. Project Overview
This project is a car dealership web application built with Laravel. It is designed to act as a **Digital Showroom** for a **Single Dealership**. 

The primary goal of the application is to allow the dealership to showcase its vehicle inventory online, making it easy for prospective buyers to browse, filter, and inquire about specific cars.

## 2. The Core Concept
Unlike an automotive marketplace (like Autotrader) which hosts listings from hundreds of different sellers, this platform is the exclusive online storefront for one specific business. 
*   **The Dealer** is the sole owner and manager of the inventory.
*   **The Customer** visits the site to view the cars offered specifically by this dealership.

*Note: Any legacy code, routes, or views referencing "Dealer Listings" or "Dealer Details" should be considered obsolete, as they belong to a multi-dealer marketplace model rather than a single-dealer model.*

## 3. The Customer Experience (Frontend)
The public-facing side of the website is focused on conversion and ease of use:
*   **Inventory Catalog:** A comprehensive list of all available cars.
*   **Advanced Filtering:** Customers can narrow down their search by Price, Car Type (SUV, Sedan, etc.), Amenities, Fuel Type, and Rating.
*   **Car Details Page:** A dedicated landing page for each vehicle, displaying high-quality images, specifications, price, and a call-to-action to contact the dealer.
*   **Contact Page:** A direct line of communication between the buyer and the dealership.

## 4. The Dealership Experience (Backend Concept)
To manage the digital showroom, the application requires a secure Admin Dashboard for the dealership staff:
*   **Authentication:** A secure login portal for the dealer.
*   **Inventory Management (CRUD):** The ability to Create, Read, Update, and Delete vehicle listings.
*   **Media Management:** The ability to upload and manage car images.
*   **Lead Generation:** (Optional/Future) A place to view customer inquiries submitted through the contact forms or specific car detail pages.

## 5. Technical Stack
*   **Framework:** Laravel (PHP)
*   **Current State:** The frontend templates and routes are established. The inventory is currently functioning off a static configuration array (`config/cars.php`).
*   **Next Technical Steps:** Migrate the static configuration into a relational database (MySQL/PostgreSQL) using Laravel Eloquent Models and Migrations, and build the authenticated admin interface for inventory management.
