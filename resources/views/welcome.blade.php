@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    @guest
        @include('auth.login')
    @endguest

    @auth
    <div class="container">
        <div class="text-center mb-4">
            <h1 class="fw-bold">¡Bienvenido!</h1>
            <p class="lead">Sistema de gestión de productos y categorías.</p>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
            </form>
        </div>

        <div class="card shadow-sm">
            <div class="card-header bg-dark text-white">
                <h4 class="mb-0">Resumen</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total de productos:</span>
                        <span class="fw-bold">{{ $totalProductos }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total de categorías:</span>
                        <span class="fw-bold">{{ $totalCategorias }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Productos con stock bajo:</span>
                        <span class="fw-bold text-danger">{{ $productosBajoStock }}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @endauth
@endsection