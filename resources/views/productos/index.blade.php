@extends('layouts.app')

@section('title', 'Listado de Productos')

@section('content')
    <div class="container p-0 text-center">
        <h1>Catálogo</h1>

        {{-- Filtro por categoría --}}
        <form method="GET" action="{{ route('productos.index') }}">
            <label for="categoria">Filtrar por categoría:</label>
            <select class="border border-2 rounded-2" name="categoria_id" onchange="this.form.submit()">
                <option value="">Todas</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </form>

        {{-- Botón para crear --}}
         
        @auth
            <a class="btn btn-primary my-3" href="{{ route('productos.create') }}">Agregar producto</a>
        @endauth

        {{-- Mensaje de éxito --}}
        @if (session('success'))
            <div style="color:  #0d6efd; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

    </div>


    {{-- Lista de productos --}}
    <div class="container p-0 col-12 ">
        <div class="row">
            @forelse($productos as $producto)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex flex-column align-items-center rounded-3 my-2">
                    <div class="card shadow-sm w-100 h:100">
                        @if ($producto->imagen_url)
                            <img class="card-img-top" src="{{ asset('storage/' . $producto->imagen_url) }}"
                                alt="{{ $producto->nombre }}" style="height:200px;">
                        @endif
                        <div class="card-body text-center">
                            <h2 class="fs-3">{{ $producto->nombre }}</h2>
                            <p><strong>Precio:</strong> ${{ $producto->precio }}</p>
                            <p><strong>Categoría:</strong> {{ $producto->categoria->nombre ?? 'Sin categoría' }}</p>
                            <div>
                                <a class="btn btn-primary" href="{{ route('productos.show', $producto->id) }}">Ver</a>
                                @auth
                                    <a class="btn btn-primary" href="{{ route('productos.edit', $producto->id) }}">Editar</a>

                                    <form action="{{ route('productos.destroy', $producto->id) }}" method="POST"
                                        style="display:inline-block"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este producto?')" class="mt-3">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="w-100 text-center text-black-50">No hay productos registrados.</p>
            @endforelse
        </div>
    </div>
@endsection
