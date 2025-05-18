<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

// Импорты твоих классов событий, слушателей и наблюдателей
use App\Events\NewsHidden;
use App\Listeners\NewsHiddenListener;
use App\Models\News;
use App\Observers\NewsObserver;

class EventServiceProvider extends ServiceProvider
{
    /**
     * События и соответствующие им слушатели.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        NewsHidden::class => [
            NewsHiddenListener::class,
        ],
    ];

    /**
     * Зарегистрируй события для приложения.
     */
    public function boot(): void
    {
        // Регистрируем наблюдателя модели News
        News::observe(NewsObserver::class);
    }

    /**
     * Зарегистрируй сервис провайдера.
     */
    public function register(): void
    {
        //
    }
}
