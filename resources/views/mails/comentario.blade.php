<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <title>Nuevo Comentario</title>
</head>
<body>
    <div class="container">
        <div class="card rounded-3">
            <div class="card-header bg-primary text-white">
                <h2>¡Recibiste un nuevo comentario en el articulo <strong>{{ $articulo->titulo }}</strong>!</h2>
            </div>
            <div class="card-body">
                <p><strong>Usuario: </strong>{{ $comentario->nombre_usuario }}</p>
                <p><strong>Email: </strong>{{ $comentario->email }}</p>
                <p><strong>Contenido: </strong>{{ $comentario->contenido }}</p>
                <a href="{{ route('articulos_blog.show', $articulo->id) }}" class="btn btn-primary mt-3">
                    Ver Producto
                </a>
            </div>
        </div>
    </div>
</body>
</html>