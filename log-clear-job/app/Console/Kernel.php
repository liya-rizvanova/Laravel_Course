<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\ClearCache;

class Kernel extends ConsoleKernel
{
    /**
     * Определите расписание команд приложения.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Запуск задачи ClearCache каждую минуту
        $schedule->job(ClearCache::class)->everyMinute();
    }

    /**
     * Зарегистрируйте команды консоли приложения.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
