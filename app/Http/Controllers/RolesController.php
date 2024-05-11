<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Categoria;

use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function cliente(){
        return view('Cliente');
    }
    public function contador(){
        return view('contador');
    }
    public function encargado(){
        return 'encargado';
    }
    public function supervisor(){
        $usuarios = User::all(); // Obtener todos los usuarios
        $categorias = Categoria::all(); // Obtener todas las categorías
        return view('CrudSupervisor', compact('usuarios', 'categorias'));
    }
    public function vendedor(){
        return 'vendedor';
    }
}
