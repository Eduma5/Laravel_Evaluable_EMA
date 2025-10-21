<?php

namespace App\Http\Controllers;

use App\Models\Producto_EMA;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Producto_EMA_Controller extends Controller
{
    /**
     * Muestra una lista de todos los productos.
     * 
     * Este método recupera todos los productos de la base de datos
     * y los pasa a la vista para su visualización.
     *
     * @return View
     */
    public function index(): View
    {
        // Obtener todos los productos ordenados por nombre
        $productos = Producto_EMA::orderBy('nombre', 'asc')->get();
        
        // Retornar la vista con los productos
        return view('productos.index', compact('productos'));
    }

    /**
     * Muestra los detalles de un producto específico.
     * 
     * Este método busca un producto por su ID y muestra
     * toda su información detallada.
     *
     * @param int $id El ID del producto a mostrar
     * @return View
     */
    public function show(int $id): View
    {
        // Buscar el producto por ID o lanzar una excepción 404 si no existe
        $producto = Producto_EMA::findOrFail($id);
        
        // Calcular el valor total del inventario (precio × stock)
        $valorInventario = $this->calcularValorInventario($producto);
        
        // Determinar el estado del stock
        $estadoStock = $this->determinarEstadoStock($producto->stock);
        
        // Retornar la vista con los datos del producto y cálculos adicionales
        return view('productos.show', compact('producto', 'valorInventario', 'estadoStock'));
    }

    /**
     * Calcula el valor total del inventario para un producto.
     * 
     * Lógica de negocio: valor total = precio × stock
     *
     * @param Producto_EMA $producto El producto a calcular
     * @return float El valor total del inventario
     */
    private function calcularValorInventario(Producto_EMA $producto): float
    {
        return $producto->precio * $producto->stock;
    }

    /**
     * Determina el estado del stock basado en la cantidad disponible.
     * 
     * Lógica de negocio:
     * - Stock crítico: 0-10 unidades
     * - Stock bajo: 11-50 unidades
     * - Stock disponible: más de 50 unidades
     *
     * @param int $stock La cantidad en stock
     * @return array Información sobre el estado del stock
     */
    private function determinarEstadoStock(int $stock): array
    {
        if ($stock === 0) {
            return [
                'nivel' => 'agotado',
                'mensaje' => 'Producto agotado',
                'clase' => 'danger'
            ];
        } elseif ($stock <= 10) {
            return [
                'nivel' => 'critico',
                'mensaje' => 'Stock crítico',
                'clase' => 'danger'
            ];
        } elseif ($stock <= 50) {
            return [
                'nivel' => 'bajo',
                'mensaje' => 'Stock bajo',
                'clase' => 'warning'
            ];
        } else {
            return [
                'nivel' => 'disponible',
                'mensaje' => 'Stock disponible',
                'clase' => 'success'
            ];
        }
    }
}
