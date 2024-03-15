<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Rutas para usuario registrado
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Rutas para el admin
Route::group(['middleware' => 'admin'], function () {
    Route::get('/registroU', function () {
        return view('registroU');
    })->name('registroU');
    Route::get('/registroER', function () {
        return view('registroER');
    })->name('registroER');
    Route::post('/registroU', [RegistroController::class, 'registrarUniversidad'])->name('registro.universidad');
    Route::post('/registroER', [RegistroController::class, 'registrarRol'])->name('registro.rolEvent');
});


//Rutas publicas
Route::get('/registroG', [RegistroController::class, 'show'])->name('registroG');
Route::post('/registroG', [RegistroController::class, 'registrarUsuario'])->name('registro.usuario');

require __DIR__.'/auth.php';
