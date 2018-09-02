<?php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Tools\Console\ConsoleRunner;
use Psr\Container\ContainerInterface;

require_once __DIR__ . '/bootstrap.php';

/** @var ContainerInterface $container */
$container = $app->getContainer();

ConsoleRunner::run(
    ConsoleRunner::createHelperSet($container[EntityManager::class])
);
