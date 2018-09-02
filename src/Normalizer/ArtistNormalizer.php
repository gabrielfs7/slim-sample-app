<?php

namespace SlimSampleApp\Normalizer;

class ArtistNormalizer
{
    public function normalize($entity) : array
    {
        return [
            "artist_name" => $entity->getName(),
            "artist_genre" => $entity->getGenre(),
            "albums_recorded" => $entity->getAlbumsRecorded(),
            "username" => $entity->getUsername()
        ];
    }
}