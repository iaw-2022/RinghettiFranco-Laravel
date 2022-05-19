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

Route::post("/register", [SanctumAuthController::class, "register"]);
Route::post("/login", [SanctumAuthController::class, "login"]);

Route::middleware('auth:sanctum')->group(function(){
    Route::post("/profile", [SanctumAuthController::class, "profile"]);  
    Route::post("/logout", [SanctumAuthController::class, "logout"]);   
});