<?php

namespace SlimSampleApp\Service\Artist;

use SlimSampleApp\Domain\Entity\Artist;
use SlimSampleApp\Domain\Repository\ArtistRepository;

class ArtistCreator
{
    /** @var ArtistRepository */
    private $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function create(array $params) : Artist
    {
        $artist = new Artist(
            $params['artist_name'],
            $params['artist_genre'],
            $params['albums_recorded'],
            $params['username']
        );

        return $this->artistRepository->save($artist);
    }
}