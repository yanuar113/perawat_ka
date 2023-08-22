<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\KeretaController;
use App\Http\Controllers\Api\SparepartController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']);
Route::resource('trains', KeretaController::class);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('category-checksheet', [App\Http\Controllers\Api\KategoriController::class, 'getAll']);
    Route::get('check-checksheet', [App\Http\Controllers\Api\KategoriController::class, 'getstatuschecksheet']);
    Route::post('checksheet', [App\Http\Controllers\Api\KategoriController::class, 'createChecksheet']);
    Route::get('list-checksheet', [App\Http\Controllers\Api\KategoriController::class, 'getAllList']);
    Route::get('list-checksheet/{id}/{id_checksheet}', [App\Http\Controllers\Api\KategoriController::class, 'getAllListById']);
});
// Route::resource('spareparts', SparepartController::class);
