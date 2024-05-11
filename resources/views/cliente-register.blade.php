@extends('layouts.app')

@section('contenido')
<br><br>
<form action="{{ route('user.create') }}" method="POST">
    @csrf

    <label for="name">Nombre:</label>
    <input type="text" id="name" name="name" required><br>

    <label for="apellido_paterno">Apellido Paterno:</label>
    <input type="text" id="apellido_paterno" name="apellido_paterno" required><br>

    <label for="apellido_materno">Apellido Materno:</label>
    <input type="text" id="apellido_materno" name="apellido_materno" required><br>

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

    <label for="no_telefono">Número de Teléfono:</label>
    <input type="text" id="no_telefono" name="no_telefono" required><br>

    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="Prefiero no decirlo">Otro</option>
    </select><br>

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" required><br>
    @if(auth()->check())
        @if(auth()->user()->rol === 'Supervisor')
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="Cliente">Cliente</option>
                <option value="Vendedor">Vendedor</option>
                <option value="Encargado">Encargado</option>
                <option value="Contador">Contador</option>
                <option value="Supervisor" selected>Supervisor</option>
            </select><br>
        @elseif(auth()->user()->rol === 'Encargado')
            <label for="rol">Rol:</label>
            <select id="rol" name="rol" required>
                <option value="Cliente">Cliente</option>
                <option value="Vendedor">Vendedor</option>
            </select><br>
        @else
            <input type="hidden" id="rol" name="rol" value="Cliente">
        @endif
    @else
        <input type="hidden" id="rol" name="rol" value="Cliente">
    @endif

    

    <label for="email">Email:</label>
    <input type="text" id="email" name="email" required><br>

    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required><br>

    <button type="submit">Registrar Usuario</button>
</form>

@endsection

