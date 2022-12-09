<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ProductVariantController;

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

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login')->name('api.login');
    Route::post('logout', 'logout');
});

Route::group(['as' => 'api.', 'middleware' => ['api', 'auth']], function () {
    // products route
    Route::apiResource('products', ProductController::class);
    Route::post("products/{product}/upload", [ProductController::class, 'upload'])->name('products.upload');

    // product variants route
    Route::apiResource('product-variants', ProductVariantController::class);
});
