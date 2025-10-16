<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockTransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// public routes
Route::prefix('auth')
    ->controller(AuthController::class)
    ->group(function () {
        Route::post('/login', 'login');
        Route::post('/logout', 'logout');
        Route::get('/unauthorized', 'unauthorized');
    });

Route::get('/', function () {
    return response()->json(['test' => 'test']);
});
// protected routes
Route::middleware('auth:api')
    ->group(function () {
        Route::prefix('users')
            ->controller(UserController::class)
            ->group(function () {
                Route::get('/my-info','myInfo');
                Route::post('/', 'create');
                Route::get('/', 'getAll');
                Route::get('/{id}', 'show');
                Route::put('/{id}', 'update');
            });

        Route::prefix('product-categories')
            ->controller(ProductCategoryController::class)
            ->group(function () {
                Route::post('/', 'create');
                Route::get('/', 'getAll');
                Route::get('/{id}', 'show');
                Route::put('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::prefix('products')
            ->controller(ProductController::class)
            ->group(function () {
                Route::post('/', 'create');
                Route::get('/', 'getAll');
                Route::get('/{id}', 'show');
                Route::put('/{id}', 'update');
                Route::delete('/{id}', 'destroy');
            });

        Route::prefix('stock_transactions')
            ->controller(StockTransactionController::class)
            ->group(function () {
                Route::post('/', 'create');
                Route::get('/', 'getAll');
            });
    });
