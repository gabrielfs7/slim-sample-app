<?php

use \Psr\Container\ContainerInterface;
use SlimSampleApp\Action\FooAction;
use SlimSampleApp\Action\HelloAction;
use SlimSampleApp\Action\HomeAction;

$container['action.home'] = function (ContainerInterface $container) {
    return new HomeAction($container['renderer'], $container['logger']);
};

$container['action.hello'] = function (ContainerInterface $container) {
    return new HelloAction($container['renderer'], $container['logger']);
};

$container['action.foo'] = function (ContainerInterface $container) {
    return new FooAction();
};