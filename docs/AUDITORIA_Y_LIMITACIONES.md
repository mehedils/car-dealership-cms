# Informe de Auditoría Técnica: Elementos Fijos y Limitaciones del Administrador

Este documento complementa el **Manual de Administración**, detallando de manera exhaustiva todos aquellos componentes, textos, imágenes y secciones del sitio web que **actualmente no son editables desde el panel de control de Filament** (es decir, que se encuentran codificados en duro en plantillas Blade, rutas o archivos CSS).

Para cada caso se indica la **ubicación exacta en el código**, la **limitación funcional**, el **impacto operativo** y la **solución recomendada** para hacerlo editable si el equipo de desarrollo decide implementarlo.

---

## Resumen Ejecutivo de la Auditoría

| Módulo / Página | Nivel de Dinamismo | Estado en el Panel de Control | Acción Requerida para 100% Autonomía |
| :--- | :--- | :--- | :--- |
| **Logotipos y Marca** | 100% Dinámico | Totalmente editable en *Ajustes del Sitio*. | Ninguna (Resuelto en la última actualización). |
| **Barra Superior (Topbar)** | 100% Dinámico | Editable (Anuncios rotativos y datos de contacto). | Ninguna. |
| **Menú de Navegación Principal** | **0% Dinámico (Estático)** | No existe gestor de menús en el admin. | Crear gestor de menús o campos de rutas en configuración. |
| **Portada: Banner Principal (Hero)** | 100% Dinámico | Totalmente editable en *Home Editor*. | Ninguna. |
| **Portada: Título de Marcas** | **Parcialmente Estático** | Las marcas son dinámicas; el título y subtítulo son fijos. | Añadir 2 campos a *Home Editor ➔ Brands*. |
| **Portada: Banner CTA con Video** | 100% Dinámico | Totalmente editable en *Home Editor ➔ CTA Banner*. | Ninguna. |
| **Portada: Por Qué Elegirnos** | 100% Dinámico | Totalmente editable en *Contenido ➔ Beneficios*. | Ninguna. |
| **Inventario de Vehículos (/cars)** | 100% Dinámico | Catálogo, filtros y banner editables en el admin. | Ninguna. |
| **Página "Nosotros" (/about)** | **Parcialmente Estático** | Equipo y beneficios dinámicos; historia y cabecera fijos. | Crear pestaña *About Page* en Ajustes del Sitio. |
| **Página de Servicios (/services)** | **Parcialmente Estático** | Tarjetas dinámicas; banner de cabecera y CTA final fijos. | Crear pestaña *Services Page* en Ajustes del Sitio. |
| **Página de Contacto (/contact)** | **Parcialmente Estático** | Contacto y mapa dinámicos; agencias secundarias fijas. | Conectar `LocationResource` a la vista de contacto. |
| **Columnas de Enlaces del Footer** | **0% Dinámico (Estático)** | Los enlaces de las 4 columnas están fijos en HTML. | Crear configuración de columnas o navegación de pie. |
| **SEO y Metadatos por Página** | **Parcialmente Estático** | Solo nombre del sitio en el `<title>`. | Agregar campos meta description y open graph. |

---

## 1. Menú de Navegación Principal del Encabezado

### Archivo Afectado
* [`resources/views/partials/header.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/partials/header.blade.php#L13-L30)

### Código Actual
```blade
<ul class="main-menu">
    <li><a href="/">{{ __('Home') }}</a></li>
    <li><a href="/cars">{{ __('Cars') }}</a></li>
    <li><a href="/services">{{ __('Services') }}</a></li>
    <li><a href="/about">{{ __('About Us') }}</a></li>
    <li><a href="/contact">{{ __('Contact Us') }}</a></li>
</ul>
```

### Limitación
* Los cinco enlaces del menú principal están escritos de forma estática en la plantilla Blade.
* El administrador no puede cambiar el orden de las pestañas, agregar un nuevo enlace (ej. *"Financiamiento"*, *"Promociones"*) o deshabilitar una opción temporalmente sin modificar el código fuente.
* El botón **"Enviar Consulta"** (*Send Inquiry*, línea 35) tiene texto y comportamiento fijo de apertura del modal de lead.

### Solución Recomendada
Añadir un componente Repeater en `ManageSettings` (pestaña *Navegación*) con campos `etiqueta`, `url` y `orden`, o integrar un plugin de gestión de menús en Filament.

---

## 2. Sección de Marcas de la Portada (Títulos y Subtítulo)

### Archivo Afectado
* [`resources/views/sections/brand.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/sections/brand.blade.php#L4-L10)

### Código Actual
```blade
<h3 class="heading-3 mb-0 neutral-1000 wow fadeInUp">{{ __('Premium Brands') }}</h3>
<div class="d-flex align-items-center justify-content-between mb-4">
    <p class="text-lg-medium neutral-500 mb-0 wow fadeInUp">{{ __('Unveil the Finest Selection of High-End Vehicles') }}</p>
    <a href="{{ url('/cars') }}" class="text-sm-bold neutral-1000 d-inline-flex align-items-center gap-2 link-hover-primary wow fadeInUp">
        <span>{{ __('Show All Brands') }}</span>
        <i class="fi fi-rr-arrow-right text-primary fs-6"></i>
    </a>
</div>
```

### Limitación
* Aunque los logotipos y nombres de las marcas son 100% administrables desde `/admin/brands`, los textos que encabezan la sección (**"Premium Brands"**, **"Unveil the Finest Selection of High-End Vehicles"** y el botón **"Show All Brands"**) están codificados en la plantilla.
* Si el cliente desea posicionarse en autos comerciales o económicos en lugar de marcas de lujo ("Premium"), no puede modificar este título desde el *Home Editor*.

### Solución Recomendada
Agregar en `ManageHomepageSettings.php` (Pestaña *Brands Showcase*) tres campos de texto:
- `home_brands_title` (por defecto: *"Marcas Asociadas"* o *"Premium Brands"*)
- `home_brands_subtitle` (por defecto: *"Descubre la mejor selección de vehículos"*)
- `home_brands_button_text` (por defecto: *"Ver Todas las Marcas"*)

---

## 3. Página Institucional "Nosotros" (`/about`)

### Archivo Afectado
* [`resources/views/about.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/about.blade.php#L14-L41)

### Elementos Fijos Detectados
1. **Banner Superior (Líneas 14-15)**:
   ```blade
   <h2 class="text-white">About Our Dealership</h2>
   <p class="text-lg-medium text-white opacity-75">Your Trusted Partner in Premium Automobile Sales & Service</p>
   ```
   La imagen de fondo (`banner4.png`), el título y el subtítulo están fijos en inglés.
2. **Historia de la Concesionaria (Líneas 30-36)**:
   ```blade
   <span class="text-sm-bold text-uppercase neutral-500 tracking-wide">Who We Are</span>
   <h3 class="neutral-1000 mt-10 mb-20">Dedicated to Excellence in Automotive Solutions</h3>
   <p class="text-md-regular neutral-500 mb-20">
       At {{ setting('site_name', 'Carento') }}, we pride ourselves on delivering an exceptional automobile buying and ownership experience...
   </p>
   ```
   El texto de la historia corporativa y la fotografía del directivo (`/assets/imgs/page/homepage1/author2.png`) están fijos en la plantilla.

### Diagnóstico Operativo
* Los **Miembros del Equipo** (`/admin/team-members`) y los **Beneficios** (`/admin/why-us-features`) sí son administrables.
* Sin embargo, si la agencia desea redactar su propia misión corporativa en español, cambiar los dos párrafos institucionales o subir la foto real de sus instalaciones, se requiere intervención técnica en el archivo Blade.

### Solución Recomendada
Crear una pestaña **"Página Nosotros"** (*About Page*) en `ManageSettings` con:
- `about_hero_title` y `about_hero_subtitle`.
- `about_hero_bg_image` (Cargador de imagen).
- `about_story_badge`, `about_story_title` y `about_story_description` (Textarea con editor enriquecido).
- `about_story_image` (Cargador de foto del concesionario).

---

## 4. Página de Contacto y Agencias Secundarias (`/contact`)

### Archivo Afectado
* [`resources/views/contact.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/contact.blade.php#L20-L130)

### Código Actual
```blade
<h4 class="neutral-1000">Our agents worldwide</h4>
...
<!-- Tarjeta 1: New York (Usa setting('contact_address')) -->
<!-- Tarjeta 2: Tokyo (Dirección '2-11-3 Meguro...', Tel: '+81 3 3456 7890' - Fija en HTML) -->
<!-- Tarjeta 3: London ('10 Downing Street...', Tel: '+44 20 7946 0919' - Fija en HTML) -->
<!-- Tarjeta 4: Paris ('15 Rue de la Paix...', Tel: '+33 1 42 68 55 00' - Fija en HTML) -->
```

### Inconsistencia Detectada en la Base de Datos
* En el panel de control existe el recurso `LocationResource` (`/admin/locations`) conectado a la tabla `locations`.
* No obstante, en [`routes/web.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/routes/web.php#L36-L38):
  ```php
  Route::get('/contact', function () {
      return view('contact');
  })->name('contact');
  ```
  La ruta **no consulta las ubicaciones** de la base de datos, por lo que las sucursales secundarias que se agreguen en el panel administrativo no se reflejan en la página web pública.

### Solución Recomendada
1. Actualizar la ruta en `routes/web.php` para enviar `$locations = Location::all()`.
2. Reemplazar las tarjetas estáticas de Tokyo, Londres y París en `contact.blade.php` por un bucle `@foreach($locations as $loc)`.

---

## 5. Página de Servicios (`/services`)

### Archivo Afectado
* [`resources/views/services.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/services.blade.php#L13-L80)

### Elementos Fijos Detectados
1. **Encabezado de Página (Líneas 13-15)**:
   - Título: *"Our Dealership Services"*.
   - Subtítulo: *"Serving You with Quality, Trust, and Professionalism"*.
   - Imagen de fondo: `/assets/imgs/page-header/banner4.png`.
2. **Banner Inferior de Consulta (Líneas 70-76)**:
   - Título: *"Have Questions About Our Services?"*.
   - Descripción: *"Get in touch with our expert sales and support team today for advice and consultations."*.
   - Botón: *"Get in Touch Now"*.

### Diagnóstico Operativo
* Las tarjetas individuales de los servicios son 100% dinámicas (`/admin/services`).
* Solo la cabecera y el banner final están en inglés estático dentro de la plantilla.

### Solución Recomendada
Crear una pestaña en `ManageSettings` o añadir claves en `ManageHomepageSettings` para centralizar los textos de servicios.

---

## 6. Columnas de Enlaces del Pie de Página (Footer)

### Archivo Afectado
* [`resources/views/partials/footer.blade.php`](file:///home/mehedi/Code/fiverr/car-dealership-cms/resources/views/partials/footer.blade.php#L41-L84)

### Estructura Actual
El pie de página contiene 4 columnas fijas de enlaces:
1. **Quick Links**: Enlaces a Home, Inventory, Services, About Us, Contact Us.
2. **Vehicles by Type**: Enlaces a filtros directos (`suv`, `sedan`, `pickup`, `new`, `certified`).
3. **Our Services**: Textos fijos de servicios (*Vehicle Financing*, *Trade-In Valuation*, etc.).
4. **Support & Info**: Textos fijos de soporte (*Schedule Test Drive*, *FAQs*, *Location & Directions*).

### Limitación
* Aunque el logotipo blanco, teléfono, correo, horarios, dirección y aviso de derechos reservados son 100% dinámicos en `ManageSettings`, los títulos de las columnas y sus enlaces específicos están fijos en la plantilla HTML.

---

## 7. Plan de Acción Recomendado (Hoja de Ruta de Mejoras)

Si se desea dotar al sitio del 100% de dinamismo sin requerir desarrolladores para futuros cambios de texto, se recomienda el siguiente orden de prioridad:

### Prioridad Alta (Impacto Inmediato en Ventas y Marca)
1. **Conectar `LocationResource` en `/contact`**:
   - Eliminar las sucursales extranjeras falsas (Tokyo/London/Paris) y permitir al cliente crear sus sucursales reales (ej. *Sucursal Centro*, *Sucursal Norte*) directamente en el panel.
2. **Hacer Dinámica la Historia Institucional en `/about`**:
   - Permitir al cliente redactar la reseña histórica de su agencia y subir la fotografía de su equipo o instalaciones sin tocar código.
3. **Campos de Título para Marcas**:
   - Añadir `home_brands_title` y `home_brands_subtitle` en el *Home Editor*.

### Prioridad Media (Flexibilidad de Navegación)
4. **Títulos y Banners en `/services`**:
   - Centralizar títulos de apertura y banner CTA inferior.
5. **Menú de Navegación Administrable**:
   - Permitir reordenar o añadir enlaces a páginas especiales desde la configuración.
