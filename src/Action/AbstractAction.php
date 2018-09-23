<?php

namespace SlimSampleApp\Action;

use ErrorException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Http\ResponseBuilder;

abstract class AbstractAction implements Invocable
{
    /** @var  ResponseBuilder */
    private $responseBuilder;

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        return $this->getResponseBuilder()->build($response, $this->processRequest($request, $args));
    }

    public function setResponseBuilder(ResponseBuilder $responseBuilder): self
    {
        $this->responseBuilder = $responseBuilder;

        return $this;
    }

    protected function getJsonDecodedRequest(RequestInterface $request): array
    {
        return json_decode($request->getBody()->getContents(), true);
    }

    abstract protected function processRequest(RequestInterface $request, array $args);

    private function getResponseBuilder(): ResponseBuilder
    {
        if ($this->responseBuilder) {
            return $this->responseBuilder;
        }

        throw new ErrorException(sprintf('It is necessary to set %s', ResponseBuilder::class));
    }
}