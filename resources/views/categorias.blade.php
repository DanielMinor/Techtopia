<!-- categorias.blade.php -->

@extends('layouts.app')

@section('contenido')
    <h1>Listado de Categorías</h1>
        @foreach($categorias as $categoria)
            <a href="{{ route('productosPorCategoria', $categoria->id) }}" class="list-group-item list-group-item-action">{{ $categoria->nombre }}</a>
        @endforeach
@endsection