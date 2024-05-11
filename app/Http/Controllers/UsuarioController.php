<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Models\User;
use App\Models\Categoria;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    
    public function index()
    {
        $usuarios = User::all(); // Obtener todos los usuarios
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('CrudSupervisor', compact('usuarios', 'categorias'));
    }

    public function create()
    {
        return view('CreateUsuario');
    }

    public function store(Request $request, $id)
{
    $user = User::find($id);

    // Verificar si se enviaron datos del formulario
    if ($request->filled('name')) {
        $modo = 'editar';
    } elseif ($request->filled('password')) {
        $modo = 'restablecer';
    }
    // Pasar la variable $modo a la vista
    return view('editUsuarios', ['user' => $user, 'modo' => $modo]);    
}

    
public function edit(Request $request, $id)
{
    $user = User::find($id);
    $modo = $request->input('modo', 'editar'); // Valor por defecto: 'editar'

    return view('editUsuarios', ['user' => $user, 'modo' => $modo]);
}





    public function show(Request $request, $id)
{
    if ($request->isMethod('get')) {
        $user = User::find($id);
        return view('editUsuarios', ['user' => $user, 'modo' => 'editar']);
    } elseif ($request->isMethod('patch')) {
        $user = User::find($id);
        return view('editUsuarios', ['user' => $user, 'modo' => 'restablecer']);
    }
}


public function resetPassword(Request $request, $id)
{
    $request->validate([
        'password' => 'required|string|min:8', // La nueva contraseña debe tener al menos 8 caracteres
    ]);

    $user = User::find($id);
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('CrudSupervisor')->with('success', 'Contraseña restablecida correctamente.');
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'apellido_paterno' => 'required|string|max:255',
        'apellido_materno' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'no_telefono' => 'required|string|max:255',
        'sexo' => 'required|in:Masculino,Femenino,Prefiero no decirlo',
        'direccion' => 'required|string|max:255',
        'rol' => 'required|in:Encargado,Cliente,Contador,Supervisor,Vendedor',
        'password' => 'nullable|string|min:8', // La contraseña es opcional, pero debe tener al menos 8 caracteres si se proporciona
    ]);

    $user = User::find($id);
    $user->name = $request->name;
    $user->apellido_paterno = $request->apellido_paterno;
    $user->apellido_materno = $request->apellido_materno;
    $user->fecha_nacimiento = $request->fecha_nacimiento;
    $user->no_telefono = $request->no_telefono;
    $user->sexo = $request->sexo;
    $user->direccion = $request->direccion;
    $user->rol = $request->rol;

    // Solo actualiza la contraseña si se proporciona una nueva
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    $user->save();

    return redirect()->route('CrudSupervisor')->with('success', 'Usuario actualizado correctamente.');
}



    public function destroy($id)
{
    $usuario = User::findOrFail($id);
    $usuario->delete();
    return redirect()->route('CrudSupervisor')->with('success', 'Usuario eliminado correctamente.');
}
}
