<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UserController;
Route::get('/', function () {
    return view('home');
});

Route::get('/login',[SessionController::class, 'create'])->name('login.index');
Route::post('/login',[SessionController::class, 'store'])->name('login.store');

//SESION SALIDA
Route::get('/logout',[SessionController::class, 'destroy'])->name('login.out');

//REGISTRAR USUARIO
Route::get('/registrar-usuario',[UserController::class, 'create'])->name('user.register');
Route::post('/agregar-usuario',[UserController::class, 'store'])->name('user.create');

//CATEGORIA CLIENTE
Route::get('/mostrar-categorias',[CategoriaController::class, 'show'])->name('ShowCategorias');


Route::get('/cliente',[RolesController::class, 'cliente'])->middleware('auth.cliente')->name('home.cliente');
Route::get('/contador',[RolesController::class, 'contador'])->middleware('auth.contador')->name('home.contador');
Route::get('/encargado',[RolesController::class, 'encargado'])->middleware('auth.encargado')->name('home.encargado');
Route::get('/supervisor',[RolesController::class, 'supervisor'])->middleware('auth.supervisor')->name('home.supervisor');
Route::get('/vendedor',[RolesController::class, 'vendedor'])->middleware('auth.vendedor')->name('home.vendedor');

Route::get('/listar-productos',[ProductoController::class, 'index'])->name('lista');
Route::get('/productos/{id}', [ProductoController::class, 'verDetalles'])->name('detalles');
Route::get('categorias', [CategoriaController::class, 'index'])->name('categorias');
Route::get('categorias/{id}/productos', [CategoriaController::class, 'productosPorCategoria'])->name('productosPorCategoria');
Route::get('supervisor/crud', [CategoriaController::class, 'crud'])->name('CrudSupervisor');

//SUPERVISOR Y ENCARGADO
// CRUD CATEGORIAS 
Route::get('categorias/create', [CategoriaController::class, 'create'])->name('CreateCategorias');
Route::post('categorias', [CategoriaController::class, 'store'])->name('StoreCategorias');
Route::get('categorias/{id}/edit', [CategoriaController::class, 'edit'])->name('EditCategorias');
Route::put('categorias/{id}', [CategoriaController::class, 'update'])->name('UpdateCategorias');
Route::delete('categorias/{id}', [CategoriaController::class, 'destroy'])->name('DestroyCategorias');
Route::get('categorias/{id}/productos-supervisor', [CategoriaController::class, 'productosPorCategoriaSup'])->name('ProductosCategoriaSupervisor');

// CRUD USUARIO 
Route::get('usuarios/create', [UsuarioController::class, 'create'])->name('CreateUsuario');
Route::post('usuarios', [UsuarioController::class, 'store'])->name('StoreUsuario');
Route::get('usuarios/{id}/edit', [UsuarioController::class, 'edit'])->name('EditUsuario');
Route::patch('usuarios/{id}/restablecer', [UsuarioController::class, 'resetPassword'])->name('ResetPassword');
Route::put('usuarios/{id}', [UsuarioController::class, 'update'])->name('UpdateUsuario');
Route::delete('usuarios/{id}', [UsuarioController::class, 'destroy'])->name('DestroyUsuario');

