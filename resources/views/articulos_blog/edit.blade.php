@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('articulos_blog.update', $articulo->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Titulo</label>
            <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $articulo->titulo) }}" required>
        </div>

        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Contenido</label>
            <textarea class="form-control" name="contenido" rows="3">{{ old('contenido', $articulo->contenido) }}</textarea>
        </div>

        @if ($articulo->imagen_url)
            <div class="mb-3">
                <img src="{{ asset('storage/' . $articulo->imagen_url) }}" alt="Imagen del articulo" width="150">
            </div>
        @endif

        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Autor</label>
            <input type="text" name="autor" class="form-control" value="{{ old('autor', $articulo->autor) }}" required>
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label small">Categoría</label>
            <select name="id_categoria" id="id_categoria" class="form-select form-select-sm bg-dark text-white border-secondary w-100" required>
                <option value="" disabled selected>Seleccione una categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ old('id_categoria', $articulo->id_categoria) == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>        

        <div class="mb-3">
            <a class="btn btn-outline-secondary ms-2" href="{{ route('articulos_blog.index') }}">Cancelar</a>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
    </form>
@endsection