{{-- Vista de listado de productos --}}
{{-- Esta vista extiende el layout base y muestra todos los productos --}}

@extends('layouts.app')

@section('title', 'Lista de Productos')

@section('content')
<h1>Listado de Productos</h1>

{{-- Verificar si hay productos --}}
@if($productos->isEmpty())
    <div class="alert alert-info">
        <p>No hay productos disponibles.</p>
    </div>
@else
    <p>Total de productos: <strong>{{ $productos->count() }}</strong></p>

    {{-- Tabla de productos --}}
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ Str::limit($producto->descripcion, 50) }}</td>
                    <td>{{ number_format($producto->precio, 2) }}€</td>
                    <td>
                        @if($producto->stock > 50)
                            <span class="badge bg-success">{{ $producto->stock }}</span>
                        @elseif($producto->stock > 10)
                            <span class="badge bg-warning">{{ $producto->stock }}</span>
                        @elseif($producto->stock > 0)
                            <span class="badge bg-danger">{{ $producto->stock }}</span>
                        @else
                            <span class="badge bg-secondary">{{ $producto->stock }}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-sm btn-primary">Ver</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection
