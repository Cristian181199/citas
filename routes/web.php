<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\RouteGroup;
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
        return view('dashboard');
    })->name('dashboard');

    Route::view('profile', 'profile')->name('profile');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::view('gestion-citas', 'gestion-citas')->name('dashboard-citas');
    Route::get('/citas', [CitaController::class, 'index'])->name('ver-citas');
    Route::get('/cita/create', [CitaController::class, 'create'])->name('crear-cita');
    Route::delete('/cita/{cita}', [CitaController::class, 'destroy'])->name('anular-cita');
    Route::get('/cita/create/{compania}', [CitaController::class, 'createEspecialidad'])->name('crear-cita-especialidad');
    Route::get('/cita/create/{compania}/{especialidad}', [CitaController::class, 'createEspecialista'])->name('crear-cita-especialista');
    Route::get('/cita/create/{compania}/{especialidad}/{especialista}', [CitaController::class, 'createFechaHora'])->name('crear-cita-fechaHora');


});

require __DIR__.'/auth.php';
