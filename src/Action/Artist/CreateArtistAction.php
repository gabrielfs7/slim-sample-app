<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Action\AbstractAction;
use SlimSampleApp\Normalizer\Artist\ArtistNormalizer;
use SlimSampleApp\Normalizer\NormalizableInterface;
use SlimSampleApp\Service\Artist\ArtistCreator;

class CreateArtistAction extends AbstractAction
{
    /** @var ArtistNormalizer */
    private $artistNormalizer;

    /** @var ArtistCreator */
    private $artistCreator;

    public function __construct(ArtistCreator $artistCreator, ArtistNormalizer $artistNormalizer)
    {
        $this->artistNormalizer = $artistNormalizer;
        $this->artistCreator = $artistCreator;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $artist = $this->artistCreator->create($this->getJsonDecodedRequest($request));

        return $this->createJsonResponse($response, $artist);
    }

    protected function getNormalizer(): NormalizableInterface
    {
        return $this->artistNormalizer;
    }
}