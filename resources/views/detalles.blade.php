@extends('layouts.app')
@section('contenido')

<body>
    <div class="container">
        <h1>Detalles del Producto</h1>
        <div class="card">
            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
            <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <p class="card-text">Stock: {{ $producto->stock }}</p>
                <p class="card-text">Categoria: {{ $producto->categoria->nombre }}</p>
                <p class="card-text">Confirmado: {{ $producto->confirmado ? 'Sí' : 'No' }}</p>
                <p class="card-text">Usuario: {{ $producto->user->name }}</p>
            </div>
        </div>

        <div class="card mt-4">
    <div class="card-body">
        <h5 class="card-title">Preguntas y Respuestas</h5>
        @if ($producto->preguntas->isEmpty())
            <p>No hay preguntas ni respuestas.</p>
        @else
            @foreach ($producto->preguntas as $pregunta)
                <h6>{{ $pregunta->contenido }}</h6>
                <p>Pregunta realizada por: Usuario 5
                    @if ($pregunta->user)
                        {{ $pregunta->user->name }}
                    @endif
                </p>
                <ul>
                    @foreach ($pregunta->respuestas as $respuesta)
                        <li>{{ $respuesta->contenido }}</li>
                        <p>Respuesta de:
                            @if ($respuesta->usuario)
                                {{ $respuesta->usuario->name }}
                            @endif
                        </p>
                    @endforeach
                </ul>
            @endforeach
        @endif
    </div>
</div>

        


    </div>

    <!-- Incluir Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

@extends('layouts.app')
@section('contenido')
@endsection