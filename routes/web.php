<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\RouteGroup;
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
    return view('welcome');
});

// Grupo de rutas con el middleware auth ya que se repetia en varias.
Route::middleware(['auth'])->group(function () {

    // Controla que el usuario que inicia sesion es especialista / admin / paciente y lo redirecciona a su dashboard
    Route::get('/dashboard', function () {
        if (Auth::user()->esEspecialista()) {
            return redirect()->route('dashboard-especialista');
        } elseif (Auth::user()->esAdmin()) {
            return redirect()->route('dashboard-admin');
        } else {
        return view('dashboard');
        }
    })->name('dashboard');

    // Ruta para el dashboard cuando el usuario que inicia sesion es especialista.
    Route::get('/dashboard-especialista', function () {
        //Gate::authorize('dashboard-especialista');
        return view('dashboard-especialista');
    })->middleware(['can:dashboard-especialista'])->name('dashboard-especialista');

    // Ruta para el dashboard cuando el usuario que inicia sesion es admin.
    Route::get('/dashboard-admin', function () {
        //Gate::authorize('dashboard-admin');
        return view('dashboard-admin');
    })->middleware(['can:dashboard-admin'])->name('dashboard-admin');

    // Rutas para gestionar el perfil de cada usuario.
    Route::view('profile', 'profile')
    ->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])
    ->name('profile.update');

});




// Grupo de rutas para los usuarios que deben estar autenticados y deben ser pacientes para pasar por el gate.
Route::middleware(['auth', 'can:dashboard-paciente'])->group(function () {

    Route::get('/gestion-citas', function () {
            return view('gestion-citas');
        })->name('dashboard-citas');

    Route::get('/citas', [CitaController::class, 'index'])
        ->name('ver-citas');

    Route::get('/cita/create', [CitaController::class, 'create'])
        ->name('crear-cita');

    Route::delete('/cita/{cita}', [CitaController::class, 'destroy'])
        ->name('anular-cita');

    Route::get('/cita/create/{compania}', [CitaController::class, 'createEspecialidad'])
        ->name('crear-cita-especialidad');

    Route::get('/cita/create/{compania}/{especialidad}', [CitaController::class, 'createEspecialista'])
        ->name('crear-cita-especialista');

    Route::get('/cita/create/{compania}/{especialidad}/{especialista:id}', [CitaController::class, 'createFechaHora'])
        ->where('especialista', '[0-9]+')
        ->name('crear-cita-fechaHora');

    Route::get('/cita/create/{compania}/{cita}/confirmar', [CitaController::class, 'createConfirmar'])
        ->name('crear-cita-confirmar');

    Route::put('/cita/create/{compania}/{cita}/confirmar', [CitaController::class, 'guardarCita'])
        ->name('guardar-cita');

});

Route::middleware(['auth', 'can:dashboard-especialista'])->group(function () {
    Route::get('/especialistas/citas', [CitaController::class, 'especialistasIndex'])
        ->name('especialistas-ver-citas');
});

require __DIR__.'/auth.php';
