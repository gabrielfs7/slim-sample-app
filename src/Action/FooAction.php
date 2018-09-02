<?php

namespace SlimSampleApp\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FooAction implements Invocable
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $response->getBody()->write(
            'Request Headers: ' . var_export($request->getHeaders(), true) . PHP_EOL
            . 'Request Uri: ' . $request->getUri() . PHP_EOL
            . 'Bar...'
        );

        return $response;
    }
}