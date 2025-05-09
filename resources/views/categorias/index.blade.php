@extends('layouts.app')

@section('title', 'Listado de Categorías')

@section('content')
<div class="container p-0 text-center">
    <h1>Listado de Categorías</h1>

    {{-- Botón para crear nueva categoría --}}
    @auth
        <a class="btn btn-primary my-3" href="{{ route('categorias.create') }}">Nueva categoría</a>
    @endauth

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div style="color:  #0d6efd: 10px;">
            {{ session('success') }}
        </div>
    @endif
</div>
    
<div class="container p-0 col-12">
    <div class="row">
        {{-- Lista de categorías --}}
        @foreach($categorias as $categoria)
        <div class="card border-dark mb-3 my-2 mx-2 text-center p-0" style="max-width: 18rem;">
            <div class="card-header bg-dark text-white">{{ $categoria->nombre }}</div>

            <div class="card-body">
                <p class="card-text"><strong>Descripción:</strong> {{ $categoria->descripcion }}</p>
                <div>
                    @auth
                        <a class="btn btn-primary" href="{{ route('categorias.edit', $categoria->id) }}">Editar</a>

                        <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar esta categoría?')">Eliminar</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
        @endforeach  
    </div>
</div>

@endsection
