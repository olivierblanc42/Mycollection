<?php

namespace App\Repository;

use App\Entity\Type;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends AbstractMyProjectRepository<Type>
 */
class TypeRepository extends AbstractMyProjectRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Type::class);
    }




    public function getQbAll(string $alias = 'e'): QueryBuilder
    {
        $qb = parent::getQbAll($alias);
        // $alias = $qb->getAlias()[0];

        return $qb
            ->select("$alias.id", "$alias.label", 'COUNT(items) AS nbItem')
            ->leftJoin("$alias.items", 'items')
            ->groupBy("$alias.id")
            ->having('nbItem >= 0')
        ;
    }

}
