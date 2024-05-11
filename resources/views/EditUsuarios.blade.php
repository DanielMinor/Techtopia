<div class="container">
    <h1>Editar Usuario</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('UpdateUsuario', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
        </div>
        <div class="form-group">
            <label for="apellido_paterno">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" value="{{ $user->apellido_paterno }}" required>
        </div>
        <div class="form-group">
            <label for="apellido_materno">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" value="{{ $user->apellido_materno }}" required>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $user->fecha_nacimiento }}" required>
        </div>
        <div class="form-group">
            <label for="no_telefono">Teléfono</label>
            <input type="text" class="form-control" id="no_telefono" name="no_telefono" value="{{ $user->no_telefono }}" required>
        </div>
        <div class="form-group">
            <label for="sexo">Sexo</label>
            <select class="form-control" id="sexo" name="sexo" required>
                <option value="Masculino" {{ $user->sexo === 'Masculino' ? 'selected' : '' }}>Masculino</option>
                <option value="Femenino" {{ $user->sexo === 'Femenino' ? 'selected' : '' }}>Femenino</option>
            </select>
        </div>
        <div class="form-group">
            <label for="direccion">Dirección</label>
            <textarea class="form-control" id="direccion" name="direccion" required>{{ $user->direccion }}</textarea>
        </div>
        <div class="form-group">
            <label for="rol">Rol</label>
            <select class="form-control" id="rol" name="rol" required>
                <option value="Encargado" {{ $user->rol === 'Encargado' ? 'selected' : '' }}>Encargado</option>
                <option value="Cliente" {{ $user->rol === 'Cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="Contador" {{ $user->rol === 'Contador' ? 'selected' : '' }}>Contador</option>
                <option value="Supervisor" {{ $user->rol === 'Supervisor' ? 'selected' : '' }}>Supervisor</option>
                <option value="Vendedor" {{ $user->rol === 'Vendedor' ? 'selected' : '' }}>Vendedor</option>
            </select>
        </div>
        <div class="form-group">
            <label for="email">Correo Electronico</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email}}" required>
        </div>
        <h1>Restablecer Contraseña</h1>
        <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>




