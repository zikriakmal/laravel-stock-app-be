<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () { return response()->json(["api_version"=>"1"]); });
