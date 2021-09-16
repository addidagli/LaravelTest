<?php

use Illuminate\Support\Facades\Route;

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
Route::resource('projects', 'ProjectsController');

Route::post('login', 'AuthController@login');
Route::post('register', 'AuthController@register');


Route::middleware('auth:sanctum')->group(function () {
    Route::get('user','AuthController@user' );
    Route::post('logout','AuthController@logout');
});


Route::post('addProduct', [\App\Http\Controllers\ProductController::class, 'addProduct']);
Route::get('getAllProduct', [\App\Http\Controllers\ProductController::class, 'getAllProduct']);
Route::put('updateProduct/{id}', [\App\Http\Controllers\ProductController::class, 'updateProduct']);
Route::get('deleteProduct/{id}', [\App\Http\Controllers\ProductController::class, 'deleteProduct']);
Route::get('getProductById/{id}', [\App\Http\Controllers\ProductController::class, 'getProductById']);
