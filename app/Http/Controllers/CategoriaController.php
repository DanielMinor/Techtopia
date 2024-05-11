<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Producto;
use Illuminate\Http\Request;
use App\Models\User;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all(); // Obtener todos los usuarios
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('CrudSupervisor', compact('usuarios', 'categorias')); // Pasar las variables a la vista
    }


    /**
     * Show the form for creating a new resource.
     */
    
    public function show(Categoria $categoria)
    {
        //
    }
    public function crud()
{
        $usuarios = User::all(); // Obtener todos los usuarios
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('CrudSupervisor', compact('usuarios', 'categorias'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function create()
    {
        return view('CreateCategorias');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
    ]);

    Categoria::create($request->only('nombre'));

    return redirect()->route('CrudSupervisor')
        ->with('success', 'Categoría creada exitosamente.');
}

public function edit($id)
{
    $categoria = Categoria::findOrFail($id);
    return view('EditCategorias', compact('categoria'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required',
    ]);

    $categoria = Categoria::find($id);
    $categoria->update($request->only('nombre'));

    return redirect()->route('CrudSupervisor')
        ->with('success', 'Categoría actualizada exitosamente.');
}
    

public function destroy($id)
{
    $categoria = Categoria::find($id);
    $categoria->delete();

    return redirect()->route('CrudSupervisor')
        ->with('success', 'Categoría eliminada exitosamente.');
}

    public function productosPorCategoria($id)
{
    $categoria = Categoria::findOrFail($id);
    $query = Producto::where('idCategoria', $id);

    $search = request('search');
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nombre', 'like', '%' . $search . '%')
              ->orWhere('descripcion', 'like', '%' . $search . '%');
        });
    }

    $productos = $query->get();

    return view('productosPorCategoria', compact('categoria', 'productos'));
}

public function productosPorCategoriaSup($id)
{
    $categoria = Categoria::findOrFail($id);
    $query = Producto::where('idCategoria', $id);

    $search = request('search');
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nombre', 'like', '%' . $search . '%')
              ->orWhere('descripcion', 'like', '%' . $search . '%');
        });
    }

    $productos = $query->get();

    return view('ProductosCategoriaSupervisor', compact('categoria', 'productos'));
}
}
