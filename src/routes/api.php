<?php

use App\Http\Controllers\HelloController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RegisterController;
use App\Models\Customer;
use App\Models\Genre;
use App\Models\OrderProduct;
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

Route::group(['middleware' => 'api'], function () {
    // Route::middleware('auth')->group(function () {
    // });
    Route::middleware('auth:sanctum')->group(function () {
        Route::prefix('mypage')->group(function () {
            Route::post('/delivery_destination_register', [CustomerController::class, 'storeDeliveryDestination']);
        });
        Route::post('/order', [OrderController::class, 'order']);
    });
    Route::get('/product', [ProductController::class, 'index']);
    Route::get('/product/show/{id}', [ProductController::class, 'show']);
    Route::get('/genre', [GenreController::class, 'genre']);
    Route::get('/delivery_destination_list', [DeliveryController::class, 'deliveryDestinationList']);
    Route::post('/customer_register', [RegisterController::class, 'register']);
});
