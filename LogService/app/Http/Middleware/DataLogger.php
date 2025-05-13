<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Log;
use Illuminate\Support\Facades\File;

class DataLogger
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);

        // Выполняем следующий middleware / контроллер
        $response = $next($request);

        // Проверяем, включено ли логирование
        if (env('API_DATALOGGER', true)) {
            $endTime = microtime(true);
            $duration = number_format($endTime - $startTime, 3);

            // Сохраняем лог в БД
            if (env('API_DATALOGGER_USE_DB', true)) {
                $log = new Log();
                $log->time = now(); // текущее время
                $log->duration = $duration;
                $log->ip = $request->ip();
                $log->url = $request->fullUrl();
                $log->method = $request->method();
                $log->input = $request->getContent();
                $log->save();
            }
            // Либо сохраняем в файл
            else {
                $filename = 'api_datalogger_' . date('d-m-Y') . '.log';
                $logData = "Time: " . now() . "\n";
                $logData .= "Duration: " . $duration . " sec\n";
                $logData .= "IP Address: " . $request->ip() . "\n";
                $logData .= "URL: " . $request->fullUrl() . "\n";
                $logData .= "Method: " . $request->method() . "\n";
                $logData .= "Input: " . $request->getContent() . "\n";
                $logData .= str_repeat("-", 50) . "\n\n";

                File::append(storage_path('logs/' . $filename), $logData);
            }
        }

        return $response;
    }
}
