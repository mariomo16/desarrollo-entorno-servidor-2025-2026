<?php

use App\Models\Quack;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Quacks', function () {
  return Quack::get(); // esto devolverá un JSON con todos los quacks
});