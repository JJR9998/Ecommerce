@extends('layouts.app')

@section('content')
    <div class="container-fluid col-12 p-0">
        <div class="row text-center mb-3">
            <h2>Bienvenido a Nuestro Blog</h2>
            <p class="text-black-50">¿Qué deseas hacer?</p>
        </div>
        <div class="col-12">
            <div class="row d-flex justify-content-center gap-3">
                <div class="card col-md-5">
                    <div class="card-body text-center">
                        <h5 class="card-title">Categorías</h5>
                        <p class="card-text">En nuestro blog encontrarás cientos de artículos sobre distintos temas. Crea
                            miles de categorías.</p>
                        <a class="btn btn-dark" href="{{ route('categorias_blog.index') }}">Ver Categorías</a>
                    </div>
                </div>
                <div class="card col-md-5">
                    <div class="card-body text-center">
                        <h5 class="card-title">Artículos</h5>
                        <p class="card-text">En nuestro blog encontrarás cientos de artículos sobre distintos temas. Crea
                            miles de categorías.</p>
                        <a class="btn btn-dark" href="{{ route('articulos_blog.index') }}">Ver Artículos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
