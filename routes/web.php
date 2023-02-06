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

Route::resource('/inventario', InventarioController::class);
Route::resource('/equipo', EquipoController::class);
Route::resource('/herramienta', HerramientaController::class);
Route::resource('/vehiculo', VehiculoController::class);
Route::resource('/material', MaterialController::class);
Route::resource('/responsable', ResponsableController::class);
Route::resource('/movimiento', MovimientoController::class);