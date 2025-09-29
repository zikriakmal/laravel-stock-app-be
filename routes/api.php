<?php

use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->controller(UserController::class)
    ->group(function () {
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
