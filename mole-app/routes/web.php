<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecepcionController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\IngredienteController;
/*
|--------------------------------------------------------------------------
| Login y Logout
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
/*
|--------------------------------------------------------------------------
| Redirección raíz según rol
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    /** @var \App\Models\Usuario|null $usuario */
    $usuario = session('usuario');

    if ($usuario && isset($usuario->rol)) {
        switch ($usuario->rol) {
            case 'administrador':
                return redirect()->route('admin.dashboard');
            case 'supervisor':
                return redirect()->route('supervisor.dashboard');
            case 'capturista':
                return redirect()->route('capturista.dashboard');
        }
    }

    return redirect()->route('login');
})->name('home');

/*
|--------------------------------------------------------------------------
| Dashboard Administrador + CRUD Usuarios y Proveedores
|--------------------------------------------------------------------------
*/
Route::middleware('rol:administrador')->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/', function () {
        /** @var \App\Models\Usuario $usuario */
        $usuario = session('usuario');
        return view('admin.dashboard', compact('usuario'));
    })->name('dashboard');

    // CRUD Usuarios
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    Route::get('/usuarios/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{user}/edit', [UserController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{user}', [UserController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{user}', [UserController::class, 'destroy'])->name('usuarios.destroy');

    // CRUD Proveedores
    Route::get('/proveedores', [ProveedorController::class, 'index'])->name('proveedores.index');
    Route::get('/proveedores/create', [ProveedorController::class, 'create'])->name('proveedores.create');
    Route::post('/proveedores', [ProveedorController::class, 'store'])->name('proveedores.store');
    Route::get('/proveedores/{id}/edit', [ProveedorController::class, 'edit'])->name('proveedores.edit');
    Route::put('/proveedores/{id}', [ProveedorController::class, 'update'])->name('proveedores.update');
    Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy'])->name('proveedores.destroy');

    Route::get('/materias-primas', [InventarioController::class, 'mostrarInventarioAdmin'])->name('materias_primas.index');

      // Recepciones
    Route::get('/recepciones', [RecepcionController::class, 'indexAdmin'])->name('recepciones.index');
    Route::get('/recepcion/{recepcion}/edit', [RecepcionController::class, 'editAdmin'])->name('recepciones.edit');
    Route::put('/recepcion/{recepcion}', [RecepcionController::class, 'updateAdmin'])->name('recepciones.update');
    Route::delete('/recepcion/{recepcion}', [RecepcionController::class, 'destroyAdmin'])->name('recepciones.destroy');

      // CRUD Ingredientes
    Route::get('/ingredientes', [IngredienteController::class, 'index'])->name('ingredientes.index');
    Route::get('/ingredientes/create', [IngredienteController::class, 'create'])->name('ingredientes.create');
    Route::post('/ingredientes', [IngredienteController::class, 'store'])->name('ingredientes.store');
    Route::get('/ingredientes/{ingrediente}/edit', [IngredienteController::class, 'edit'])->name('ingredientes.edit');
    Route::put('/ingredientes/{ingrediente}', [IngredienteController::class, 'update'])->name('ingredientes.update');
    Route::delete('/ingredientes/{ingrediente}', [IngredienteController::class, 'destroy'])->name('ingredientes.destroy');



});

/*
|--------------------------------------------------------------------------
| Dashboard Supervisor
|--------------------------------------------------------------------------
*/
Route::middleware('rol:supervisor')->prefix('supervisor')->name('supervisor.')->group(function () {

    Route::get('/', function () {
        /** @var \App\Models\Usuario $usuario */
        $usuario = session('usuario');
        return view('supervisor.dashboard', compact('usuario'));
    })->name('dashboard');

    // Producción, control de calidad y otros módulos se agregarán aquí
    // Producción
    Route::get('/produccion/create', [\App\Http\Controllers\ProduccionController::class, 'create'])
        ->name('produccion.create');

    Route::post('/produccion', [\App\Http\Controllers\ProduccionController::class, 'store'])
        ->name('produccion.store');
});

/*
|--------------------------------------------------------------------------
| Dashboard Capturista + Recepciones + Inventario
|--------------------------------------------------------------------------
*/
Route::middleware('rol:capturista')->prefix('capturista')->name('capturista.')->group(function () {

    // Dashboard
    Route::get('/', function () {
        /** @var \App\Models\Usuario $usuario */
        $usuario = session('usuario');
        return view('capturista.dashboard', compact('usuario'));
    })->name('dashboard');

    // Recepciones de materias primas (capturista solo ver y registrar)
    Route::get('/recepciones', [RecepcionController::class, 'indexCapturista'])->name('recepciones.index');
    Route::get('/recepcion/create', [RecepcionController::class, 'create'])->name('recepciones.create');
    Route::post('/recepcion', [RecepcionController::class, 'store'])->name('recepciones.store');

    // Inventario de materias primas
     Route::get('/materias-primas', [InventarioController::class, 'mostrarInventarioCapturista'])->name('materias_primas.index');});
