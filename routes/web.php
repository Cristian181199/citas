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

Route::group(['middleware' => 'auth'], function() {

    Route::get('/dashboard', function () {
        if (Auth::user()->esEspecialista()) {
            return redirect()->route('dashboard-especialista');
        } elseif (Auth::user()->esAdmin()) {
            return redirect()->route('dashboard-admin');
        } else {
        return view('dashboard');
        }
    })->name('dashboard');

    Route::get('/dashboard-especialista', function () {
        Gate::authorize('dashboard-especialista');
        return view('dashboard-especialista');
    })->name('dashboard-especialista');

    Route::get('/dashboard-admin', function () {
        Gate::authorize('dashboard-admin');
        return view('dashboard-admin');
    })->name('dashboard-admin');


    Route::view('profile', 'profile')
        ->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])
        ->name('profile.update');


    //Route::view('gestion-citas', 'gestion-citas')
        //->name('dashboard-citas');

    Route::get('/gestion-citas', function () {
            Gate::authorize('gestion-citas');
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

require __DIR__.'/auth.php';
