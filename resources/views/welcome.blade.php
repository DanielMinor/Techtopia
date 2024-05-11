@extends('layouts.app')
@section('contenido')
<head>
    <title>INCIO DE SESION</title>
</head>
<body>
    <hr><hr>
    <h1>INICIO DE SESION</h1>
    <form action="" method="POST">
        @csrf
        <label>Correo Electronico</label>
        <input type="text" name="email">
        <br>
        <label>Contrasena</label>
        <input type="password" name="password">
        <br>
        <input type="submit" value="Enviar">
    </form>
</body>

@endsection