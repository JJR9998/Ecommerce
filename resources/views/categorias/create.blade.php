@extends('layouts.app')

@section('title', 'Crear Categoría')

@section('content')
<div class="d-flex justify-content-center align-items-center">
    <div class="card text-white bg-dark border-0 rounded-4 w-75">
        <div class="card-header text-center">
            <h4 class="mb-0">Crear Categoria</h4>
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

                <form action="{{ route('categorias.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label>Nombre:</label>
                        <input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}"  required>
                    </div>
                    <div class="mb-3">
                        <label>Descripción:</label>
                        <textarea name="descripcion" class="form-control" required>{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="text-end">
                        <a class="btn btn-secondary" href="{{ route('categorias.index') }}">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection