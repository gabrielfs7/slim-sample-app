<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Action\AbstractAction;
use SlimSampleApp\Normalizer\Artist\ArtistNormalizer;
use SlimSampleApp\Normalizer\NormalizableInterface;
use SlimSampleApp\Service\Artist\ArtistUpdater;

class UpdateArtistAction extends AbstractAction
{
    /** @var ArtistNormalizer */
    private $artistNormalizer;

    /** @var ArtistUpdater */
    private $artistUpdater;

    public function __construct(ArtistUpdater $artistUpdater, ArtistNormalizer $artistNormalizer)
    {
        $this->artistNormalizer = $artistNormalizer;
        $this->artistUpdater = $artistUpdater;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $artist = $this->artistUpdater->update($this->getJsonDecodedRequest($request), $args['artistId']);

        return $this->createJsonResponse($response, $artist);
    }

    protected function getNormalizer(): NormalizableInterface
    {
        return $this->artistNormalizer;
    }
}