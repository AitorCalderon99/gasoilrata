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

// Vistas con mantenimiento
Route::get("/home", [HomeController::class, "index"]);
Route::get("/consumo", [consumosController::class, "consumo"]);
Route::get("/repostajes", [repostajesController::class, "repostajes"]);
Route::get("/usuarios", [usuariosController::class, "usuarios"]);
Route::get("/vehiculos", [vehiculosController::class, "vehiculos"]);

Route::get("/editUser", [vehiculosController::class, "editUser"]);
Route::get("/registro", [vehiculosController::class, "registro"]);

// Vistas sin mantenimiento
Route::get("/login", [HomeController::class, "login"]);
Route::get("/contacto", [HomeController::class, "contacto"]);
Route::get("/calculadora", [HomeController::class, "calculadora"]);
Route::get("/ranking", [HomeController::class, "ranking"]);
