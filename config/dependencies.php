<?php

use Doctrine\Common\Persistence\Mapping\Driver\DefaultFileLocator;
use Doctrine\ORM\Mapping\Driver\YamlDriver;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\Cache\FilesystemCache;
use Doctrine\ORM\Tools\Setup;
use Slim\Views\PhpRenderer;

/** @var ContainerInterface $container */
$container = $app->getContainer();

$container[PhpRenderer::class] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['renderer'];

    return new Slim\Views\PhpRenderer($settings['template_path']);
};

$container[Logger::class] = function (ContainerInterface $container) {
    $settings = $container->get('settings')['logger'];

    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

    return $logger;
};

$container[EntityManager::class] = function (ContainerInterface $container): EntityManager {
    $config = Setup::createYAMLMetadataConfiguration(
        $container['settings']['doctrine']['entity_dirs'],
        $container['settings']['doctrine']['dev_mode']
    );

    $config->setMetadataDriverImpl(
        new YamlDriver(
            new DefaultFileLocator($container['settings']['doctrine']['metadata_dirs'])
        )
    );

    $config->setMetadataCacheImpl(
        new FilesystemCache(
            $container['settings']['doctrine']['cache_dir']
        )
    );

    return EntityManager::create(
        $container['settings']['doctrine']['connection'],
        $config
    );
};

require __DIR__ . DIRECTORY_SEPARATOR . 'actions.php';