<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\frontend\HomeController;
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

Route::post('/login',                 [APIController::class, 'userLogin']);

Route::middleware('auth:sanctum')->group( function () {

    Route::get('/list-product',           [APIController::class, 'listProduct']);
    // Route::get('/product/{id}',           [HomeController::class, 'getProduct']);
    // Route::post('/create-product',        [HomeController::class, 'createProduct']);
    // Route::post('/update-product',        [HomeController::class, 'updateProduct']);

    Route::post('/add-cart',            [APIController::class,'addCart']);
    Route::post('/place-order',         [APIController::class, 'placeOrder']);
    Route::get('/cart-item',         [APIController::class, 'CartItem']);
    Route::get('/my-order',         [APIController::class, 'myOrder']);
    Route::get('/cancel-order/{id}',         [APIController::class, 'cancelOrder']);
    Route::get('/view-order/{id}',         [APIController::class, 'viewOrder']);
    Route::get('/product/{slug}',      [APIController::class, 'Product']);
});


