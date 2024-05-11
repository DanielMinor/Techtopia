<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Request\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function create(Request $request) //crear 1
    {
        return view('cliente-register');
    }
    public function store(Request $request)
    {
        //
        $valores = $request->all();
        dump($valores);
        $nuevo = new User();
        $nuevo->name = $valores['name'];
        $nuevo->apellido_paterno = $valores['apellido_paterno'];
        $nuevo->apellido_materno = $valores['apellido_materno'];
        $nuevo->fecha_nacimiento = $valores['fecha_nacimiento'];
        $nuevo->no_telefono = $valores['no_telefono'];
        $nuevo->sexo = $valores['sexo'];
        $nuevo->direccion = $valores['direccion'];
        $nuevo->rol = $valores['rol'];
        $nuevo->email = $valores['email'];
        $nuevo->password = $valores['password'];
        $nuevo->save();
        return redirect(route('login.index'));

    }


}
