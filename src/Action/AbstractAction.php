<?php

namespace SlimSampleApp\Action;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Normalizer\NormalizableInterface;

abstract class AbstractAction implements Invocable
{

    abstract protected function getNormalizer(): NormalizableInterface;

    protected function getJsonDecodedRequest(RequestInterface $request): array
    {
        return json_decode($request->getBody()->getContents(), true);
    }

    protected function createJsonResponse(ResponseInterface $response, $responseContent) : ResponseInterface
    {
        $response = $response->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode($this->getNormalizer()->normalize($responseContent)));

        return $response;
    }
}