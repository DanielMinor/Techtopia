<!-- resources/views/categorias/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <p>¡Bienvenido al sistema de gestión de categorías!</p>
        <a href="{{ route('CrudCategorias') }}" class="btn btn-primary mb-3">Crear Categoría</a>
    </div>
@endsection
