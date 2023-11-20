<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('user', function (Request $request) {
    return $request->user();
});
// Route::middleware('auth:sanctum')->get('product', function (Request $request) {
//     return $request->product();
// });

Route::group(['middleware' => 'api'], function () {
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product', [ProductController::class, 'index']);
    });
    // Route::get('hello', [HelloController::class, 'hello']);
});
