<?php

namespace App\Repository;

use App\Entity\FindingsCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FindingsCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method FindingsCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method FindingsCategory[]    findAll()
 * @method FindingsCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FindingsCategoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FindingsCategory::class);
    }

     /**
      * @return FindingsCategory[] Returns an array of FindingsCategory objects
      */
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

    public function findOneBySomeField($value): ?FindingsCategory
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }

}
