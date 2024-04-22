<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UniversidadController;
use App\Http\Controllers\TallerController;
use App\Http\Controllers\MesaController;
use App\Http\Controllers\UserController;

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

    //Listado de las universidades y sus opciones
    Route::get('/universidad', [DashboardController::class, 'showUniversity'])->name('universidad');

    // Ruta para mostrar el formulario de edición de una universidad específica
    Route::get('/universidades/{universidad}/editar', [UniversidadController::class, 'edit'])->name('editar.universidad');

    // Ruta para actualizar una universidad específica
    Route::put('/universidades/{universidad}', [UniversidadController::class, 'update'])->name('actualizar.universidad');

    // Ruta para eliminar una universidad específica
    Route::delete('/universidades/{universidad}', [UniversidadController::class, 'destroy'])->name('borrar.universidad');

    //Listado de las mesas
    Route::get('/mesa', [DashboardController::class, 'showMesas'])->name('mesa');

    //Ruta para mostrar la vista del formulario de edicion de la mesa
    Route::get('/mesas/{mesa}/editar', [MesaController::class, 'edit'])->name('editar.mesa');

    // Ruta para actualizar una mesa especifico
    Route::put('/mesas/{mesa}', [MesaController::class, 'update'])->name('actualizar.mesa');

    // Ruta para eliminar una mesa especifico
    Route::delete('/mesas/{mesa}', [MesaController::class, 'destroy'])->name('borrar.mesa');

    //Listado de los talleres
    Route::get('/taller', [DashboardController::class, 'showWorkshops'])->name('taller');

    //Ruta para mostrar la vista del formulario de edicion de talleres
    Route::get('/talleres/{taller}/editar', [TallerController::class, 'edit'])->name('editar.taller');

    // Ruta para actualizar un taller especifico
    Route::put('/talleres/{taller}', [TallerController::class, 'update'])->name('actualizar.taller');

    // Ruta para eliminar un taller especifico
    Route::delete('/talleres/{taller}', [TallerController::class, 'destroy'])->name('borrar.taller');

    Route::get('/asistencias', [DashboardController::class, 'showAsistencias'])->name('asistencias');

    //Usuarios
    Route::get('/usuarios', [DashboardController::class, 'showUsers'])->name('usuarios');
    //Eliminar Usuarios
    Route::delete('/usuarios/{usuarios}', [UserController::class, 'destroy'])->name('borrar.usuario');
    //Editar Usuario
    Route::put('usuarios/{usuarios}', [UserController::class, 'update'])->name('actualizar.usuario');
});


//Rutas publicas

//Registro al evento para la generacion de gafetes y folios
Route::get('/', [RegistroController::class, 'show'])->name('registroG');
Route::post('/', [RegistroController::class, 'registrarUsuario'])->name('registro.usuario');

//Ruta para mostrar la vista del formulario dde validacion del folio
Route::get('/validar-folio', [RegistroController::class, 'showFolioForm'])->name('validar.folio');

//Ruta para validar el folio
Route::post('/validar-folio', [RegistroController::class, 'showRegistrationForm'])->name('validar.folio');

// Ruta para manejar el envío del formulario de registro de usuario en evento
Route::get('/registro-usuario-evento', [RegistroController::class, 'showTUForm'])->name('registrar.usuario.evento');

Route::post('/registro-usuario-evento', [RegistroController::class, 'register'])->name('registrar.usuario.evento');

//Ruta para probar la vista del gafete
Route::get('/prueba-pdf', [RegistroController::class, 'testView'])->name('test.pdf');

require __DIR__.'/auth.php';
