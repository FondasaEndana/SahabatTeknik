<?php

use App\Http\Controllers\api\apiKategoriController;
use App\Http\Controllers\api\apiLaporanController;
use App\Http\Controllers\api\apiProdukController;
use App\Http\Controllers\api\apiTransaksiController;
use Illuminate\Support\Facades\Route;
Route::get('restapi/dataproduk/cari', [apiProdukController::class, 'cari'])->name('api.produk.cari');
Route::get('restapi/restokdetail/{item}', [apiProdukController::class, 'restokdetail'])->name('api.produk.restokdetail');
Route::get('restapi/datatransaksi/{item}', [apiTransaksiController::class, 'detail'])->name('api.transaksi.detail');

Route::get('restapi/users/cek/username', [apiProdukController::class, 'periksausername'])->name('api.users.periksausername');

Route::get('restapi/datalaporan/restok', [apiLaporanController::class, 'restok'])->name('api.laporan.restok');
Route::get('restapi/datalaporan/penjualan', [apiLaporanController::class, 'penjualan'])->name('api.laporan.penjualan');

Route::middleware('auth')->group(function () {
    Route::get('restapi/label', [apiKategoriController::class, 'label'])->name('api.label.index');
});

//arsip
// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->name('getuser');
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
//  });
