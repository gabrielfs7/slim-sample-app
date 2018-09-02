<?php

namespace SlimSampleApp\Action\Artist;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use SlimSampleApp\Action\Invocable;
use SlimSampleApp\Domain\Repository\ArtistRepository;

class CreateArtistAction implements Invocable
{


    /** @var ArtistRepository */
    private $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function __invoke(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {

        var_dump($this->artistRepository->findAll()); //FIXME

        $request->getBody()->getMetadata();


        exit('dasdsadsa');
    }
}