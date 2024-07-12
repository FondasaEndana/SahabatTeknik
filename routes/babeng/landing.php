<?php

use App\Http\Controllers\landingController;
use Illuminate\Support\Facades\Route;


//pages
Route::get('/produk', [landingController::class, 'produk'])->name('produk');
Route::get('/produk/{slug}', [landingController::class, 'produkshow'])->name('produk.show');


Route::get('/about', [landingController::class, 'index'])->name('about');


Route::get('/keranjang', [landingController::class, 'keranjang'])->name('keranjang');


Route::get('/jasa', [landingController::class, 'jasa'])->name('jasa');
Route::post('/jasa', [landingController::class, 'store'])->name('jasa.store');
