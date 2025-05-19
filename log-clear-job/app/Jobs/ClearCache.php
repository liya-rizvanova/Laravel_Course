<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ClearCache implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {
        \Log::info('ClearCache job started');

        $logFile = storage_path('logs/laravel.log');
        if (file_exists($logFile) && is_writable($logFile)) {
            file_put_contents($logFile, '');
            \Log::info('Log file cleared');
        } else {
            \Log::error('Log file does not exist or is not writable: ' . $logFile);
        }

        \Log::info('ClearCache job finished');
    }
}
