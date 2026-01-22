<?php

use App\Http\Controllers\ZuloController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/index');
});

Route::resource('/index', ZuloController::class);
