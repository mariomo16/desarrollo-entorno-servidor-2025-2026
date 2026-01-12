<?php

use App\Http\Controllers\GenreController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return "Laravel ha vuelto, ¡y en forma de API!";
});

Route::get('/genres', [GenreController::class, 'index']);
Route::get('/games', [GameController::class, 'index']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/reviews', [ReviewController::class, 'index']);