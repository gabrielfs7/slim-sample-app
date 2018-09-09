<?php

use Monolog\Logger;
use \Psr\Container\ContainerInterface;
use Slim\Views\PhpRenderer;
use SlimSampleApp\Action\Artist\GetArtistAction;
use SlimSampleApp\Action\Artist\UpdateArtistAction;
use SlimSampleApp\Action\FooAction;
use SlimSampleApp\Action\HelloAction;
use SlimSampleApp\Action\HomeAction;
use SlimSampleApp\Action\Artist\CreateArtistAction;
use SlimSampleApp\Domain\Repository\ArtistRepository;
use SlimSampleApp\Normalizer\Artist\ArtistNormalizer;
use SlimSampleApp\Service\Artist\ArtistCreator;
use SlimSampleApp\Service\Artist\ArtistUpdater;

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

$container[CreateArtistAction::class] = function (ContainerInterface $container) {
    return new CreateArtistAction(
        $container[ArtistCreator::class],
        $container[ArtistNormalizer::class]
    );
};

$container[UpdateArtistAction::class] = function (ContainerInterface $container) {
    return new UpdateArtistAction(
        $container[ArtistUpdater::class],
        $container[ArtistNormalizer::class]
    );
};

$container[GetArtistAction::class] = function (ContainerInterface $container) {
    return new GetArtistAction(
        $container[ArtistRepository::class],
        $container[ArtistNormalizer::class]
    );
};
