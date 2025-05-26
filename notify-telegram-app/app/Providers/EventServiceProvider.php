<?php

namespace App\Providers;

use Illuminate\Auth\Events\Login;
use App\Listeners\SendTelegramLoginNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * События и их слушатели.
     *
     * @var array
     */
    protected $listen = [
        Login::class => [
            SendTelegramLoginNotification::class,
        ],
    ];

    /**
     * Зарегистрировать события для приложения.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }
}
