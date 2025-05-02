<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);
    Route::post('/list', [BarangController::class, 'list']);
    Route::get('/create', [BarangController::class, 'create']);
    Route::post('/', [BarangController::class, 'store']);
    Route::get('/{id}', [BarangController::class, 'show']);
    Route::get('/{id}/edit', [BarangController::class, 'edit']);
    Route::put('/{id_barang}', [BarangController::class, 'update']);
    Route::delete('{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'barang_masuk'], function () {
    Route::get('/', [BarangMasukController::class, 'index']);
    Route::post('/list', [BarangMasukController::class, 'list']);
    Route::get('/create', [BarangMasukController::class, 'create']);
    Route::post('/', [BarangMasukController::class, 'store']);
    Route::get('/{id}/edit', [BarangMasukController::class, 'edit']);
    Route::put('/{id}', [BarangMasukController::class, 'update']);
    Route::delete('/{id}', [BarangMasukController::class, 'destroy']);
});

Route::group(['prefix' => 'barang_keluar'], function(){
    Route::get('/', [BarangKeluarController::class, 'index']);
    Route::post('/list', [BarangKeluarController::class, 'list']);
    Route::get('/create',[BarangKeluarController::class, 'create']);
    Route::post('/', [BarangKeluarController::class, 'store']);
    Route::get('/{id}/edit', [BarangKeluarController::class, 'edit']);
    Route::put('/{id}', [BarangKeluarController::class, 'update']);
    Route::delete('/{id}', [BarangKeluarController::class, 'destroy']);
});