<?php

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get("contacto", [HomeController::class, "contacto"])->name("contacto");

// Vistas con mantenimiento
Route::resource("consumo", \App\Http\Controllers\ConsumosController::class);
Route::resource("ranking", \App\Http\Controllers\ConsumosController::class);
Route::resource("calculadora", \App\Http\Controllers\ConsumosController::class);
Route::resource("repostajes", \App\Http\Controllers\RepostajesController::class);
Route::resource("usuarios", \App\Http\Controllers\UsuariosController::class);
Route::resource("vehiculos", \App\Http\Controllers\VehiculosController::class);


require __DIR__.'/auth.php';
