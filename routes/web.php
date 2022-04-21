<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Navigation\ProductsController;
use App\Http\Controllers\Navigation\OrdersController;
use App\Http\Controllers\Navigation\ClientsController;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::controller(ProductsController::class)->group(function(){
    Route::get('/marcas', 'index')->middleware(['auth'])->name('dashboard');
    Route::get('/marcas/{marca}/{producto?}', 'view')->middleware(['auth'])->name('dashboard');
});

Route::controller(ClientsController::class)->group(function(){
    Route::get('/clientes', 'index')->middleware(['auth'])->name('dashboard');
    Route::get('/clientes/{cliente}', 'view')->middleware(['auth'])->name('dashboard');
});

Route::controller(OrdersController::class)->group(function(){
    Route::get('/pedidos', 'index')->middleware(['auth'])->name('dashboard');
    Route::get('/pedidos/{pedido}', 'view')->middleware(['auth'])->name('dashboard');
});

require __DIR__.'/auth.php';
