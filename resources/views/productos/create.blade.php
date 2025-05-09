@extends('layouts.app')

@section('title', 'Crear Producto')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card text-white bg-dark border-0 rounded-4 w-75">
        <div class="card-header text-center">
            <h4 class="mb-0">Crear nuevo producto</h4>
        </div>

        <div class="card-body d-flex justify-content-center">
            <div class="w-100" style="max-width: 500px;">
                @if ($errors->any())
                    <div class="alert alert-danger py-2 px-3 mb-3">
                        <ul class="mb-0 small">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label small">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Descripción</label>
                        <textarea name="descripcion" class="form-control" required></textarea>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <label class="form-label small">Precio</label>
                            <input type="number" name="precio" class="form-control" required>
                        </div>
                        <div class="col">
                            <label class="form-label small">Stock</label>
                            <input type="number" name="stock" class="form-control" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small">Categoría</label>
                        <select name="categoria_id" class="form-select" required>
                            <option value="">Seleccionar</option>
                            @foreach($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="imagen_url" class="form-label">Imagen:</label>
                        <input type="file" name="imagen_url" id="imagen_url" class="form-control" accept="image/*">
                    </div>

                    <div class="text-end">
                        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection