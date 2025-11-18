<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaMedicaController;

// Mostrar login cuando se abre el proyecto
Route::get('/', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas protegidas
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('medicos', MedicoController::class);
    Route::resource('pacientes', PacienteController::class);
    Route::resource('consultas_medicas', ConsultaMedicaController::class);
    Route::post('/imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');
    Route::delete('/imagenes/{id}', [ImagenesController::class, 'destroy'])->name('imagenes.destroy');

});








