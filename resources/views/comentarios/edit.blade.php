@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card text-white bg-dark border-0 w-75">
        <div class="card-header text-center border-bottom border-secondary">
            <h4 class="mb-0">Editar comentario</h4>
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

                <form action="{{ route('articulos_blog.comentarios.update', [$articulo->id, $comentario->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
    
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Tu nombre</label>
                        <input type="text" name="nombre_usuario" id="nombre_usuario" class="form-control" value="{{ old('nombre_usuario', $comentario->nombre_usuario) }}" placeholder="Ej: Felipe" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $comentario->email) }}" placeholder="Ej: Felipe" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Contenido</label>
                        <textarea class="form-control" name="contenido" id="contenido" cols="30" rows="3">{{ old('contenido', $comentario->contenido) }}</textarea>
                    </div>
                    <div class="mb-3">
                        <a class="btn btn-outline-secondary ms-2" href="{{ route('articulos_blog.show', $articulo->id) }}">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection