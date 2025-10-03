<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicosController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ConsultasMedicasController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí registras todas las rutas web de tu aplicación.
| Estas rutas son cargadas por RouteServiceProvider y
| todas estarán bajo el middleware "web".
|
*/

// Ruta por defecto (pantalla inicial de Laravel)
Route::get('/', function () {
    return view('layouts.app'); // Mostrará el menú con tu layout
});


Route::resource('medicos', MedicosController::class); //CRUD medicos
Route::resource('pacientes', PacientesController::class); //CRUD pacientes
Route::resource('consultas_medicas', ConsultasMedicasController::class); //CRUD consultas medicas

