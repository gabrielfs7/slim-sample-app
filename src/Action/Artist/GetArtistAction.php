<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use SlimSampleApp\Action\AbstractAction;
use SlimSampleApp\Domain\Repository\ArtistRepository;

class GetArtistAction extends AbstractAction
{
    /** @var ArtistRepository */
    private $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function processRequest(RequestInterface $request, array $args)
    {
        return $this->artistRepository->find($args['artistId']);
    }
}