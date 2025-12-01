<?php

use App\Http\Controllers\QuackController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/quacks');
});

Route::resource('quacks', QuackController::class);