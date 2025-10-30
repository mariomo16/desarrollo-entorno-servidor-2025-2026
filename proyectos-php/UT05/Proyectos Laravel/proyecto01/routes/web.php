<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{id}', function ($id) {
    return view('welcome', [
        'id' => $id
    ]);
});
