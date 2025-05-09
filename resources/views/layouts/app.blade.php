<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Ecommerce</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="d-flex flex-column min-vh-100">
    <style>
       a{
        text-decoration: none; 
        color: #fff;
       }

        a.active {
            color: rgb(136, 136, 136);
        }
    </style>

    <nav class="navbar navbar-expand-lg px-4" style="background-color: #000;">

        <div class="container-fluid">
            
            <a class="navbar-brand fw-bold text-white d-flex align-items-center" href="{{ url('/') }}">
              <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 30px;" class="me-2">
            </a>
            <div class="w-25">

                <ul class="d-flex justify-content-between list-unstyled mb-0">
                    <li><a class="{{ request()->routeIs('inicio') ? 'active' : '' }}" href="{{ url('/') }}">Inicio</a></li>
                    <li><a class="{{ request()->routeIs('productos.index') ? 'active' : '' }}" href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a class="{{ request()->routeIs('categorias.index') ? 'active' : '' }}" href="{{ route('categorias.index') }}">Categorías</a></li>
                    <li><a class="{{ request()->routeIs('view-blog') ? 'active' : '' }}" href="{{ route('view-blog') }}">Blog</a></li>
                    @auth
                        <li>
                            <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Cerrar Sesión</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>

    <main class="container py-3 d-flex flex-column flex-grow-1 justify-content-center">
        @yield('content')
    </main>
 <footer class="text-white py-3" style="background-color: #000;">
    <div class="d-flex justify-content-center align-items-center">
        <p class="mb-0 me-2">&copy; {{ date('Y') }}</p>
        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 30px;">
    </div>
</footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>