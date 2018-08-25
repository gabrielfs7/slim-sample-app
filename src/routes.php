<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get(
    '/',
    function (Request $request, Response $response, array $args) {
        $this->logger->info("Slim-Skeleton '/' route");

        return $this->renderer->render($response, 'index.phtml', $args);
    }
);

$app->get(
    '/hello/[{name}]',
    function (Request $request, Response $response, array $args) {
        $this->logger->info("Slim-Skeleton '/' route");

        return $this->renderer->render($response, 'index.phtml', $args);
    }
);

$app->get(
    '/foo',
    function (Request $request, Response $response, array $args) {
        $this->logger->info("Slim-Skeleton '/hello' route");

        return $response->write('bar');
    }
);
