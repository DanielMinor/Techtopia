@extends('layouts.app')
@section('contenido')

    <body>
        <div class="container">
            <h1>Listado de Productos</h1>
            <div class="row">
                @foreach($productos as $producto)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">{{ $producto->descripcion }}</p>
                            <p class="card-text">Stock: {{ $producto->stock }}</p>
                            <p class="card-text">Categoria: {{ $producto->categoria->nombre }}</p>
                            <p class="card-text">Confirmado: {{ $producto->confirmado ? 'Sí' : 'No' }}</p>
                            <p class="card-text">Usuario: {{ $producto->user->name }}</p>

                            <a href="{{ route('detalles', $producto->id) }}" class="btn btn-primary">Ver Detalles</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Incluir Bootstrap JS y jQuery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>

</html>
@endsection
