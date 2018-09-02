<?php

namespace SlimSampleApp\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class FooAction implements Invocable
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $response->getBody()->write('bar');

        return $response;
    }
}