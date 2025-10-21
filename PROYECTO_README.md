# Sistema de Gestión de Productos - Laravel (EMA)

Sistema completo de gestión de productos desarrollado con Laravel, que implementa las mejores prácticas de desarrollo siguiendo el patrón MVC.

**Desarrollado por:** EMA (Eduardo Miguel Alejandro)

## 📋 Características Implementadas

### ✅ Requisitos Completados

1. **Entorno de Desarrollo Configurado** ✓
   - Proyecto Laravel configurado y funcional
   - Base de datos SQLite configurada

2. **Migración de Base de Datos** ✓
   - Tabla `productos_ema` con los campos:
     - `id` (clave primaria autoincremental)
     - `nombre` (string)
     - `descripcion` (text)
     - `precio` (decimal 10,2)
     - `stock` (integer)
     - `timestamps` (created_at, updated_at)

3. **Modelo Eloquent** ✓
   - Modelo `Producto_EMA` con:
     - Tabla asociada: `productos_ema`
     - Atributos asignables en masa (fillable)
     - Conversión de tipos (casts)
     - Documentación completa

4. **Controlador** ✓
   - `Producto_EMA_Controller` con métodos:
     - `index()`: Lista todos los productos
     - `show($id)`: Muestra detalle de un producto
   - Lógica de negocio organizada:
     - `calcularValorInventario()`: Calcula el valor total del inventario
     - `determinarEstadoStock()`: Determina el estado del stock
   - Código limpio con comentarios y nombres descriptivos

5. **Plantilla Base Blade** ✓
   - Layout `app.blade.php` con:
     - Encabezado (navbar con navegación)
     - Pie de página (footer con información)
     - Bootstrap 5 integrado
     - Estilos personalizados
     - Iconos SVG de Bootstrap

6. **Vistas Dinámicas** ✓
   - Vista `index.blade.php`:
     - Lista de productos en formato de tarjetas
     - Badges de estado de stock
     - Diseño responsive
     - Aplicación de herencia de plantilla
   - Vista `show.blade.php`:
     - Detalle completo del producto
     - Breadcrumb de navegación
     - Información de inventario
     - Alertas según estado de stock
     - Sidebar con resumen

7. **Integración de Datos Dinámicos** ✓
   - Datos pasados desde controlador a vistas
   - Variables: `$productos`, `$producto`, `$valorInventario`, `$estadoStock`
   - Uso de directivas Blade (@if, @foreach, @extends, @yield)
   - Formateo de precios y fechas
   - Uso de helpers de Laravel (Str::limit)

8. **Lógica de Negocio Organizada** ✓
   - Separación de responsabilidades
   - Métodos privados para cálculos
   - Sin lógica en vistas
   - Código documentado
   - Nombres claros y descriptivos
   - Buenas prácticas aplicadas

## 🗂️ Estructura del Proyecto

```
app/
├── Http/
│   └── Controllers/
│       └── Producto_EMA_Controller.php    # Controlador principal
└── Models/
    └── Producto_EMA.php                   # Modelo Eloquent

database/
├── migrations/
│   └── 2025_10_21_074818_create_productos_ema_table.php
└── seeders/
    ├── DatabaseSeeder.php
    └── Producto_EMA_Seeder.php            # 12 productos de ejemplo

resources/
└── views/
    ├── layouts/
    │   └── app.blade.php             # Plantilla base
    └── productos/
        ├── index.blade.php           # Lista de productos
        └── show.blade.php            # Detalle de producto

routes/
└── web.php                           # Rutas de la aplicación
```

## 🚀 Instalación y Configuración

### Prerrequisitos

- PHP >= 8.1
- Composer
- SQLite o MySQL

### Pasos para ejecutar

1. **Clonar el repositorio o usar el proyecto actual**
   ```bash
   cd c:\Users\CampusFP\Desktop\Edu\Laravel\AE_EMA_
   ```

2. **Instalar dependencias** (si es necesario)
   ```bash
   composer install
   ```

3. **Configurar el archivo .env** (ya configurado)
   ```
   DB_CONNECTION=sqlite
   ```

4. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

5. **Poblar la base de datos**
   ```bash
   php artisan db:seed --class=Producto_EMA_Seeder
   ```

6. **Iniciar el servidor**
   ```bash
   php artisan serve
   ```

7. **Acceder a la aplicación**
   - URL: http://127.0.0.1:8000
   - Lista de productos: http://127.0.0.1:8000/productos

## 📱 Funcionalidades

### Listado de Productos (`/productos`)

- Muestra todos los productos en tarjetas
- Información visible:
  - Nombre del producto
  - Descripción (limitada a 100 caracteres)
  - Precio formateado
  - Stock disponible
  - Badge de estado de stock (colores según disponibilidad)
- Botón para ver detalles de cada producto
- Contador total de productos
- Diseño responsive (1-3 columnas según dispositivo)

### Detalle de Producto (`/productos/{id}`)

- Información completa del producto:
  - ID del producto
  - Nombre y descripción completa
  - Precio unitario
  - Stock disponible
  - Valor total del inventario (precio × stock)
  - Estado del stock con alertas visuales
  - Fechas de creación y actualización
- Breadcrumb de navegación
- Botón para volver al listado

### Lógica de Estado de Stock

El sistema determina automáticamente el estado del stock:

- **Agotado** (0 unidades): Badge rojo y alerta danger
- **Stock crítico** (1-10 unidades): Badge rojo y alerta danger
- **Stock bajo** (11-50 unidades): Badge amarillo y alerta warning
- **Stock disponible** (>50 unidades): Badge verde y alerta success

## 🎨 Diseño y Estilos

- **Framework CSS**: Bootstrap 5.3
- **Iconos**: Bootstrap Icons (SVG)
- **Paleta de colores**: 
  - Primary: Azul Bootstrap
  - Success: Verde para stock disponible
  - Warning: Amarillo para stock bajo
  - Danger: Rojo para stock crítico
- **Efectos**:
  - Hover en tarjetas de productos
  - Transiciones suaves
  - Sombras para dar profundidad

## 📊 Datos de Ejemplo

El seeder incluye 12 productos de tecnología:

1. Laptop Dell XPS 15 (75 unidades)
2. iPhone 14 Pro (45 unidades)
3. Samsung Galaxy Tab S8 (8 unidades - stock crítico)
4. Auriculares Sony WH-1000XM5 (120 unidades)
5. Monitor LG UltraWide 34" (5 unidades - stock crítico)
6. Teclado Mecánico Logitech MX (32 unidades)
7. Ratón Logitech MX Master 3S (0 unidades - agotado)
8. Webcam Logitech Brio 4K (18 unidades)
9. Disco Duro Externo Seagate 4TB (150 unidades)
10. Router Wi-Fi 6 TP-Link AX3000 (3 unidades - stock crítico)
11. Impresora HP LaserJet Pro (25 unidades)
12. Micrófono Blue Yeti USB (42 unidades)

## 🔧 Comandos Útiles

### Artisan

```bash
# Ver todas las rutas
php artisan route:list

# Limpiar caché
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Resetear base de datos
php artisan migrate:fresh --seed
```

## 📝 Buenas Prácticas Implementadas

### Código

- ✅ Nombres descriptivos y claros
- ✅ Comentarios en métodos y clases
- ✅ Type hints en parámetros y retornos
- ✅ Separación de responsabilidades
- ✅ Métodos cortos y específicos
- ✅ Sin lógica en vistas

### Laravel

- ✅ Uso correcto de Eloquent
- ✅ Route Model Binding implícito
- ✅ Blade directives apropiadas
- ✅ Helpers de Laravel (Str, Number)
- ✅ Migraciones versionadas
- ✅ Seeders organizados

### Estructura

- ✅ Patrón MVC respetado
- ✅ Controlador delgado con lógica en métodos privados
- ✅ Vistas con herencia
- ✅ Layouts reutilizables
- ✅ Assets CDN (Bootstrap)

## 🎓 Criterios de Evaluación Cubiertos

- **1d**: Entorno configurado ✓
- **3a**: Migración creada correctamente ✓
- **3c**: Modelo Eloquent implementado ✓
- **4a**: Controlador con métodos index y show ✓
- **2a**: Plantilla base y vistas con herencia ✓
- **2c**: Datos dinámicos integrados ✓
- **4c**: Lógica organizada y separada ✓
- **4d**: Buenas prácticas aplicadas ✓

## 📄 Licencia

Proyecto educativo - Laravel Framework

---

**Desarrollado con ❤️ usando Laravel {{ app()->version() }}**
