<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/logs', function () {
    $logs = DB::table('logs')->get();
    return view('logs', compact('logs'));
});
