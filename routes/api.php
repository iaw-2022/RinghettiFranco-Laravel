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

Route::post("/signin", [SanctumAuthController::class, "signin"]);
Route::post("/login", [SanctumAuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function () {
    Route::controller(SanctumAuthController::class)->group(function () {
        Route::post("/profile", "profile");
        Route::put("/modify", "modify");
        Route::put("/passwordchange", "passwordchange");
        Route::post("/logout", "logout");
        Route::delete("/signout", "signout");
    });

    Route::controller(PedidosController::class)->group(function () {
        Route::get("/pedidos", "list");
        Route::get("/pedidos/{id}", "detail");
        Route::post("/pedidos/nuevo", "store");
        Route::get("/pedidos/cancelar/{id}", "cancel");
    });
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