# Dealership Documentation & Administration Guides / Centro de Documentación

Welcome to the documentation repository for the car dealership website and administrative panel. / *Bienvenido al repositorio de documentación del sitio web y panel de control administrativo de la agencia de autos.*

---

## 🇬🇧 English Documentation

### 1. [Complete Administration Manual (ADMIN_MANUAL.md)](ADMIN_MANUAL.md)
Comprehensive step-by-step operating handbook with actual screenshots for dealership managers and content editors. Covers:
- Administrative credentials, URLs, and navigation structure.
- Logos, favicon, and brand identity management.
- Topbar contact info and rotating promotional announcements (*Ticker*).
- **Home Editor**: Section visibility toggles, Hero banner, and CTA video banner.
- **Vehicle Inventory (*Cars*)**: Adding/editing vehicles, pricing, monthly payment estimates, multi-image galleries, and specs.
- Manufacturer brand showcase and car categories.
- "Why Choose Us" features, aftersales services, and sales team members.
- Footer settings, business hours, and showroom location.
- Centralized leads inbox (*Inquiries*) for test drive and quotation requests.

### 2. [Technical Audit & Limitations Report (AUDIT_AND_LIMITATIONS.md)](AUDIT_AND_LIMITATIONS.md)
In-depth technical report analyzing:
- All elements currently **not editable from the administrative panel**.
- Exact template file paths and line numbers for hardcoded copy, images, and routes.
- Structural discrepancies (such as the unused `LocationResource` vs. `/contact` static cards).
- Actionable implementation roadmap to achieve 100% dynamic content autonomy.

### 3. [Logo Update Guide (DEMO_UPDATE_LOGO_EN.md)](DEMO_UPDATE_LOGO_EN.md)
Walkthrough guide demonstrating how to update dark and light logos and favicon, with aspect ratio and sizing guidelines.

---

## 🇪🇸 Documentación en Español

### 1. [Manual Completo de Administración (MANUAL_DE_ADMINISTRACION.md)](MANUAL_DE_ADMINISTRACION.md)
Guía exhaustiva con capturas de pantalla reales para el usuario final y administradores del sitio. Cubre:
- Acceso, credenciales y estructura general del panel administrativo.
- Gestión de logotipos, colores e identidad de marca.
- Barra superior y anuncios rotativos de ofertas.
- Configuración de la página de inicio (*Home Editor*) y control de visibilidad de bloques.
- Gestión del catálogo de autos (precios, fotos, cuotas de financiamiento y especificaciones).
- Marcas de vehículos y carrusel de fabricantes.
- Gestión de beneficios ("¿Por Qué Elegirnos?"), servicios y equipo de asesores.
- Pie de página, horarios de atención y canales de contacto.
- Bandeja de clientes potenciales (*Inquiries*) para pruebas de manejo y cotizaciones.

### 2. [Informe de Auditoría Técnica y Limitaciones (AUDITORIA_Y_LIMITACIONES.md)](AUDITORIA_Y_LIMITACIONES.md)
Documento técnico para el cliente y desarrolladores que analiza a fondo:
- Todos los elementos del sitio web que actualmente **no son editables desde el panel de control**.
- Archivos Blade y números de línea exactos donde reside cada texto o imagen fija.
- Inconsistencias detectadas (como el recurso de sucursales en admin no conectado a la vista de contacto).
- Propuestas concretas de solución y hoja de ruta recomendada de mejoras para lograr 100% de autonomía.

### 3. [Demostración de Ejemplo: Actualización de Logotipo (DEMO_UPDATE_LOGO.md)](DEMO_UPDATE_LOGO.md)
Guía inicial de demostración que muestra en detalle el flujo para actualizar el logotipo principal, el logotipo claro del pie de página y el favicon del navegador, con especificaciones de resolución y comportamiento CSS.

---

## Screenshot Automation / Automatización de Capturas

All screenshots are stored in the [`screenshots/`](screenshots/) directory and can be automatically regenerated from the local environment using the Puppeteer headless browser script:
- `docs/scripts/capture.js`

To regenerate all screenshots at any time:
```bash
bun docs/scripts/capture.js
```
*(Requires the local Laravel development server running on `http://127.0.0.1:8000`)*.
