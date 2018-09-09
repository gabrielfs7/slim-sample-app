<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Action\AbstractAction;
use SlimSampleApp\Domain\Repository\ArtistRepository;
use SlimSampleApp\Normalizer\Artist\ArtistNormalizer;
use SlimSampleApp\Normalizer\NormalizableInterface;

class GetArtistAction extends AbstractAction
{
    /** @var ArtistNormalizer */
    private $artistNormalizer;

    /** @var ArtistRepository */
    private $artistRepository;

    public function __construct(ArtistRepository $artistRepository, ArtistNormalizer $artistNormalizer)
    {
        $this->artistNormalizer = $artistNormalizer;
        $this->artistRepository = $artistRepository;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $artist = $this->artistRepository->find($args['artistId']);

        return $this->createJsonResponse($response, $artist);
    }

    protected function getNormalizer(): NormalizableInterface
    {
        return $this->artistNormalizer;
    }
}