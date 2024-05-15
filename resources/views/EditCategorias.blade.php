<div class="container">
    <h1>Editar Categoría</h1>
    <form action="{{ route('UpdateCategorias', $categoria->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $categoria->nombre }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>


