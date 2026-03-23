<?php

namespace App\Repository;

use App\Entity\Tcg;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\QueryBuilder;

/**
 * @extends ServiceEntityRepository<Tcg>
 */
class TcgRepository extends AbstractMyProjectRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tcg::class);
    }


    public function getQbAll(string $tcg = 'e'): QueryBuilder
    {
        $qb = parent::getQbAll($tcg);
        // $alias = $qb->getAlias()[0];

        return $qb
            ->addSelect("$tcg.label", "$tcg.description");
            
    }



    //    /**
    //     * @return Tcg[] Returns an array of Tcg objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('t.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Tcg
    //    {
    //        return $this->createQueryBuilder('t')
    //            ->andWhere('t.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
