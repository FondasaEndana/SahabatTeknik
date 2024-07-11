
    <?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\pelanggan\pelangganTransaksiController;

    Route::middleware('auth')->group(function () {
        //transaksi
        Route::get('/pelanggan/transaksi', [pelangganTransaksiController::class, 'index'])->name('pelanggan.transaksi');
        Route::get('/pelanggan/transaksi/create', [pelangganTransaksiController::class, 'create'])->name('pelanggan.transaksi.create');
        Route::post('/pelanggan/transaksi/store', [pelangganTransaksiController::class, 'store'])->name('pelanggan.transaksi.store');
        Route::get('/pelanggan/transaksi/{item}', [pelangganTransaksiController::class, 'edit'])->name('pelanggan.transaksi.edit');
        Route::put('/pelanggan/transaksi/{item}', [pelangganTransaksiController::class, 'update'])->name('pelanggan.transaksi.update');
        Route::delete('/pelanggan/transaksi/{item}', [pelangganTransaksiController::class, 'destroy'])->name('pelanggan.transaksi.destroy');
        Route::post('/pelanggan/transaksi/konfirmasi/{item}', [pelangganTransaksiController::class, 'konfirmasi'])->name('pelanggan.transaksi.konfirmasi');
        Route::get('/pelanggan/transaksi/upoadbukti/{item}', [pelangganTransaksiController::class, 'uploadbukti'])->name('pelanggan.transaksi.upoadbukti');
        Route::post('/pelanggan/transaksi/upoadbukti/{item}', [pelangganTransaksiController::class, 'uploadbukti_store'])->name('pelanggan.transaksi.upoadbukti');
    });

    Route::get('/pelanggan/rajaongkir/province', [pelangganTransaksiController::class, 'rajaongkir_province'])->name('rajaongkir.province');
    Route::get('/pelanggan/rajaongkir/city', [pelangganTransaksiController::class, 'rajaongkir_city'])->name('rajaongkir.city');
    Route::get('/pelanggan/rajaongkir/cost', [pelangganTransaksiController::class, 'rajaongkir_cost'])->name('rajaongkir.cost');
