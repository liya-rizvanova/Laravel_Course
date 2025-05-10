<?php

use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome-custom');
});

Route::get('/index', [BookController::class, 'index']);
Route::post('/store', [BookController::class, 'store']);
