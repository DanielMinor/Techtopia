<div class="container">
    <h1>Listado de Categorías</h1>
    <a href="{{ route('CreateCategorias') }}" class="btn btn-primary mb-3">Crear Categoría</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->nombre }}</td>
                    <td>{{ $categoria->descripcion }}</td>
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
    <!-- Aquí incluyes la vista de usuarios -->
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
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>
                        <a href="{{ route('EditUsuario', $usuario->id) }}" class="btn btn-primary">Editar/Restablecer Contraseña</a>
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
</div>

