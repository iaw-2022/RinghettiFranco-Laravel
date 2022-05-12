<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\FormatosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\PresentacionesController;
use App\Http\Controllers\PedidosController;


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


Route::get('/', function() {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->group(function(){
    Route::controller(MarcasController::class)->group(function(){
        Route::get('/marcas', 'index')->name('marcas-index');
        Route::get('/marcas/nuevo', 'create')->name('marcas-create');
        Route::post('/marcas/guardar', 'store')->name('marcas-store');
        Route::get('/marcas/editar/{id}', 'edit')->name('marcas-edit');
        Route::patch('/marcas/modificar/{id}', 'update')->name('marcas-update');
        Route::get('/marcas/eliminar/{id}', 'destroy')->name('marcas-delete');
    });
    
    Route::controller(ClientesController::class)->group(function(){
        Route::get('/clientes', 'index')->name('clientes-index');
        Route::get('/clientes/nuevo', 'create')->name('clientes-create');
        Route::post('/clientes/guardar', 'store')->name('clientes-store');
        Route::get('/clientes/mostrar/{id}', 'show')->name('clientes-show');
        Route::get('/clientes/editar/{id}', 'edit')->name('clientes-edit');
        Route::patch('/clientes/modificar/{id}', 'update')->name('clientes-update');
        Route::get('/clientes/eliminar/{id}', 'destroy')->name('clientes-delete');
    });

    Route::controller(FormatosController::class)->group(function(){
        Route::get('/formatos', 'index')->name('formatos-index');
        Route::get('/formatos/nuevo', 'create')->name('formatos-create');
        Route::post('/formatos/guardar', 'store')->name('formatos-store');
        Route::get('/formatos/editar/{id}', 'edit')->name('formatos-edit');
        Route::patch('/formatos/modificar/{id}', 'update')->name('formatos-update');
        Route::get('/formatos/eliminar/{id}', 'destroy')->name('formatos-delete');
    });

    Route::controller(ProductosController::class)->group(function(){
        Route::get('/productos', 'index')->name('productos-index');
        Route::get('/productos/nuevo', 'create')->name('productos-create');
        Route::post('/productos/guardar', 'store')->name('productos-store');
        Route::get('/productos/editar/{id}', 'edit')->name('productos-edit');
        Route::patch('/productos/modificar/{id}', 'update')->name('productos-update');
        Route::get('/productos/eliminar/{id}', 'destroy')->name('productos-delete');
    });
    
    Route::controller(PresentacionesController::class)->group(function(){
        Route::get('/presentaciones', 'index')->name('presentaciones-index');
        Route::get('/presentaciones/nuevo', 'create')->name('presentaciones-create');
        Route::post('/presentaciones/guardar', 'store')->name('presentaciones-store');
        Route::get('/presentaciones/editar/{id}', 'edit')->name('presentaciones-edit');
        Route::patch('/presentaciones/modificar/{id}', 'update')->name('presentaciones-update');
        Route::get('/presentaciones/eliminar/{id}', 'destroy')->name('presentaciones-delete');
    });

    Route::controller(PedidosController::class)->group(function(){
        Route::get('/pedidos', 'index')->name('pedidos-index');
        Route::get('/pedidos/nuevo', 'create')->name('pedidos-create');
        Route::post('/pedidos/guardar', 'store')->name('pedidos-store');
        Route::get('/pedidos/mostrar/{id}', 'show')->name('pedidos-show');
        Route::get('/pedidos/editar/{id}', 'edit')->name('pedidos-edit');
        Route::patch('/pedidos/modificar/{id}', 'update')->name('pedidos-update');
        Route::get('/pedidos/eliminar/{id}', 'destroy')->name('pedidos-delete');
    });
});

require __DIR__.'/auth.php';
