<?php

return [
    'default' => 'main',

    'bots' => [
        'main' => [
            'token' => env('TELEGRAM_BOT_TOKEN', 'YOUR_FALLBACK_TOKEN'),
        ],
    ],
];
