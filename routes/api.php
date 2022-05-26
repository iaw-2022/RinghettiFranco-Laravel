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

    Route::controller(PedidosController::class)->group(function () {
        Route::get("/pedidos", "list");
        Route::get("/pedidos/{id}", "detail");
        Route::post("/pedidos/nuevo", "store");
        Route::delete("/pedidos/cancelar/{id}", "cancel");
    });
});

Route::get('/user/profile', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::put('/user/modify', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::put('/user/passwordchange', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::get('/user/logout', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::delete('/user/signout', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});

Route::get('/pedidos', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::get('/pedidos/{id}]', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::post('/pedidos/nuevo', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
});
Route::delete('/pedidos/cancelar/{id}', function () {
    return response()->json(['Necesita iniciar sesión para ejecutar este requerimiento.'], 405);
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
