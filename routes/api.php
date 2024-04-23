<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\FotoController;
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
Route::post('auto-login', [AuthController::class, 'autoLogin']);
Route::resource('trains', KeretaController::class);
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('category-checksheet/{id}', [App\Http\Controllers\Api\KategoriController::class, 'getAll']);
    Route::get('check-checksheet', [App\Http\Controllers\Api\KategoriController::class, 'getstatuschecksheet']);
    Route::post('checksheet', [App\Http\Controllers\Api\KategoriController::class, 'createChecksheet']);
    Route::get('list-checksheet', [App\Http\Controllers\Api\KategoriController::class, 'getAllList']);
    Route::get('list-checksheet/{id}/{id_checksheet}', [App\Http\Controllers\Api\KategoriController::class, 'getAllListById']);
    Route::post('detail-checksheet', [App\Http\Controllers\Api\ChecksheetController::class, 'createDetailChecksheet']);
    Route::post('history', [App\Http\Controllers\Api\ChecksheetController::class, 'getHistory']);
    Route::post('foto', [App\Http\Controllers\Api\ChecksheetController::class, 'getHistoryFoto']);
    Route::post('so', [App\Http\Controllers\Api\ChecksheetController::class, 'changeSO']);

    Route::get('foto', [FotoController::class, 'print']);
});
Route::post('upload-foto', [App\Http\Controllers\Api\ChecksheetController::class, 'uploadFoto']);
Route::post('v2/upload-foto', [App\Http\Controllers\Api\ChecksheetController::class, 'uploadFotov2']);
Route::post('remove-foto', [App\Http\Controllers\Api\ChecksheetController::class, 'removeFoto']);
// Route::resource('spareparts', SparepartController::class);
