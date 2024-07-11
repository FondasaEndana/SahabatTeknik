<?php

use App\Helpers\Fungsi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.landing.index');
});
require __DIR__.'/babeng/landing.php';

Route::middleware('auth')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('pages.dev.dashboard.index');
    // })->name('dashboard');
});
require __DIR__.'/babeng/admin.php';
require __DIR__.'/babeng/pelanggan.php';
require __DIR__.'/babeng/dev.php';

require __DIR__.'/auth.php';
//RESTAPI
require __DIR__.'/babeng/api/devapi.php';