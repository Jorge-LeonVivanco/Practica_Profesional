<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\InventarioController;


// Rutas de autenticación
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

// Ruta raíz redirige al login si no está autenticado
Route::get('/', function () {
    return redirect('/login');
});

// Rutas protegidas por rol: Administrador
Route::middleware('rol:administrador')->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    });
});

// Rutas protegidas por rol: Supervisor
Route::middleware('rol:supervisor')->group(function () {
    Route::get('/supervisor', function () {
        return view('supervisor.dashboard');
    });
});

// Rutas protegidas por rol: Capturista
// Rutas protegidas por rol: Capturista
Route::middleware('rol:capturista')->group(function () {
    // Ruta al dashboard del capturista
    Route::get('/capturista', function () {
        return view('capturista.dashboard');
    })->name('capturista.dashboard'); // Asignamos el nombre a esta ruta

    // Rutas de recepción de materias primas
Route::get('/capturista/recepciones', [RecepcionController::class, 'index'])->name('capturista.recepciones.index');
    Route::get('/capturista/recepcion/create', [RecepcionController::class, 'create'])->name('capturista.recepciones.create');
Route::post('/capturista/recepcion', [RecepcionController::class, 'store'])->name('capturista.recepciones.store');
    Route::get('/capturista/materias-primas', [InventarioController::class, 'mostrarInventario'])->name('capturista.materias_primas.index');
});
