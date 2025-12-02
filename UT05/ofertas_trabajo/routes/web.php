<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/ofertas');
});

Route::resource('ofertas', OfertaController::class)->middleware('auth');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);