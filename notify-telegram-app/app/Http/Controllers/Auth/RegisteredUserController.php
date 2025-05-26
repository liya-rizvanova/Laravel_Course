<?php

use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;
use Telegram;

public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:'.User::class,
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    event(new Registered($user));
    Auth::login($user);

    // ✉️ Отправка письма
    Mail::to($user->email)->send(new Welcome($user));

    // 📲 Отправка уведомления в Telegram
    Telegram::sendMessage([
        'chat_id' => env('TELEGRAM_CHANNEL_ID', ''),
        'parse_mode' => 'html',
        'text' => "🔔 Новый пользователь: <b>{$user->name}</b> ({$user->email}) зарегистрировался.",
    ]);

    return redirect(RouteServiceProvider::HOME);
}
