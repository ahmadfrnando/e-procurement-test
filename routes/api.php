<?php

use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
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

Route::middleware('api')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('vendor/register', [VendorController::class, 'register']);
    Route::get('vendors', [VendorController::class, 'getVendors']);
    Route::post('product', [ProductController::class, 'addProduct']);
    Route::get('products', [ProductController::class, 'getProducts']);
    Route::put('product/{id}', [ProductController::class, 'updateProduct']);
    Route::delete('product/{id}', [ProductController::class, 'deleteProduct']);
});
