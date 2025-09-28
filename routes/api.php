<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::controller(UserController::class)->group(function () {
    Route::post('/users', 'create');
    Route::get('/users','getAll');
    Route::get('/users/{id}', 'show');
    Route::put('/users/{id}', 'update');
    Route::delete('/users/{id}','destroy');
});
