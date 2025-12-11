<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\OfertaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('/ofertas');
});

Route::get('/ofertas', [OfertaController::class, 'index'])->middleware('auth');
Route::get('/ofertas/{oferta}', [OfertaController::class, 'show'])->middleware('auth');
Route::get('/ofertas/create', [OfertaController::class, 'create'])->middleware('auth');
Route::post('/ofertas', [OfertaController::class, 'store'])->middleware('auth');
Route::get('/ofertas/{oferta}/edit', [OfertaController::class, 'edit'])->middleware('auth')->can('manage');
Route::patch('/ofertas/{oferta}', [OfertaController::class, 'update'])->middleware('auth')->can('manage');
Route::delete('/ofertas/{oferta}', [OfertaController::class, 'destroy'])->middleware('auth')->can('manage');

Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::get('/logout', [SessionController::class, 'destroy']);