<?php

$app->get('/', $app->getContainer()->get('action.home'));
$app->get('/hello/[{name}]', $app->getContainer()->get('action.hello'));
$app->get('/foo', $app->getContainer()->get('action.foo'));
