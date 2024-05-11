@extends('layouts.app')
@section('contenido')
<div class="container">
    @if (Auth::user()->rol === 'Supervisor')
        <!-- Sección para el Supervisor -->
        <h1>Listado de Categorías</h1>
        <a href="{{ route('CreateCategorias') }}" class="btn btn-primary mb-3">Crear Categoría</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('ProductosCategoriaSupervisor', $categoria->id) }}" class="btn btn-primary">Ver Productos</a>
                            <a href="{{ route('EditCategorias', $categoria->id) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('DestroyCategorias', $categoria->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <h1>Listado de Usuarios</h1>
        <a href="{{ route('CreateUsuario') }}" class="btn btn-primary mb-3">Crear Usuario</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuariosSupervisor as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                        <form id="formEditarUsuario" action="{{ route('EditUsuario', $usuario->id) }}" method="GET" style="display: none;">
                            @csrf
                            <input type="hidden" name="modo" value="editar">
                        </form>
                        <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('formEditarUsuario').submit();">Editar</a>

                        <form id="formRestablecerUsuario" action="{{ route('EditUsuario', $usuario->id) }}" method="GET" style="display: none;">
                            @csrf
                            <input type="hidden" name="modo" value="restablecer">
                        </form>
                        <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('formRestablecerUsuario').submit();">Restablecer Contraseña</a>
                            <form action="{{ route('DestroyUsuario', $usuario->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif (Auth::user()->rol === 'Encargado')
        <!-- Sección para el Encargado -->
        <h1>Bienvenido Encargado</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                    <tr>
                        <td>{{ $categoria->id }}</td>
                        <td>{{ $categoria->nombre }}</td>
                        <td>
                            <a href="{{ route('ProductosCategoriaSupervisor', $categoria->id) }}" class="btn btn-primary">Ver Productos</a>
                             </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </table>
        <h1>Listado de Usuarios</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuariosEncargado as $usuario)
                    <tr>
                        <td>{{ $usuario->id }}</td>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>
                        <form id="formEditarUsuario" action="{{ route('EditUsuario', $usuario->id) }}" method="GET" style="display: none;">
                            @csrf
                            <input type="hidden" name="modo" value="editar">
                        </form>
                        <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('formEditarUsuario').submit();">Editar</a>
                        <form id="formRestablecerUsuario" action="{{ route('EditUsuario', $usuario->id) }}" method="GET" style="display: none;">
                            @csrf
                            <input type="hidden" name="modo" value="restablecer">
                        </form>
                        <a href="#" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('formRestablecerUsuario').submit();">Restablecer Contraseña</a><form action="{{ route('DestroyUsuario', $usuario->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

