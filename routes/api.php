<?php

use App\Http\Controllers\FormatosController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\PresentacionesController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\SanctumAuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post("/user/signin", [SanctumAuthController::class, "signin"]);
Route::post("/user/login", [SanctumAuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(SanctumAuthController::class)->group(function () {
        Route::get("/user/profile", "profile");
        Route::put("/user/modify", "modify");
        Route::put("/user/passwordchange", "passwordchange");
        Route::get("/user/logout", "logout");
        Route::delete("/user/signout", "signout");
    });
});

Route::controller(PedidosController::class)->group(function () {
    Route::get("/pedidos/{cliente_id}", "list");
    Route::get("/pedido/{pedido_id}", "detail");
    Route::post("/pedidos/nuevo", "store");
    Route::delete("/pedidos/cancelar/{pedido_id}", "cancel");
});

Route::controller(MarcasController::class)->group(function () {
    Route::get("/marcas", "list");
    Route::get("/marcas/{id}", "detail");
});

Route::controller(FormatosController::class)->group(function () {
    Route::get("/formatos", "list");
    Route::get("/formatos/{id}", "detail");
});

Route::controller(ProductosController::class)->group(function () {
    Route::get("/productos", "list");
    Route::get("/productos/{id}", "detail");
});

Route::controller(PresentacionesController::class)->group(function () {
    Route::get("/presentaciones", "list");
    Route::get("/presentaciones/{id}", "detail");
});
