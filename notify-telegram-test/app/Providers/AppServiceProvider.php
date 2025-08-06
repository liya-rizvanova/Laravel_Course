<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Filesystem\Filesystem;

class AppServiceProvider extends ServiceProvider
{
    public function boot(Filesystem $files)
    {
        // Пример использования Filesystem
        if ($files->exists(base_path('routes/web.php'))) {
            // файл маршрутов существует
        }
    }

    public function register()
    {
        //
    }
}
