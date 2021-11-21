<?php

namespace App\Repository;

use App\Entity\FindingsStatus;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FindingsStatus|null find($id, $lockMode = null, $lockVersion = null)
 * @method FindingsStatus|null findOneBy(array $criteria, array $orderBy = null)
 * @method FindingsStatus[]    findAll()
 * @method FindingsStatus[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FindingsStatusRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FindingsStatus::class);
    }

    // /**
    //  * @return FindingsStatus[] Returns an array of FindingsStatus objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FindingsStatus
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
