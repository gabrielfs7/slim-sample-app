<?php

use Monolog\Logger;

define('APP_ROOT', __DIR__);

return [
    'settings' => [
        'displayErrorDetails' => true,
        'addContentLengthHeader' => false,
        'determineRouteBeforeAppMiddleware' => false,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => Logger::DEBUG,
        ],

        'doctrine' => [
            // if true, metadata caching is forcefully disabled
            'dev_mode' => true,

            // path where the compiled metadata info will be cached
            // make sure the path exists and it is writable
            'cache_dir' => APP_ROOT . '/var/doctrine',

            // you should add any other path containing annotated entity classes
            'metadata_dirs' => [APP_ROOT . '/src/Domain/Entity'],

            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => 'slim_mysql',
                'port' => 3306,
                'dbname' => 'slim_app',
                'user' => 'root',
                'password' => 'root',
                'charset' => 'utf-8'
            ]
        ]
    ],
];
