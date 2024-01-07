<?php

use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SoftwareController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Get Token
Route::post('/generate/token', [UserController::class, 'getToken']);

//Servicios
Route::get('/services', [ServicesController::class, 'index']);
Route::post('/services', [ServicesController::class, 'store']);
Route::get('/service/{id}', [ServicesController::class, 'show']);
Route::put('/service/{id}', [ServicesController::class, 'update']);
Route::delete('/service/{id}', [ServicesController::class, 'delete']);
Route::put('/service/status/{id}', [ServicesController::class, 'status']);

//Software
Route::get('/software', [SoftwareController::class, 'index']);
Route::post('/software', [SoftwareController::class, 'store']);
Route::get('/software/{id}', [SoftwareController::class, 'show']);
Route::put('/software/{id}', [SoftwareController::class, 'update']);
Route::delete('/software/{id}', [SoftwareController::class, 'delete']);
Route::put('/software/status/{id}', [SoftwareController::class, 'status']);
