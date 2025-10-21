{{-- Vista de detalle de producto --}}
{{-- Esta vista extiende el layout base y muestra información completa de un producto --}}

@extends('layouts.app')

@section('title', $producto->nombre)

@section('content')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('productos.index') }}">Productos</a></li>
        <li class="breadcrumb-item active">{{ $producto->nombre }}</li>
    </ol>
</nav>

<h1>{{ $producto->nombre }}</h1>

<div class="card">
    <div class="card-body">
        <h5>Descripción</h5>
        <p>{{ $producto->descripcion }}</p>

        <hr>

        <div class="row">
            <div class="col-md-6">
                <p><strong>ID:</strong> {{ $producto->id }}</p>
                <p><strong>Precio:</strong> {{ number_format($producto->precio, 2) }}€</p>
                <p><strong>Stock:</strong> {{ $producto->stock }} unidades</p>
            </div>
            <div class="col-md-6">
                <p><strong>Valor del Inventario:</strong> {{ number_format($valorInventario, 2) }}€</p>
                <p><strong>Estado:</strong> 
                    <span class="badge bg-{{ $estadoStock['clase'] }}">{{ $estadoStock['mensaje'] }}</span>
                </p>
            </div>
        </div>

        <hr>

        <p class="text-muted small"><strong>Creado:</strong> {{ $producto->created_at->format('d/m/Y H:i') }}</p>
        <p class="text-muted small"><strong>Actualizado:</strong> {{ $producto->updated_at->format('d/m/Y H:i') }}</p>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
@endsection
