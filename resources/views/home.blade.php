@extends('layouts.app')

@section('contenido')
    

        @if(auth()->check())
        <h1>Bienvenido a tu página de inicio, {{auth()->user()->name}}</h1>
        <p>tu rol es -----> {{auth()->user()->rol}}</p>
        <p>HOLAAA</p>

        @else
        <!-- Contenido específico de la página de inicio -->
        <h1>Bienvenido a tu página de inicio</h1>
        <p>Este es el contenido de la página de inicio.</p>
        <p>HOLAAA</p>
        <!-- Agrega más contenido según sea necesario -->
        @endif
@endsection
