<?php

use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/ofertas');
});

Route::resource('ofertas', OfertaController::class);