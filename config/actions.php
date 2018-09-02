<?php

use Monolog\Logger;
use \Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;
use SlimSampleApp\Action\FooAction;
use SlimSampleApp\Action\HelloAction;
use SlimSampleApp\Action\HomeAction;

/** @var ContainerInterface $container */
$container = $app->getContainer();

$container[HomeAction::class] = function (ContainerInterface $container) {
    return new HomeAction($container[PhpRenderer::class], $container[Logger::class]);
};

$container[HelloAction::class] = function (ContainerInterface $container) {
    return new HelloAction($container[PhpRenderer::class], $container[Logger::class]);
};

$container[FooAction::class] = function (ContainerInterface $container) {
    return new FooAction();
};