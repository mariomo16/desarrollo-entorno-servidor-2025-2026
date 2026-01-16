<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\ReviewController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "Laravel ha vuelto, ¡y en forma de API!";
});

Route::get('/login', [AuthController::class, 'login']);

Route::get('/users', [UserController::class, 'index']);

Route::get('/users/{user}/reviews', [ReviewController::class, 'userReviews']);

Route::apiResource('genres', GenreController::class)->only('index', 'show');
Route::apiResource('games', GameController::class)->only('index', 'show');
Route::apiResource('reviews', ReviewController::class)->only('index', 'show');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('genres', GenreController::class)->except('index', 'show');
    Route::apiResource('games', GameController::class)->except('index', 'show');
    Route::apiResource('reviews', ReviewController::class)->except('index', 'show');
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
