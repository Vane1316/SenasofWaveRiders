<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RachaController;
use App\Models\Racha;
use App\Http\Controllers\Auth\Admi_Controller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
//MIDWARE
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
    });


    //API RESOURCE METHODS OF ALL (GET, PUT,DELETE)
Route::apiResource("login", LoginController::class);
Route::apiResource('Racha', Racha::class);
Route::apiResource('register', RegisterController::class);




// Rutas para autenticación del administrador
Route::post('/login', [Admi_Controller::class, 'Admi'])->name('admin.login');
Route::post('/logout', [Admi_Controller::class, 'logout'])->name('admin.logout');