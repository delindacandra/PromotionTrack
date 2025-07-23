<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelolaPenggunaController;
use App\Http\Controllers\PemohonController;
use App\Http\Controllers\PermintaanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login_process', [AuthController::class, 'login_process']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['ceklevel:1,2']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::group(['prefix' => 'barang'], function () {
        Route::get('/', [BarangController::class, 'index'])->middleware('privilege:barang,index');
        Route::post('/list', [BarangController::class, 'list'])->middleware('privilege:barang,list');
        Route::get('/create', [BarangController::class, 'create'])->middleware('privilege:barang,create');
        Route::post('/', [BarangController::class, 'store'])->middleware('privilege:barang,store');
        Route::get('/{id}', [BarangController::class, 'show'])->middleware('privilege:barang,show');
        Route::get('/{id}/edit', [BarangController::class, 'edit'])->middleware('privilege:barang,edit');
        Route::put('/{id_barang}', [BarangController::class, 'update'])->middleware('privilege:barang,update');
        Route::delete('{id}', [BarangController::class, 'destroy'])->middleware('privilege:barang,destroy');
    });
    Route::group(['prefix' => 'barang_masuk'], function () {
        Route::get('/', [BarangMasukController::class, 'index'])->middleware('privilege:barang_masuk,index');
        Route::post('/list', [BarangMasukController::class, 'list'])->middleware('privilege:barang_masuk,list');
        Route::get('/create', [BarangMasukController::class, 'create'])->middleware('privilege:barang_masuk,create');
        Route::post('/', [BarangMasukController::class, 'store'])->middleware('privilege:barang_masuk,store');
        Route::get('/{id}/edit', [BarangMasukController::class, 'edit'])->middleware('privilege:barang_masuk,edit');
        Route::put('/{id}', [BarangMasukController::class, 'update'])->middleware('privilege:barang_masuk,update');
        Route::delete('/{id}', [BarangMasukController::class, 'destroy'])->middleware('privilege:barang_masuk,destroy');
    });
    Route::group(['prefix' => 'barang_keluar'], function () {
        Route::get('/', [BarangKeluarController::class, 'index'])->middleware('privilege:barang_keluar,index');
        Route::post('/list', [BarangKeluarController::class, 'list'])->middleware('privilege:barang_keluar,list');
        Route::get('/create', [BarangKeluarController::class, 'create'])->middleware('privilege:barang_keluar,create');
        Route::post('/', [BarangKeluarController::class, 'store'])->middleware('privilege:barang_keluar,store');
        Route::get('/{id}/detail', [BarangKeluarController::class, 'show'])->middleware('privilege:barang_keluar,show');
        Route::get('/{id}/edit', [BarangKeluarController::class, 'edit'])->middleware('privilege:barang_keluar,edit');
        Route::put('/{id}', [BarangKeluarController::class, 'update'])->middleware('privilege:barang_keluar,update');
        Route::delete('/{id}', [BarangKeluarController::class, 'destroy'])->middleware('privilege:barang_keluar,destroy');
        Route::get('/cetak/{id}', [BarangKeluarController::class, 'cetak'])->middleware('privilege:barang_keluar,cetak');
    });
    Route::group(['prefix' => 'pengguna'], function () {
        Route::get('/', [KelolaPenggunaController::class, 'index'])->middleware('privilege:pengguna,index');
        Route::post('/list', [KelolaPenggunaController::class, 'list'])->middleware('privilege:pengguna,list');
        Route::get('/create', [KelolaPenggunaController::class, 'create'])->middleware('privilege:pengguna,create');
        Route::post('/', [KelolaPenggunaController::class, 'store'])->middleware('privilege:pengguna,store');
        Route::get('/{id}/detail', [KelolaPenggunaController::class, 'show'])->middleware('privilege:pengguna,show');
        Route::get('/{id}/edit', [KelolaPenggunaController::class, 'edit'])->middleware('privilege:pengguna,edit');
        Route::put('/{id}', [KelolaPenggunaController::class, 'update'])->middleware('privilege:pengguna,update');
        Route::delete('/{id}', [KelolaPenggunaController::class, 'destroy'])->middleware('privilege:pengguna,destroy');
    });
    Route::group(['prefix' => 'permintaan'], function () {
        Route::get('/', [PermintaanController::class, 'index'])->middleware('privilege:permintaan,index');
        Route::post('/list', [PermintaanController::class, 'list'])->middleware('privilege:permintaan,list');
        Route::get('/{id}/detail', [PermintaanController::class, 'show'])->middleware('privilege:permintaan,show');
        Route::get('/{id}/proses', [PermintaanController::class, 'proses'])->middleware('privilege:permintaan,proses');
        Route::post('/', [PermintaanController::class, 'store'])->middleware('privilege:permintaan,store');
        Route::get('/riwayat', [PermintaanController::class, 'riwayat'])->middleware('privilege:permintaan,riwayat');
        Route::get('/riwayat', [PermintaanController::class, 'riwayat'])->middleware('privilege:permintaan,riwayat');
        Route::post('/riwayat_list', [PermintaanController::class, 'riwayat_list'])->middleware('privilege:permintaan,list');
        Route::post('/{id}/setuju', [PermintaanController::class, 'setuju']);
        Route::post('/{id}/tolak', [PermintaanController::class, 'tolak']);
    });
});

Route::group(['middleware' => ['ceklevel:3']], function () {
    Route::get('/beranda', [PemohonController::class, 'index']);
    Route::group(['prefix' => 'pemohon'], function () {
        Route::get('/create', [PemohonController::class, 'create'])->middleware('privilege:permintaan,create');
        Route::post('/', [PemohonController::class, 'store'])->middleware('privilege:permintaan,store');
        Route::get('/riwayat', [PemohonController::class, 'riwayat'])->middleware('privilege:permintaan,riwayat');
        Route::post('/riwayat_list', [PemohonController::class, 'riwayat_list'])->middleware('privilege:permintaan,list');
    });
});
