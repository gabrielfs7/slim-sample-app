<?php

// To help the built-in PHP dev server, check if the request was actually for
// something which should probably be served as a static file.
if (PHP_SAPI == 'cli-server') {
    $url  = parse_url($_SERVER['REQUEST_URI']);
    $file = __DIR__ . $url['path'];

    if (is_file($file)) {
        return false;
    }
}

require __DIR__ . '/vendor/autoload.php';

session_start();

$settings = require __DIR__ . '/config/settings.php'; // Instantiate the app

$app = new \Slim\App($settings);

require __DIR__ . '/config/dependencies.php'; // Set up dependencies
require __DIR__ . '/config/middleware.php'; // Register middleware
require __DIR__ . '/config/routes.php'; // Register routes

$app->run(); // Run app