<?php

use SlimSampleApp\Action\FooAction;
use SlimSampleApp\Action\HelloAction;
use SlimSampleApp\Action\HomeAction;
use SlimSampleApp\Action\Artist\CreateArtistAction;

$app->get('/', $app->getContainer()->get(HomeAction::class));
$app->get('/hello/[{name}]', $app->getContainer()->get(HelloAction::class));
$app->get('/foo', $app->getContainer()->get(FooAction::class));

$app->get('/artists', $app->getContainer()->get(CreateArtistAction::class));
