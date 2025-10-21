<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Producto_EMA;
use Illuminate\Support\Facades\DB;

class Producto_EMA_Seeder extends Seeder
{
    /**
     * Puebla la base de datos con productos de ejemplo.
     * 
     * Este seeder crea una variedad de productos con diferentes
     * niveles de stock para demostrar todas las funcionalidades
     * del sistema.
     */
    public function run(): void
    {
        // Limpiar la tabla antes de insertar (opcional)
        DB::table('productos_ema')->truncate();

        // Array de productos de ejemplo
        $productos = [
            [
                'nombre' => 'Laptop Dell XPS 15',
                'descripcion' => 'Portátil de alto rendimiento con procesador Intel Core i7, 16GB RAM, SSD 512GB y pantalla 4K. Ideal para profesionales y creadores de contenido.',
                'precio' => 1299.99,
                'stock' => 75,
            ],
            [
                'nombre' => 'iPhone 14 Pro',
                'descripcion' => 'Smartphone de última generación con cámara de 48MP, chip A16 Bionic, pantalla Super Retina XDR de 6.1 pulgadas y 5G.',
                'precio' => 1099.00,
                'stock' => 45,
            ],
            [
                'nombre' => 'Samsung Galaxy Tab S8',
                'descripcion' => 'Tablet premium con pantalla AMOLED de 11 pulgadas, procesador Snapdragon, S Pen incluido y batería de larga duración.',
                'precio' => 699.99,
                'stock' => 8,
            ],
            [
                'nombre' => 'Auriculares Sony WH-1000XM5',
                'descripcion' => 'Auriculares inalámbricos con cancelación de ruido líder en la industria, audio de alta resolución y hasta 30 horas de batería.',
                'precio' => 349.00,
                'stock' => 120,
            ],
            [
                'nombre' => 'Monitor LG UltraWide 34"',
                'descripcion' => 'Monitor curvo ultrawide QHD (3440x1440), 144Hz, HDR400, ideal para gaming y productividad con tecnología IPS.',
                'precio' => 599.99,
                'stock' => 5,
            ],
            [
                'nombre' => 'Teclado Mecánico Logitech MX',
                'descripcion' => 'Teclado mecánico inalámbrico con switches táctiles, retroiluminación inteligente y conectividad multi-dispositivo.',
                'precio' => 159.99,
                'stock' => 32,
            ],
            [
                'nombre' => 'Ratón Logitech MX Master 3S',
                'descripcion' => 'Ratón ergonómico de precisión con sensor de 8000 DPI, desplazamiento electromagnético y botones programables.',
                'precio' => 99.99,
                'stock' => 0,
            ],
            [
                'nombre' => 'Webcam Logitech Brio 4K',
                'descripcion' => 'Cámara web profesional con resolución 4K Ultra HD, HDR, autoenfoque y corrección de luz. Perfecta para videoconferencias.',
                'precio' => 189.00,
                'stock' => 18,
            ],
            [
                'nombre' => 'Disco Duro Externo Seagate 4TB',
                'descripcion' => 'Disco duro portátil USB 3.0 de 4TB, compatible con Windows y Mac, diseño compacto y resistente.',
                'precio' => 89.99,
                'stock' => 150,
            ],
            [
                'nombre' => 'Router Wi-Fi 6 TP-Link AX3000',
                'descripcion' => 'Router de doble banda con tecnología Wi-Fi 6, velocidades hasta 3 Gbps, cobertura para casas grandes y seguridad avanzada.',
                'precio' => 129.99,
                'stock' => 3,
            ],
            [
                'nombre' => 'Impresora HP LaserJet Pro',
                'descripcion' => 'Impresora láser monocromo con impresión dúplex automática, conectividad Wi-Fi y velocidad de 40 ppm.',
                'precio' => 249.00,
                'stock' => 25,
            ],
            [
                'nombre' => 'Micrófono Blue Yeti USB',
                'descripcion' => 'Micrófono de condensador profesional con múltiples patrones de captación, ideal para streaming, podcasts y grabaciones.',
                'precio' => 129.99,
                'stock' => 42,
            ],
        ];

        // Insertar productos en la base de datos
        foreach ($productos as $producto) {
            Producto_EMA::create($producto);
        }

        // Mensaje de confirmación
        $this->command->info('✓ Se han creado ' . count($productos) . ' productos exitosamente.');
    }
}
