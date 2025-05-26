<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Laravel\Facades\Telegram;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/test-telegram', function () {
    try {
        $response = Telegram::sendMessage([
            'chat_id' => env('TELEGRAM_CHAT_ID'),
            'text' => '✅ Сообщение успешно отправлено из Laravel!',
        ]);
        return 'Сообщение отправлено!';
    } catch (\Exception $e) {
        \Log::error('Telegram test error: ' . $e->getMessage());
        return 'Ошибка: ' . $e->getMessage();
    }
});

Route::get('/check-telegram', function () {
    return env('TELEGRAM_BOT_TOKEN');
});

require __DIR__.'/auth.php';
