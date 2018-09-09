<?php

namespace SlimSampleApp\Service\Artist;

use SlimSampleApp\Domain\Entity\Artist;
use SlimSampleApp\Domain\Repository\ArtistRepository;

class ArtistUpdater
{
    /** @var ArtistRepository */
    private $artistRepository;

    public function __construct(ArtistRepository $artistRepository)
    {
        $this->artistRepository = $artistRepository;
    }

    public function update(array $params, int $id) : Artist
    {
        /** @var Artist $artist */
        $artist = $this->artistRepository->find($id);

        $artist->setName($params['artist_name']);
        $artist->setGenre($params['artist_genre']);
        $artist->setAlbumsRecorded($params['albums_recorded']);
        $artist->setUsername($params['username']);

        return $this->artistRepository->save($artist);
    }
}