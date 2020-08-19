<?php

return
[
    'paths' => [
        'migrations' => '%%PHINX_CONFIG_DIR%%/../database/migrations',
        'seeds' => '%%PHINX_CONFIG_DIR%%/../database/seeds'
    ],
    'environments' => [
        'default_migration_table' => 'migration',
        'default_environment' => 'development',
        'production' => [
            'adapter' => env('PHINX_PRODUCTION_ADAPTER'),
            'host' => env('PHINX_PRODUCTION_HOST'),
            'name' => env('PHINX_PRODUCTION_NAME'),
            'user' => env('PHINX_PRODUCTION_USER'),
            'pass' => env('PHINX_PRODUCTION_PASS'),
            'charset' => env('PHINX_PRODUCTION_CHARSET'),
            'port' => env('PHINX_PRODUCTION_PORT'),
        ],
        'development' => [
            'adapter' => env('PHINX_DEVELOPMENT_ADAPTER'),
            'host' => env('PHINX_DEVELOPMENT_HOST'),
            'name' => env('PHINX_DEVELOPMENT_NAME'),
            'user' => env('PHINX_DEVELOPMENT_USER'),
            'pass' => env('PHINX_DEVELOPMENT_PASS'),
            'charset' => env('PHINX_DEVELOPMENT_CHARSET'),
            'port' => env('PHINX_DEVELOPMENT_PORT'),
        ],
        'testing' => [
            'adapter' => env('PHINX_TESTING_ADAPTER'),
            'host' => env('PHINX_TESTING_HOST'),
            'name' => env('PHINX_TESTING_NAME'),
            'user' => env('PHINX_TESTING_USER'),
            'pass' => env('PHINX_TESTING_PASS'),
            'charset' => env('PHINX_TESTING_CHARSET'),
            'port' => env('PHINX_TESTING_PORT'),
        ]
    ],
    'version_order' => 'creation'
];
