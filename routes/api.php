<?php

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

Route::post('/login',                 [HomeController::class, 'userLogin']);

Route::middleware('auth:sanctum')->group( function () {

    Route::get('/list-product',           [HomeController::class, 'listProduct']);
    Route::get('/product/{id}',           [HomeController::class, 'getProduct']);
    Route::post('/create-product',        [HomeController::class, 'createProduct']);
    Route::post('/update-product',        [HomeController::class, 'updateProduct']);

});


