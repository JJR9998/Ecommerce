@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card text-white bg-dark border-0 w-75">
        <div class="card-header text-center border-bottom border-secondary">
            <h4 class="mb-0">Crear Categorias-Blog</h4>
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

                <form action="{{ route('categorias_blog.update', $categorias_blog->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre', $categorias_blog->nombre) }}" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3">{{ old('descripcion', $categorias_blog->descripcion) }}</textarea>
    </div>
    
    <div class="mb-3">
        <a class="btn btn-outline-secondary ms-2" href="{{ route('categorias_blog.index') }}">Cancelar</a>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </div>
</form>

            </div>
        </div>
    </div>
</div>
@endsection