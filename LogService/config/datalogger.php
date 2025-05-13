<?php

return [
    'enabled' => env('API_DATALOGGER', true),
    'use_db' => env('API_DATALOGGER_USE_DB', true),
    'exclude_fields' => ['password', 'token'], // если нужно фильтровать
];
