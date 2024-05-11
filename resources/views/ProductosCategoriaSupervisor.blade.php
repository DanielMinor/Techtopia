<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos por Categoría</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados */
        .card {
            margin-bottom: 20px; /* Espacio entre tarjetas */
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Productos de la Categoría {{ $categoria->nombre }}</h1>

        <!-- Botón para regresar a categorías -->
        <a href="{{ route('categorias') }}" class="btn btn-secondary mb-4">Volver a Categorías</a>

        <!-- Formulario de búsqueda -->
        <form action="{{ route('productosPorCategoria', $categoria->id) }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Buscar producto..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Confirmado</th>
                    <th>Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>{{ $producto->confirmado ? 'Sí' : 'No' }}</td>
                        <td>{{ $producto->user->name }}</td>
                        <td>
                            <a href="{{ route('detalles', $producto->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Incluir Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
