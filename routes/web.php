<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\DashboardController;

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
    Route::get('/registroT', function () {
        return view('registroT');
    })->name('registroT');
    Route::post('/registroU', [RegistroController::class, 'registrarUniversidad'])->name('registro.universidad');
    Route::post('/registroT', [RegistroController::class, 'registrarTaller'])->name('registro.taller');
    Route::post('/registroER', [RegistroController::class, 'registrarRol'])->name('registro.rolEvent');

    //Panel de Control
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Listado de las universidades
    Route::get('/universidad', [DashboardController::class, 'showUniversity'])->name('universidad');

    //Listado de los roles
    Route::get('/rol', [DashboardController::class, 'showRoles'])->name('rol');

    //Listado de los eventos
    Route::get('/evento', [DashboardController::class, 'showEvents'])->name('evento');

    //Listado de los talleres
    Route::get('/taller', [DashboardController::class, 'showWorkshops'])->name('taller');

});


//Rutas publicas

//Registro al evento para la generacion de gafetes y folios
Route::get('/registroG', [RegistroController::class, 'show'])->name('registroG');
Route::post('/registroG', [RegistroController::class, 'registrarUsuario'])->name('registro.usuario');

// Ruta para mostrar el formulario de registro de usuario en evento
Route::get('/registro-usuario-evento', [RegistroController::class, 'showRegistrationForm'])->name('registro.usuario.evento');

// Ruta para manejar el envío del formulario de registro de usuario en evento
Route::post('/registro-usuario-evento', [RegistroController::class, 'register'])->name('registrar.usuario.evento');

require __DIR__.'/auth.php';
