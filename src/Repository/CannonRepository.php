<?php

namespace App\Repository;

use App\Entity\Cannon;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Cannon|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cannon|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cannon[]    findAll()
 * @method Cannon[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CannonRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cannon::class);
    }

    // /**
    //  * @return Cannon[] Returns an array of Cannon objects
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
    public function findOneBySomeField($value): ?Cannon
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
