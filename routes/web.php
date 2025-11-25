<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ConsultasMedicasController;
use App\Http\Controllers\ImagenesController;

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación
|--------------------------------------------------------------------------
*/

// Login
Route::get('/', [AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::get('/login', [AuthController::class, 'loginForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return redirect()->route('dashboard');
})->middleware('auth')->name('home');

/*
|--------------------------------------------------------------------------
| Rutas protegidas por LOGIN
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Subida y eliminación de imágenes (todos los usuarios autenticados)
    Route::post('/imagenes', [ImagenesController::class, 'store'])->name('imagenes.store');
    Route::delete('/imagenes/{id}', [ImagenesController::class, 'destroy'])->name('imagenes.destroy');
});

/*
|--------------------------------------------------------------------------
| Rutas SOLO Administrador
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:ADMINISTRADOR'])->group(function () {

    Route::resource('medicos', MedicosController::class);
    Route::resource('pacientes', PacientesController::class);
    Route::resource('consultas_medicas', ConsultasMedicasController::class);

});

/*
|--------------------------------------------------------------------------
| Rutas SOLO Médico
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:MEDICO'])->group(function () {

    // Puede ver pacientes y consultas
    Route::resource('pacientes', PacientesController::class)->only(['index', 'show']);
    Route::resource('consultas_medicas', ConsultasMedicasController::class)->only(['index', 'show']);

});

/*
|--------------------------------------------------------------------------
| Rutas SOLO Paciente
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:PACIENTE'])->group(function () {

    Route::get('/mis_consultas', [ConsultasMedicasController::class, 'misConsultas'])
        ->name('consultas.medicas.mias');

});
