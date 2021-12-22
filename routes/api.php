<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ComunicationController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ImageController;
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

Route::group([
    'prefix' => 'auth',
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('signup', [AuthController::class, 'signUp']);
    Route::get('logout', [AuthController::class,'logout'])->middleware('auth:api');
});

Route::group([
    'prefix' => 'admin/comunicacion',
    'middleware' => 'auth:api',
], function () {
    Route::get("getAll", [ComunicationController::class, 'get']);
    Route::get("getById", [ComunicationController::class, 'getById']);
    Route::post("post", [ComunicationController::class, 'post']);
    Route::put("put", [ComunicationController::class, 'put']);
    Route::delete("delete", [ComunicationController::class, 'delete']);
});

Route::group([
    'prefix' => 'admin/documents',
    'middleware' => 'auth:api',
], function () {
    Route::get("getAll", [DocumentController::class, 'get']);
    Route::get("getById", [DocumentController::class, 'getById']);
    Route::post("post", [DocumentController::class, 'post']);
    Route::put("put", [DocumentController::class, 'put']);
    Route::delete("delete", [DocumentController::class, 'delete']);
});

Route::group([
    'prefix' => 'admin/images',
    'middleware' => 'auth:api',
], function () {
    Route::get("getAll", [ImageController::class, 'get']);
    Route::get("getById", [ImageController::class, 'getById']);
    Route::post("post", [ImageController::class, 'post']);
    Route::put("put", [ImageController::class, 'put']);
    Route::delete("delete", [ImageController::class, 'delete']);
});
