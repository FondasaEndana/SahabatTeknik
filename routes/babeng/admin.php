<?php

use App\Helpers\Fungsi;
use App\Http\Controllers\admin\administratorController;
use App\Http\Controllers\admin\invoiceController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\konfirmasiController;
use App\Http\Controllers\admin\labelController;
use App\Http\Controllers\admin\laporanController;
use App\Http\Controllers\admin\pelangganController;
use App\Http\Controllers\admin\portofolioController;
use App\Http\Controllers\admin\produkController;
use App\Http\Controllers\admin\restokController;
use App\Http\Controllers\admin\transaksiController;
use App\Http\Controllers\dev\cetakController;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\Calculation\Web\Service;

Route::middleware('auth')->group(function () {
    //label
    Route::get('/admin/label', [labelController::class, 'index'])->name('admin.label');
    Route::get('/admin/label/create', [labelController::class, 'create'])->name('admin.label.create');
    Route::post('/admin/label/store', [labelController::class, 'store'])->name('admin.label.store');
    Route::get('/admin/label/{item}', [labelController::class, 'edit'])->name('admin.label.edit');
    Route::put('/admin/label/{item}', [labelController::class, 'update'])->name('admin.label.update');
    Route::delete('/admin/label/{item}', [labelController::class, 'destroy'])->name('admin.label.destroy');

    //jasa
    Route::get('/admin/jasa', [ServiceController::class, 'index'])->name('admin.jasa');
    Route::get('/admin/jasa/create', [ServiceController::class, 'create'])->name('admin.jasa.create');
    Route::post('/admin/jasa/store', [ServiceController::class, 'store'])->name('admin.jasa.store');
    Route::get('/admin/jasa/{item}', [ServiceController::class, 'edit'])->name('admin.jasa.edit');
    Route::put('/admin/jasa/{item}', [ServiceController::class, 'update'])->name('admin.jasa.update');
    Route::delete('/admin/jasa/{item}', [ServiceController::class, 'destroy'])->name('admin.jasa.destroy');

    //pages
    Route::get('/admin/portofolio', [portofolioController::class, 'index'])->name('admin.portofolio');
    Route::get('/admin/portofolio/create', [portofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::post('/admin/portofolio/store', [portofolioController::class, 'store'])->name('admin.portofolio.store');
    Route::get('/admin/portofolio/edit/{item}', [portofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::put('/admin/portofolio/update/{item}', [portofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::delete('/admin/portofolio/destroy/{item}', [portofolioController::class, 'destroy'])->name('admin.portofolio.destroy');

    //produk
    Route::get('/admin/produk', [produkController::class, 'index'])->name('admin.produk');
    Route::get('/admin/produk/create', [produkController::class, 'create'])->name('admin.produk.create');
    Route::post('/admin/produk/store', [produkController::class, 'store'])->name('admin.produk.store');
    Route::get('/admin/produk/{item}', [produkController::class, 'edit'])->name('admin.produk.edit');
    Route::put('/admin/produk/{item}', [produkController::class, 'update'])->name('admin.produk.update');
    Route::delete('/admin/produk/{item}', [produkController::class, 'destroy'])->name('admin.produk.destroy');
    Route::post('/admin/produk/uploadphoto/{item}', [produkController::class, 'uploadphoto'])->name('admin.produk.uploadphoto');
    Route::delete('/admin/produk/uploadphoto/{item}/destroy', [produkController::class, 'photodestroy'])->name('admin.produk.uploadphoto.destroy');


    //restok
    Route::get('/admin/restok', [restokController::class, 'index'])->name('admin.restok');
    Route::get('/admin/restok/create', [restokController::class, 'create'])->name('admin.restok.create');
    Route::post('/admin/restok/store', [restokController::class, 'store'])->name('admin.restok.store');
    Route::get('/admin/restok/{item}', [restokController::class, 'edit'])->name('admin.restok.edit');
    // Route::put('/admin/restok/{item}', [restokController::class, 'update'])->name('admin.restok.update');
    Route::delete('/admin/restok/{item}', [restokController::class, 'destroy'])->name('admin.restok.destroy');


    //pelanggan
    Route::get('/admin/pelanggan', [pelangganController::class, 'index'])->name('admin.pelanggan');
    Route::get('/admin/pelanggan/create', [pelangganController::class, 'create'])->name('admin.pelanggan.create');
    Route::post('/admin/pelanggan/store', [pelangganController::class, 'store'])->name('admin.pelanggan.store');
    Route::get('/admin/pelanggan/{item}', [pelangganController::class, 'edit'])->name('admin.pelanggan.edit');
    Route::put('/admin/pelanggan/{item}', [pelangganController::class, 'update'])->name('admin.pelanggan.update');
    Route::delete('/admin/pelanggan/{item}', [pelangganController::class, 'destroy'])->name('admin.pelanggan.destroy');


    //administrator
    Route::get('/admin/administrator', [administratorController::class, 'index'])->name('admin.administrator');
    Route::get('/admin/administrator/create', [administratorController::class, 'create'])->name('admin.administrator.create');
    Route::post('/admin/administrator/store', [administratorController::class, 'store'])->name('admin.administrator.store');
    Route::get('/admin/administrator/{item}', [administratorController::class, 'edit'])->name('admin.administrator.edit');
    Route::put('/admin/administrator/{item}', [administratorController::class, 'update'])->name('admin.administrator.update');
    Route::delete('/admin/administrator/{item}', [administratorController::class, 'destroy'])->name('admin.administrator.destroy');


    //transaksi
    Route::get('/admin/transaksi', [transaksiController::class, 'index'])->name('admin.transaksi');
    Route::get('/admin/transaksi/create', [transaksiController::class, 'create'])->name('admin.transaksi.create');
    Route::post('/admin/transaksi/store', [transaksiController::class, 'store'])->name('admin.transaksi.store');
    Route::get('/admin/transaksi/{item}', [transaksiController::class, 'edit'])->name('admin.transaksi.edit');
    Route::put('/admin/transaksi/{item}', [transaksiController::class, 'update'])->name('admin.transaksi.update');
    Route::delete('/admin/transaksi/{item}', [transaksiController::class, 'destroy'])->name('admin.transaksi.destroy');
    Route::get('/cetak/transaksi/{item}', [cetakController::class, 'transaksi'])->name('cetak.transaksi');
    Route::post('/admin/transaksi/konfirmasi/{item}', [transaksiController::class, 'konfirmasi'])->name('admin.transaksi.konfirmasi');


    //konfirmasi
    Route::get('/admin/konfirmasi', [konfirmasiController::class, 'index'])->name('admin.konfirmasi');
    Route::get('/admin/konfirmasi/create', [konfirmasiController::class, 'create'])->name('admin.konfirmasi.create');
    Route::post('/admin/konfirmasi/store', [konfirmasiController::class, 'store'])->name('admin.konfirmasi.store');
    Route::get('/admin/konfirmasi/{item}', [konfirmasiController::class, 'edit'])->name('admin.konfirmasi.edit');
    Route::put('/admin/konfirmasi/{item}', [konfirmasiController::class, 'update'])->name('admin.konfirmasi.update');
    Route::delete('/admin/konfirmasi/{item}', [konfirmasiController::class, 'destroy'])->name('admin.konfirmasi.destroy');

    //laporan
    Route::get('/admin/laporanrestok', [laporanController::class, 'restok'])->name('admin.laporanrestok');
    Route::get('/admin/laporanrestok/cetak', [cetakController::class, 'restok_cetak'])->name('admin.laporanrestok.cetak');
    Route::get('/admin/laporanpenjualan', [laporanController::class, 'penjualan'])->name('admin.laporanpenjualan');
    Route::get('/admin/laporanpenjualan/cetak', [cetakController::class, 'penjualan_cetak'])->name('admin.laporanpenjualan.cetak');
    Route::get('/admin/laporanlaba', [laporanController::class, 'laba'])->name('admin.laporanlaba');
    Route::get('/admin/laporanlaba/cetak', [cetakController::class, 'laba_cetak'])->name('admin.laporanlaba.cetak');
    // //invoice
    // Route::get('/admin/invoice', [invoiceController::class, 'index'])->name('admin.invoice');
    // Route::get('/admin/invoice/create', [invoiceController::class, 'create'])->name('admin.invoice.create');
    // Route::post('/admin/invoice/store', [invoiceController::class, 'store'])->name('admin.invoice.store');
    // Route::get('/admin/invoice/{item}', [invoiceController::class, 'edit'])->name('admin.invoice.edit');
    // Route::put('/admin/invoice/{item}', [invoiceController::class, 'update'])->name('admin.invoice.update');
    // Route::delete('/admin/invoice/{item}', [invoiceController::class, 'destroy'])->name('admin.invoice.destroy');
});
