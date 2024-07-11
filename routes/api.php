<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// public function refreshToken(Request $request)
// {
//      session()->regenerate();
//      return response()->json([
//         "token"=>csrf_token()],
//       200);

// }

// Route::get('/token', function (Request $request) {
//     session()->regenerate();
//     return response()->json([
//        "token"=>csrf_token()],
//      200);
//     })->name('api.label.index');
// require __DIR__.'/babeng/api/devapi.php';