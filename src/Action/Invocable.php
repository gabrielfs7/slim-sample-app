<?php

namespace SlimSampleApp\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

interface Invocable
{
    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args) : ResponseInterface;
}
