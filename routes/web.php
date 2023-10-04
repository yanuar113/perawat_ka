<?php

use App\Http\Controllers\ChecksheetController;
use App\Http\Controllers\ChecksheetDetailController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemChecksheetController;
use App\Http\Controllers\KategoriChecksheetController;
use App\Http\Controllers\KategorisparepartController;
use App\Http\Controllers\KeretaController;
use App\Http\Controllers\SparepartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//route login
Route::get('/', function () {
    return view('login.login');
});

// Route::get('/', function () {
//     return view('welcome');
// });

//Dashboard
Route::resource('dashboard', DashboardController::class);

//master kereta
Route::resource('kereta', KeretaController::class);

//kategori sparepart
Route::resource('kategori', KategorisparepartController::class);

//Sparepart
Route::resource('sparepart', SparepartController::class);

// //Checksheet
Route::resource('kategori_checksheet',KategoriChecksheetController::class);
//Route::resource('sub_checksheet',SubChecksheetController::class);
Route::resource('item_checksheet',ItemChecksheetController::class);
Route::resource('checksheet',ChecksheetController::class);
// cetak checksheet
Route::get('checksheet/print/{id}', [ChecksheetController::class, 'print'])->name('checksheet.print');
Route::get('kategori_checksheet/filter/{keretaId}', 'KategoriChecksheetController@filterKategoriByKereta')->name('kategori_checksheet.filter');


// //Foto
// Route::resource('foto', FotoController::class);

// //Laporan
// Route::resource('laporan', LaporanController::class);


