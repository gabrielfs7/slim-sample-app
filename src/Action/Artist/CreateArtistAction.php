<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use SlimSampleApp\Action\AbstractAction;
use SlimSampleApp\Service\Artist\ArtistCreator;

class CreateArtistAction extends AbstractAction
{
    /** @var ArtistCreator */
    private $artistCreator;

    public function __construct(ArtistCreator $artistCreator)
    {
        $this->artistCreator = $artistCreator;
    }

    public function processRequest(RequestInterface $request, array $args)
    {
        return $this->artistCreator->create($this->getJsonDecodedRequest($request));
    }
}
