# Centro de Documentación y Guías del Concesionario

Bienvenido al repositorio de documentación del sitio web y panel de control administrativo de la agencia de autos.

En esta carpeta encontrará manuales operativos con capturas de pantalla reales, guías técnicas paso a paso y el informe de auditoría sobre el nivel de dinamismo de cada módulo del sitio web.

---

## Documentos Disponibles

### 1. [Manual Completo de Administración (MANUAL_DE_ADMINISTRACION.md)](MANUAL_DE_ADMINISTRACION.md)
Guía exhaustiva con capturas de pantalla reales para el usuario final y administradores del sitio. Cubre:
- Acceso y credenciales al panel administrativo.
- Gestión de logotipos, colores e identidad de marca.
- Barra superior y anuncios rotativos de ofertas.
- Configuración de la página de inicio (Home Editor) y control de visibilidad de secciones.
- Gestión del catálogo de autos (precios, fotos, cuotas de financiamiento y especificaciones).
- Marcas de vehículos y carrusel de fabricantes.
- Gestión de beneficios ("¿Por Qué Elegirnos?"), servicios y equipo de asesores.
- Pie de página, horarios de atención y canales de contacto.
- Bandeja de clientes potenciales (leads de prueba de manejo y solicitudes de cotización).

### 2. [Informe de Auditoría Técnica y Limitaciones (AUDITORIA_Y_LIMITACIONES.md)](AUDITORIA_Y_LIMITACIONES.md)
Documento técnico para el cliente y desarrolladores que analiza a fondo:
- Todos los elementos del sitio web que actualmente **no son editables desde el panel de control**.
- Archivos Blade y números de línea exactos donde reside cada texto o imagen fija.
- Inconsistencias detectadas (como el recurso de sucursales en admin no conectado a la vista de contacto).
- Propuestas concretas de solución y hoja de ruta recomendada de mejoras para lograr 100% de autonomía.

### 3. [Demostración de Ejemplo: Actualización de Logotipo (DEMO_UPDATE_LOGO.md)](DEMO_UPDATE_LOGO.md)
Guía inicial de demostración que muestra en detalle el flujo para actualizar el logotipo principal, el logotipo claro del pie de página y el favicon del navegador, con especificaciones de resolución y comportamiento CSS.

---

## Estructura de Capturas de Pantalla

Todas las capturas de pantalla están organizadas en la carpeta [`screenshots/`](screenshots/) y se generan automáticamente desde el entorno local mediante el script de headless browser:
- `docs/scripts/capture.js`

Para regenerar todas las capturas de pantalla en cualquier momento:
```bash
bun docs/scripts/capture.js
```
*(Requiere que el servidor local de Laravel esté activo en `http://127.0.0.1:8000`)*.
