<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CrearRepostajesController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsumosController;
use App\Http\Controllers\CalculadoraController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\RepostajesController;
use App\Http\Controllers\VehiculosController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('contacto', function () {
    return view('contacto');
});

Route::get('avisolegal', function () {
    return view('avisolegal');
});
Route::get('editUser', function () {
    return view('editarUsuario');
});

Route::get('login', [AuthenticatedSessionController::class, "create"]);
Route::get('register', [RegisteredUserController::class, "create"]);

// Vistas con mantenimiento
//Lo de las comillas es como tenemos que llamarlo en el href para que funcione
Route::resource("consumo", ConsumosController::class);
Route::resource("crearRepostajes", CrearRepostajesController::class);
Route::resource("ranking", RankingController::class);
Route::resource("calculadora", CalculadoraController::class);
Route::resource("repostajes", RepostajesController::class);
Route::resource("editarUsuario", UsuariosController::class);
Route::resource("vehiculos", VehiculosController::class);
Route::resource("usuarios", UsuariosController::class);
Route::put('usuarios', [UsuariosController::class, 'update']);

// Route::post("/vehiculos", [VehiculosController::class, "store"]);

require __DIR__.'/auth.php';
