<?php

return [
    'oracle' => [
        'driver'        => 'oracle',
        'tns'           => env('DB_TNS', ''),
        'host'          => env('192.168.0.15', '192.168.0.15'),
        'port'          => env('DB_POR', '1521'),
        'database'      => env('v10gn', 'v10gn'),
        'username'      => env('mgphp', 'mgphp'),
        'password'      => env('mgry1319', 'mgry1319'),
        'charset'       => env('DB_CHARSET', 'AL32UTF8'),
        'prefix'        => env('DB_PREFIX', ''),
        'prefix_schema' => env('DB_SCHEMA_PREFIX', ''),
    ],
];
