<?php

use SlimSampleApp\Action\FooAction;
use SlimSampleApp\Action\HelloAction;
use SlimSampleApp\Action\HomeAction;
use SlimSampleApp\Action\Artist\CreateArtistAction;
use SlimSampleApp\Action\Artist\UpdateArtistAction;

$container = $app->getContainer();

$app->get('/', $container[HomeAction::class]);
$app->get('/hello/[{name}]', $container[HelloAction::class]);
$app->get('/foo', $container[FooAction::class]);

$app->post('/artists', $container[CreateArtistAction::class]);
$app->patch('/artists/{artistId}', $container[UpdateArtistAction::class]);
