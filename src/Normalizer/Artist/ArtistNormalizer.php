<?php

namespace SlimSampleApp\Normalizer\Artist;

use SlimSampleApp\Domain\Entity\Artist;
use SlimSampleApp\Normalizer\NormalizableInterface;

class ArtistNormalizer implements NormalizableInterface
{
    /**
     * @param Artist $entity
     *
     * @return array
     */
    public function normalize($entity) : array
    {
        return [
            "artist_id" => $entity->getId(),
            "artist_name" => $entity->getName(),
            "artist_genre" => $entity->getGenre(),
            "albums_recorded" => $entity->getAlbumsRecorded(),
            "username" => $entity->getUsername()
        ];
    }

    public function canNormalize($resource): bool
    {
        return $resource instanceof Artist;
    }
}