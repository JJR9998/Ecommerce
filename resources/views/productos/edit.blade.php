@extends('layouts.app')

@section('title', 'Editar Producto')

@section('content')
<div class="container bg-dark text-white p-3 rounded-4">
    <h1 class="text-center">Editar producto</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="row g-3 mt-3">
        @csrf
        @method('PUT')

            <div class="col-md-4">
                <label>Nombre:</label><br>
                <input type="text" class="form-control" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
            </div>
            <div class="col-md-4">
                <label>Precio:</label><br>
                <input type="number" class="form-control" name="precio" value="{{ old('precio', $producto->precio) }}" required>
            </div>
            <div class="col-md-4">
                <label>Categoría:</label><br>
                <select name="categoria_id" class="form-select" required>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ $producto->categoria_id == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-12">
                <label>Stock:</label><br>
                <input type="number" class="form-control" name="stock" value="{{ old('stock', $producto->stock) }}" required>
            </div>
            <div class="col-12">
                <label>Descripción:</label><br>
                <textarea name="descripcion" class="form-control" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            </div>
            <div class="col-md-12">
                <label>Imagen:</label>
                @if ($producto->imagen_url)
                <div class="mb-3">
                    <img src="{{ asset('storage/' . $producto->imagen_url) }}" alt="Imagen del producto" width="300">
                </div>
            @endif
            </div>
            <div class="col-12 text-end">
                <a class="btn btn-secondary" href="{{ route('productos.index') }}">Cancelar</a>
                <button class="btn btn-primary" type="submit">Actualizar</button>
            </div>
          </form>
        </div>
        
@endsection