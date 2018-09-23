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
use SlimSampleApp\Http\ResponseBuilder;
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
    $action = new CreateArtistAction($container[ArtistCreator::class]);
    $action->setResponseBuilder($container->get(ResponseBuilder::class));

    return $action;
};

$container[UpdateArtistAction::class] = function (ContainerInterface $container) {
    $action = new UpdateArtistAction($container[ArtistUpdater::class]);
    $action->setResponseBuilder($container->get(ResponseBuilder::class));

    return $action;
};

$container[GetArtistAction::class] = function (ContainerInterface $container) {
    $action = new GetArtistAction($container[ArtistRepository::class]);
    $action->setResponseBuilder($container->get(ResponseBuilder::class));

    return $action;
};
