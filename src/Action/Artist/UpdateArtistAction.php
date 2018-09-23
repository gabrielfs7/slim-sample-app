<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use SlimSampleApp\Action\AbstractAction;
use SlimSampleApp\Service\Artist\ArtistUpdater;

class UpdateArtistAction extends AbstractAction
{
    /** @var ArtistUpdater */
    private $artistUpdater;

    public function __construct(ArtistUpdater $artistUpdater)
    {
        $this->artistUpdater = $artistUpdater;
    }

    public function processRequest(RequestInterface $request, array $args)
    {
        return $this->artistUpdater->update($this->getJsonDecodedRequest($request), $args['artistId']);
    }
}
