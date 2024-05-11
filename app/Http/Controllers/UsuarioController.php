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

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'apellido_paterno' => 'required|string|max:255', // Añade esta regla
        'apellido_materno' => 'required|string|max:255',
        'fecha_nacimiento' => 'required|date',
        'no_telefono' => 'required|integer',
        'sexo' => 'required|in:Masculino,Femenino,Prefiero no decirlo',
        'direccion' => 'required|string|max:255',
        'rol' => 'required|in:Encargado,Cliente,Contador,Supervisor,Vendedor',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:6',
    ]);

    $user = new User();
    $user->name = $request->name;
    $user->apellido_paterno = $request->apellido_paterno;
    $user->apellido_materno = $request->apellido_materno;
    $user->fecha_nacimiento = $request->fecha_nacimiento;
    $user->no_telefono = $request->no_telefono;
    $user->sexo = $request->sexo;
    $user->direccion = $request->direccion;
    $user->rol = $request->rol;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('CrudSupervisor')->with('success', 'Usuario creado correctamente.');
}

    /**
     * Display the specified resource.
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $user = User::find($id);
    return view('EditUsuarios', compact('user'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'no_telefono' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
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
        $user->email = $request->email;
        $user->sexo = $request->sexo;
        $user->direccion = $request->direccion;
        $user->rol = $request->rol;
    
        // Solo actualiza la contraseña si se proporciona una nueva
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        } else {
            // Si no se proporciona una nueva contraseña, mostrar un mensaje de error
            return redirect()->back()->withInput()->withErrors(['password' => 'Debe introducir una contraseña para poder actualizar los datos']);
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
