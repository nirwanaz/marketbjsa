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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ProductTypeController;
Route::prefix('pt')->group(function() {
    Route::get('', [ProductTypeController::class, 'index']);
    Route::post('', [ProductTypeController::class, 'store']);
    Route::get('/{id}', [ProductTypeController::class, 'getproductType']);
    Route::put('/{id}', [ProductTypeController::class, 'update']);
    Route::delete('/{id}', [ProductTypeController::class, 'delete']);
});


use App\Http\Controllers\CategoryController;
Route::prefix('catg')->group(function() {
    Route::get('', [CategoryController::class, 'index']);
    Route::post('', [CategoryController::class, 'store']);
    Route::get('/{id}', [CategoryController::class, 'getCategory']);
    Route::get('/findbyptype/{id}', [CategoryController::class, 'getCategoryByPtype']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'delete']);
    
});

use App\Http\Controllers\ProductController;
Route::get('/prod', [ProductController::class, 'index']);
Route::post('/prod', [ProductController::class, 'store']);
Route::get('/prod/{id}', [ProductController::class, 'getProduct']);
Route::put('/prod/{id}', [ProductController::class, 'update']);
Route::delete('/prod/{id}', [ProductController::class, 'delete']);

use App\Http\Controllers\MerchantController;
Route::get('/merchant', [MerchantController::class, 'index']);
Route::post('/merchant', [MerchantController::class, 'store']);
Route::get('/merchant/{id}', [MerchantController::class, 'getMerchant']);
Route::get('/merchant/owner/{id}', [MerchantController::class, 'haveMerchant']);
Route::put('/merchant/{id}', [MerchantController::class, 'update']);
Route::put('/merchant/profile/{id}', [MerchantController::class, 'updateProfile']);
Route::put('/merchant/setting/{id}', [MerchantController::class, 'updateSetting']);
Route::delete('/merchant/{id}', [MerchantController::class, 'delete']);

use App\Http\Controllers\AccountController;
Route::get('/account', [AccountController::class, 'index']);
Route::post('/account', [AccountController::class, 'store']);
Route::get('/account/{id}', [AccountController::class, 'getAccount']);
Route::put('/account/{id}', [AccountController::class, 'update']);
Route::delete('/account/{id}', [AccountController::class, 'delete']);
Route::post('/account/login', [AccountController::class, 'login']);
Route::post('/account/logout', [AccountController::class, 'logout']);