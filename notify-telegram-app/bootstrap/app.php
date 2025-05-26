<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Foundation\MaintenanceModeManager;
use Illuminate\Contracts\Foundation\MaintenanceMode;

use Illuminate\Foundation\Providers\FoundationServiceProvider;
use Illuminate\Encryption\EncryptionServiceProvider;
use Illuminate\Foundation\Providers\ArtisanServiceProvider;
use Illuminate\View\ViewServiceProvider;
use Illuminate\Cache\CacheServiceProvider;
use Illuminate\Cookie\CookieServiceProvider;
use Illuminate\Session\SessionServiceProvider;
use Illuminate\Database\DatabaseServiceProvider;
use Illuminate\Auth\AuthServiceProvider;
use Illuminate\Hashing\HashServiceProvider;
use Illuminate\Routing\RoutingServiceProvider;
use Illuminate\Translation\TranslationServiceProvider;
use Illuminate\Validation\ValidationServiceProvider;
use Laravel\Tinker\TinkerServiceProvider;
use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\Queue\QueueServiceProvider;

$appBuilder = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        //
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->withProviders([
        FoundationServiceProvider::class,
        EncryptionServiceProvider::class,
        ArtisanServiceProvider::class,
        ViewServiceProvider::class,
        CacheServiceProvider::class,
        CookieServiceProvider::class,
        SessionServiceProvider::class,
        DatabaseServiceProvider::class,
        AuthServiceProvider::class,
        HashServiceProvider::class,
        RoutingServiceProvider::class,
        TranslationServiceProvider::class,
        ValidationServiceProvider::class,
        TinkerServiceProvider::class,
        ComposerServiceProvider::class,
        QueueServiceProvider::class,
    ]);

// Создаем приложение (контейнер)
$app = $appBuilder->create();

// Регистрируем MaintenanceMode singleton
$app->singleton(MaintenanceMode::class, MaintenanceModeManager::class);

return $app;
