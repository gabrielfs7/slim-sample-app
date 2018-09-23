<?php

namespace SlimSampleApp\Http;

use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Normalizer\NormalizableInterface;

class ResponseBuilder
{
    /** @var NormalizableInterface[] */
    private $normalizers = [];

    public function registerNormalize(NormalizableInterface $normalizer): self
    {
        $this->normalizers[get_class($normalizer)] = $normalizer;

        return $this;
    }

    public function build(ResponseInterface $response, $resource): ResponseInterface
    {
        $response = $response->withHeader('Content-type', 'application/json');
        $response->getBody()->write(json_encode($this->normalize($resource)));

        return $response;
    }

    public function normalize($resource)
    {
        foreach ($this->normalizers as $normalizer) {
            if ($normalizer->canNormalize($resource)) {
                return $normalizer->normalize($resource);
            }
        }

        return $resource;
    }
}