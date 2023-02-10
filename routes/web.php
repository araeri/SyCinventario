<?php

use App\Http\Controllers\InventarioController;
use App\Http\Controllers\EquipoController;
use App\Http\Controllers\HerramientaController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\ResponsableController;
use App\Http\Controllers\MovimientoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

Route::get('/movimiento/pdf', [MovimientoController::class, 'pdf'])->name('movimiento.pdf');


Route::resource('/inventario', InventarioController::class);
Route::resource('/equipo', EquipoController::class);
Route::resource('herramienta', HerramientaController::class);
Route::resource('/vehiculo', VehiculoController::class);
Route::resource('/material', MaterialController::class);
Route::resource('/responsable', ResponsableController::class);
Route::resource('/movimiento', MovimientoController::class);
