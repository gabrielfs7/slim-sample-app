<?php

namespace SlimSampleApp\Domain\Repository;

use Doctrine\ORM\EntityRepository;
use SlimSampleApp\Domain\Entity\EntityInterface;

abstract class AbstractRepository extends EntityRepository
{
    public function save(EntityInterface $entity): EntityInterface
    {
        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();

        return $entity;
    }
}