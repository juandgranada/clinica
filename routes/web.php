<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ConsultasMedicasController;
use App\Http\Controllers\ImagenesController;

// Login
Route::get('/', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', function () {
    return redirect()->route('dashboard');
})->middleware('auth')->name('home');

// Rutas protegidas
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('medicos', MedicosController::class);
    Route::resource('pacientes', PacientesController::class);
    Route::resource('consultas_medicas', ConsultasMedicasController::class);

    Route::post('/imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');
    Route::delete('/imagenes/{id}', [ImagenesController::class, 'destroy'])->name('imagenes.destroy');
});
