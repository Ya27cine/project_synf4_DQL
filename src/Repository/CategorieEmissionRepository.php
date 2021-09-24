<?php

namespace App\Repository;

use App\Entity\CategorieEmission;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieEmission|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieEmission|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieEmission[]    findAll()
 * @method CategorieEmission[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieEmissionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieEmission::class);
    }

    // /**
    //  * @return CategorieEmission[] Returns an array of CategorieEmission objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategorieEmission
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
