<?php

namespace App\Repository;

use App\Entity\Cafetiere;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Cafetiere|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cafetiere|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cafetiere[]    findAll()
 * @method Cafetiere[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CafetiereRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cafetiere::class);
    }

    // /**
    //  * @return Cafetiere[] Returns an array of Cafetiere objects
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
    public function findOneBySomeField($value): ?Cafetiere
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
