<?php

return [

    'default' => 'mysql',

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', 3306),
            'database' => env('DB_DATABASE', 'your_database_name'),
            'username' => env('DB_USERNAME', 'your_username'),
            'password' => env('DB_PASSWORD', 'your_password'),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => false,
        ],

        // ... (други връзки)

    ],

];
