<?php

use SlimSampleApp\Action\FooAction;
use SlimSampleApp\Action\HelloAction;
use SlimSampleApp\Action\HomeAction;

$app->get('/', $app->getContainer()->get(HomeAction::class));
$app->get('/hello/[{name}]', $app->getContainer()->get(HelloAction::class));
$app->get('/foo', $app->getContainer()->get(FooAction::class));
