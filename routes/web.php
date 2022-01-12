<?php

use App\Http\Controllers\consumosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\repostajesController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\vehiculosController;
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
    return view('index');
});

// Vistas sin mantenimiento
Route::get("home", [HomeController::class, "getHome"])->name("home");
Route::get("login", [HomeController::class, "login"])->name("login");
Route::get("contacto", [HomeController::class, "contacto"])->name("contacto");
Route::get("calculadora", [HomeController::class, "calculadora"])->name("calculadora");
Route::get("ranking", [HomeController::class, "ranking"])->name("ranking");

// Vistas con mantenimiento
Route::resource("consumo", ConsumosController::class);
Route::resource("repostajes", RepostajesController::class);
Route::resource("usuarios", UsuariosController::class);
Route::resource("vehiculos", VehiculosController::class);

