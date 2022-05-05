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
    });
    
    Route::controller(ClientesController::class)->group(function(){
        Route::get('/clientes', 'index')->name('clientes-index');
        Route::get('/clientes/nuevo', 'create')->name('clientes-create');
        Route::get('/clientes/{id}', 'show')->name('clientes-show');
        Route::post('/clientes', 'store')->name('clientes-store');
    });

    Route::controller(FormatosController::class)->group(function(){
        Route::get('/formatos', 'index')->name('formatos-index');
    });

    Route::controller(ProductosController::class)->group(function(){
        Route::get('/productos', 'index')->name('productos-index');
    });
    
    Route::controller(PresentacionesController::class)->group(function(){
        Route::get('/presentaciones', 'index')->name('presentaciones-index');
    });

    Route::controller(PedidosController::class)->group(function(){
        Route::get('/pedidos', 'index')->name('pedidos-index');
    });
});

require __DIR__.'/auth.php';
