<?php

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
});
