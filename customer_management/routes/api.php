<?php

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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('register', [\App\Http\Controllers\AuthController::class, 'register']);
Route::post('login', [\App\Http\Controllers\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
    Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
Route::get('user', [\App\Http\Controllers\AuthController::class, 'user']);
Route::post('logout', [\App\Http\Controllers\AuthController::class, 'logout']);

Route::post('addProduct', [\App\Http\Controllers\ProductController::class, 'addProduct']);
Route::get('getAllProduct', [\App\Http\Controllers\ProductController::class, 'getAllProduct']);
Route::put('updateProduct/{id}', [\App\Http\Controllers\ProductController::class, 'updateProduct']);
Route::get('deleteProduct/{id}', [\App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::get('getProductById/{id}', [\App\Http\Controllers\ProductController::class, 'getProductById']);
