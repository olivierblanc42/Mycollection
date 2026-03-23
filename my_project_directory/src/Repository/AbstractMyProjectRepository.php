<?php

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractMyProjectRepository extends ServiceEntityRepository
{

    public function __construct(ManagerRegistry $registry, string $entity)
    {
        parent::__construct($registry, $entity);
    }

    public function getQbAll(string $alias = 'e'): QueryBuilder
    {
        return $this->createQueryBuilder($alias);
    }

    protected function getAlias(QueryBuilder $qb): string
    {
        return $qb->getRootAliases()[0];
    }

}
