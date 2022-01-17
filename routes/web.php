<?php

use Illuminate\Support\Facades\Auth;
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
})->middleware(['auth'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('contacto', function () {
    return view('contacto');
});

Route::get('login', [\App\Http\Controllers\Auth\AuthenticatedSessionController::class, "create"]);
Route::get('registrarse', [\App\Http\Controllers\Auth\RegisteredUserController::class, "create"]);

// Vistas con mantenimiento
//Lo de las comillas es como tenemos que llamarlo en el href para que funcione
Route::resource("consumo", \App\Http\Controllers\ConsumosController::class);
Route::resource("ranking", \App\Http\Controllers\RankingController::class);
Route::resource("calculadora", \App\Http\Controllers\CalculadoraController::class);
Route::resource("repostajes", \App\Http\Controllers\RepostajesController::class);
Route::resource("editarUsuario", \App\Http\Controllers\UsuariosController::class);
Route::resource("vehiculos", \App\Http\Controllers\VehiculosController::class);

require __DIR__.'/auth.php';
