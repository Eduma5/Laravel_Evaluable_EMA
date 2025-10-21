<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Producto_EMA_Controller;

/**
 * Ruta principal - Redirecciona al listado de productos
 */
Route::get('/', function () {
    return redirect()->route('productos.index');
});

/**
 * Rutas para el módulo de productos
 * 
 * - GET /productos - Lista todos los productos (index)
 * - GET /productos/{id} - Muestra el detalle de un producto (show)
 */
Route::prefix('productos')->name('productos.')->group(function () {
    Route::get('/', [Producto_EMA_Controller::class, 'index'])->name('index');
    Route::get('/{id}', [Producto_EMA_Controller::class, 'show'])->name('show');
});
