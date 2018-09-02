<?php

use \Psr\Container\ContainerInterface;

/** @var ContainerInterface $container */
$container = $app->getContainer();

$container['renderer'] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['renderer'];

    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container['logger'] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['logger'];

    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

require __DIR__ . DIRECTORY_SEPARATOR . 'actions.php';