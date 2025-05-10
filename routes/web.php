<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaPenggunaController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login_process', [AuthController::class, 'login_process']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['ceklevel:1,2']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
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
    Route::group(['prefix' => 'barang_keluar'], function () {
        Route::get('/', [BarangKeluarController::class, 'index']);
        Route::post('/list', [BarangKeluarController::class, 'list']);
        Route::get('/create', [BarangKeluarController::class, 'create']);
        Route::post('/', [BarangKeluarController::class, 'store']);
        Route::get('/{id}/detail', [BarangKeluarController::class, 'show']);
        Route::get('/{id}/edit', [BarangKeluarController::class, 'edit']);
        Route::put('/{id}', [BarangKeluarController::class, 'update']);
        Route::delete('/{id}', [BarangKeluarController::class, 'destroy']);
    });
    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/', [KelolaPenggunaController::class, 'index']);
        Route::post('/list', [KelolaPenggunaController::class, 'list']);
        Route::get('/create', [KelolaPenggunaController::class, 'create']);
        Route::post('/', [KelolaPenggunaController::class, 'store']);
        Route::get('/{id}/detail', [KelolaPenggunaController::class, 'show']);
        Route::get('/{id}/edit', [KelolaPenggunaController::class, 'edit']);
        Route::put('/{id}', [KelolaPenggunaController::class, 'update']);
        Route::delete('/{id}', [KelolaPenggunaController::class, 'destroy']);
    });
});
