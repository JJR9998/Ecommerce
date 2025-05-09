@extends('layouts.app')

@section('content')
    <div class="container p-0 text-center">
        <h1>Articulos</h1>

        {{-- Botón para crear --}}
        @auth
            <a class="btn btn-primary my-3" href="{{ route('articulos_blog.create') }}">Agregar Articulo</a>
        @endauth
        
        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div style="color:  #0d6efd: 10px;">
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row ">
            {{-- Lista de categorías --}}
            @foreach ($articulos as $articulo)
                <div
                    class="col-12 col-md-5 col-lg-3 d-flex flex-column justify-content-center align-items-center gap-2 text-center border border-2 rounded-3 p-2 my-2">
                    <h2>{{ $articulo->titulo }}</h2>
                    <p><strong>Descripción:</strong> {{ $articulo->contenido }}</p>
                    <div>
                        <a class="btn btn-primary" href="{{ route('articulos_blog.show', $articulo->id) }}">Ver</a>
                        @auth
                            <form action="{{ route('articulos_blog.destroy', $articulo->id) }}" method="POST"
                                style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit" onclick="return confirm('¿Estás seguro de eliminar este articulo?')">Eliminar</button>
                            </form>
                        @endauth
                    </div>
                </div>
            @endforeach
            {{ $articulos->links() }}
        </div>
    </div>
@endsection