<?php

namespace SlimSampleApp\Domain\Entity;


class Artist
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var string */
    private $genre;

    /** @var int */
    private $albumsRecorded = 0;

    /** @var string */
    private $username;

    public function __construct(string $name, string $genre, int $albumsRecorded, string $username)
    {
        $this->name = $name;
        $this->genre = $genre;
        $this->albumsRecorded = $albumsRecorded;
        $this->username = $username;
    }

    public function getId() : int
    {
        return $this->id;
    }

    public function setName(string $name) : self
    {
        $this->name = $name;

        return $this;
    }

    public function getName() : self
    {
        return $this->name;
    }

    public function setGenre(string $genre) : self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getGenre() : self
    {
        return $this->genre;
    }

    public function setAlbumsRecorded(int $albumsRecorded) : self
    {
        $this->albumsRecorded = $albumsRecorded;

        return $this;
    }

    public function getAlbumsRecorded() : int
    {
        return $this->albumsRecorded;
    }

    public function setUsername($username)  : self
    {
        $this->username = $username;

        return $this;
    }

    public function getUsername() : self
    {
        return $this->username;
    }
}
