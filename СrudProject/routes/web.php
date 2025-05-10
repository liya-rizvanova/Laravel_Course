<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfGeneratorController;

Route::get('/add-user', [UserController::class, 'create']);
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'get']);
Route::post('/store-user', [UserController::class, 'store']);
Route::get('/resume/{id}', [PdfGeneratorController::class, 'index']);

