<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Telegram\Bot\Api;
use Illuminate\Support\Facades\Log;

class SendTelegramLoginNotification
{
    public function handle(Login $event)
    {
        $telegram = new Api(env('TELEGRAM_BOT_TOKEN'));

        $message = 'Пользователь ' . $event->user->name . ' только что вошёл в систему.';

        try {
            $telegram->sendMessage([
                'chat_id' => env('TELEGRAM_CHAT_ID'),
                'text' => $message,
            ]);
        } catch (\Exception $e) {
            Log::error('Telegram sendMessage error: ' . $e->getMessage());
        }
    }
}
