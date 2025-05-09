@extends('layouts.app')

@section('title', 'Detalle del Producto')

@section('content')
<div class="container d-flex justify-content-center">
    <div class="card mb-3 bg-dark text-white rounded-4" style="max-width: 500px;">
        @if($producto->imagen_url)
        <img class="card-img-top" src="{{ asset('storage/' . $producto->imagen_url) }}" alt="Imagen del producto" style="height: 250px; object-fit: cover; width: 100%;">
        @endif
        <div class="card-body text-center">
           <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
            <p><strong>Stock:</strong> {{ $producto->stock }}</p>
            <a class="btn btn-primary" href="{{ route('productos.index') }}">Volver</a>
        </div>
    </div>
</div>
@endsection
