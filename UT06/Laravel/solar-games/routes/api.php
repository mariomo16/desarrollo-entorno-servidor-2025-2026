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
Route::get('/genres/{genre}', [GenreController::class, 'show']);
Route::post('/genres', [GenreController::class, 'store'])->middleware('auth:sanctum');
Route::patch('/genres/{genre}', [GenreController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/genres/{genre}', [GenreController::class, 'delete'])->middleware('auth:sanctum');

Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{game}', [GameController::class, 'show']);
Route::post('/games', [GameController::class, 'store']);
Route::patch('/games/{game}', [GameController::class, 'update']);
Route::delete('/games/{game}', [GameController::class, 'delete']);

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::patch('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'delete']);

Route::get('/reviews', [ReviewController::class, 'index']);
Route::get('/reviews/{review}', [ReviewController::class, 'show']);
Route::post('/reviews', [ReviewController::class, 'store']);
Route::patch('/reviews/{review}', [ReviewController::class, 'update']);
Route::delete('/reviews/{review}', [ReviewController::class, 'delete']);
